<?php
class UserCounter extends CComponent
{
	public $action;
    public $data;

	private $cfg_tbl_users		= 'pcounter_users';
	private $cfg_tbl_save		= 'pcounter_save';
	private $cfg_online_time	= 10;

	private $user_total			= -1;
	private $user_online		= -1;
	private $user_today			= -1;
	private $user_yesterday		= -1;
	private $user_max_count		= -1;
	private $user_time			= -1;

	public function __construct()
	{
	}

	public function init()
	{
	}

    public function refresh()
    {
		$cfg_tbl_users		= $this->cfg_tbl_users;
		$cfg_tbl_save		= $this->cfg_tbl_save;
		$cfg_online_time	= $this->cfg_online_time;

		$sql = 'SELECT save_name, save_value FROM ' . $cfg_tbl_save;
		$command = Yii::app()->db->createCommand($sql);
		$dataReader = $command->query();
		$data = array();
		while (($row = $dataReader->read()) !== false)
		{
			$data[$row['save_name']] = $row['save_value'];
		}
		$today_jd = abs(mktime(12, 0, 0, date('n'), date('j'), date('Y')))/60/60/24;//GregorianToJD(date('m'), date('j'), date('Y'));
		if ($today_jd != $data['day_time'])
		{
			$sql = 'SELECT COUNT(user_ip) AS user_count FROM ' . $cfg_tbl_users;
			$command = Yii::app()->db->createCommand($sql);
			$dataReader = $command->query();
			$row = $dataReader->read();
			$today_count = $row['user_count'];

			$days_between = $today_jd - $data['day_time'];

			$sql = 'UPDATE ' . $cfg_tbl_save . ' SET save_value=' . ($days_between == 1 ? $today_count : 0) . ' WHERE save_name="yesterday"';
			$command = Yii::app()->db->createCommand($sql);
			$command->execute();

			if ($today_count >= $data['max_count'])
			{
				$data['max_time']  = mktime(12, 0, 0, date('n'), date('j'), date('Y'));
				$data['max_count'] = $today_count;

				$sql= 'UPDATE ' . $cfg_tbl_save . ' SET save_value=' . $today_count . ' WHERE save_name="max_count"';
				$command = Yii::app()->db->createCommand($sql);
				$command->execute();

				$sql= 'UPDATE ' . $cfg_tbl_save . ' SET save_value=' . $data['max_time'] . ' WHERE save_name="max_time"';
				$command = Yii::app()->db->createCommand($sql);
				$command->execute();
			}

			$sql = 'UPDATE ' . $cfg_tbl_save . ' SET save_value=save_value+' . $today_count . ' WHERE save_name="counter"';
			$command = Yii::app()->db->createCommand($sql);
			$command->execute();

			$sql = 'TRUNCATE TABLE ' . $cfg_tbl_users;
			$command = Yii::app()->db->createCommand($sql);
			$command->execute();

			$sql= 'UPDATE ' . $cfg_tbl_save . ' SET save_value=' . $today_jd . ' WHERE save_name="day_time"';
			$command = Yii::app()->db->createCommand($sql);
			$command->execute();

			$data['counter'] += $today_count;
			$data['yesterday'] = ($days_between == 1 ? $today_count : 0);
		}
		$user_ip = Yii::app()->db->quoteValue(isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);

		$sql = 'INSERT INTO ' . $cfg_tbl_users . ' VALUES ("' . $user_ip . '", ' . time() . ') ON DUPLICATE KEY UPDATE user_time=' . time();
		$command = Yii::app()->db->createCommand($sql);
		$command->execute();

		$output = array();

		$sql = 'SELECT COUNT(user_ip) AS user_count FROM ' . $cfg_tbl_users;
		$command = Yii::app()->db->createCommand($sql);
		$dataReader = $command->query();
		$row = $dataReader->read();
		$output['today'] = $row['user_count'];

		$output['counter']   = $data['counter'] + $output['today'];
		$output['yesterday'] = $data['yesterday'];

		$sql = 'SELECT COUNT(user_ip) AS user_count FROM ' . $cfg_tbl_users . ' WHERE user_time>=' . (time() - $cfg_online_time * 60);
		$command = Yii::app()->db->createCommand($sql);
		$dataReader = $command->query();
		$row = $dataReader->read();
		$output['online'] = $row['user_count'];

		if ($output['today'] >= $data['max_count'])
		{
			$output['max_count'] = $output['today'];
			$output['max_time']  = time();
		}
		else
		{
			$output['max_count'] = $data['max_count'];
			$output['max_time']  = $data['max_time'];
		}

		$this->user_total		= $output['counter'];
		$this->user_online		= $output['online'];
		$this->user_today		= $output['today'];
		$this->user_yesterday	= $output['yesterday'];
		$this->user_max_count	= $output['max_count'];
		$this->user_time		= $output['max_time'];
   	}

	public function getTotal()
	{
		return $this->user_total;
	}

	public function getOnline()
	{
		return $this->user_online;
	}

	public function getToday()
	{
		return $this->user_today;
	}

	public function getYesterday()
	{
		return $this->user_yesterday;
	}

	public function getMaximal()
	{
		return $this->user_max_count;
	}

	public function getMaximalTime()
	{
		return $this->user_time;
	}
}