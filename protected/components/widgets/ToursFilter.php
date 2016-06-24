<?php
class ToursFilter extends CWidget
{
    public function run()
    {
        $countries = Countries::model()->findAll();
        $topCountries = Countries::model()->findAll(array(
            'condition'=>'top = 1'
        ));
        $themes = TourThemes::model()->findAll();
        $this->render('toursFilter', array('countries' => $countries, 'topCountries' => $topCountries, 'themes' => $themes));
    }
}