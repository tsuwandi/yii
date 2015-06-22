<?php

    class SideWidget extends CWidget
    {

        public function run()
        {
            $contactUs = ContactUs::model()->active()->findByPk(1);

            $promotions = Promotion::model()->active()->findAll();
            
            $facebook = SocialMedia::model()->active()->findByPk(1);

            $newsProvider = new CActiveDataProvider('News', array(
                'criteria' => array(
                    'condition' => 'is_inactive = 0',
                    'order' => 'id DESC',
                    'limit' => 3
                ),
                'pagination' => false,
            ));

            $this->render('_sideWidget', array(
                'contactUs' => $contactUs,
                'promotions' => $promotions,
                'newsProvider' => $newsProvider,
                'facebook' => $facebook
            ));
        }

    }

?>
