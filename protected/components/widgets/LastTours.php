<?php
class LastTours extends CWidget
{
    public function run()
    {
        $tours = Tours::model()->findAll(array(
            'limit' => 4,
        ));
        $this->render('lastTours', array('tours' => $tours));
    }
}