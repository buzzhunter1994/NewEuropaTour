<?php
class RecommendTours extends CWidget
{
    public function run()
    {
        $tours = Tours::model()->findAll(array(
            'condition'=>'recommend = 1 LIMIT 4'
        ));
        $this->render('recommendTours', array('tours' => $tours));
    }
}