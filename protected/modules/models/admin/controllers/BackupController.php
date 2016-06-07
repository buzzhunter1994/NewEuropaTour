<?php

class BackupController extends Controller
{
    public $layout='/layouts/column2';
    const SQL_COMMAND_DELIMETER = ';';
	public function filters()
	{
		return array(
			'accessControl',
			//'postOnly + delete',
		);
	}
	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('create','restore','delete','index'),
				'users'=>array('@'),
			),
			array('deny',
				'users'=>array('*'),
			),
		);
	}
	public function actionCreate()
	{
        $this->backup_db();
        $this->redirect(array('index'));
	}

	public function actionRestore($id)
	{
        if ($this->execSqlFromFile($id)){
            Yii::app()->user->setFlash('flash','Бэкап восстановлен.');
            $this->redirect(array('index'));
        } else {
            Yii::app()->user->setFlash('flash','Ошибка восстановления.');
            $this->redirect(array('index'));
        }       
	}
	public function actionDelete($id)
	{
       $file = Yii::app()->params['webRoot'].'/backup/'.$id;
       if (is_file($file)){
            if (unlink($file)){
                Yii::app()->user->setFlash('flash','Бэкап удален.');
                $this->redirect(array('index'));
            } else {
                Yii::app()->user->setFlash('flash','Ошибка удаления.');
                $this->redirect(array('index'));
            }
       } else {
            Yii::app()->user->setFlash('flash','Бэкап не найден.');
            $this->redirect(array('index'));
       }
	}
	public function actionIndex()
	{
        //if (!Yii::app()->params['isAjax']) return;
        $backup_dir = Yii::app()->params['webRoot']."/backup/";
        $backup_scan = scandir($backup_dir);
        $backups = array();
        foreach($backup_scan as $backup){
            if (is_file($backup_dir.DIRECTORY_SEPARATOR.$backup))
                if(($backup!='.')&&($backup!='..'))
                    $backups[]=$backup; 
        }
		$this->render('index',array(
			'backups'=>$backups,
		));
	}
    public function backup_db($host='db3.ho.ua',$user='school28',$pass='rtyuehe',$name='school28',$tables='t_attachments,t_categories,t_c_comm,t_gurtky,t_left_menu,t_main_menu,t_posts,t_storage,t_users,admin_users')
    {
        $return ='';
        $link = mysql_connect($host,$user,$pass);
        mysql_select_db($name,$link);
        if($tables == '*')
        {
                $tables = array();
                $result = mysql_query('SHOW TABLES');
                while($row = mysql_fetch_row($result))
                {
                         $tables[] = $row[0];
                }
        }
        else
        {
                $tables = is_array($tables) ? $tables : explode(',',$tables);
        }
        
        foreach($tables as $table)
        {
                $result = mysql_query("SELECT * FROM `$table`");
                $num_fields = mysql_num_fields($result);
/*                $return.= "\n--";
                $return.= "\n-- Структура таблицы `$table`";
                $return.= "\n--";
*/
                $return.= "\nDROP TABLE IF EXISTS `$table`;";

                mysql_query("SET NAMES `utf8`");
                mysql_query("SET CHARACTER SET utf8");
                $row2 = mysql_fetch_row(mysql_query("SHOW CREATE TABLE `$table`"));
                $return.= "\n\n".$row2[1].";\n\n";
                for ($i = 0; $i < $num_fields; $i++)
                {
                        while($row = mysql_fetch_row($result))
                        {
                                $return.= "INSERT INTO `$table` VALUES(";
                                for($j=0; $j<$num_fields; $j++)
                                {
                                        $row[$j] = addslashes($row[$j]);
                                        $row[$j] = ereg_replace("\r\n","\\r\\n",$row[$j]);
                                        $row[$j] = ereg_replace("\n","\\n",$row[$j]);
                                        if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
                                        if ($j<($num_fields-1)) { $return.= ','; }
                                }
                                $return.= ");\n";
                        }
                }
                $return.="\n";
        }
        //save the file
        $handle = fopen(Yii::app()->params['webRoot'].'/backup/backup-'.date("Y-m-d_G-i-s").'.sql','w+');
        fwrite($handle,$return);
        fclose($handle);//.(md5(implode(',',$tables)))
    }
    public function execSqlFromFile($fileName){
        $file = Yii::app()->params['webRoot'].'/backup/'.$fileName;
        if (is_file($file)){
            $handle = fopen($file,'r');
            $command = '';
            $connection = Yii::app()->db;
            while (!feof($handle)) {
                $line = fgets($handle);
                $line = trim($line);
                if (empty($line))
                continue;
                $command .= $line;
                if (strpos($line,self::SQL_COMMAND_DELIMETER)){
                    try{
                        $connection->createCommand($command)->execute();
                    }
                    catch (Exception $e) {
                        return false;
                    }                    
                    $command = '';
                }
            }
            return true;
        } else {
            return false;
        }
    }
}