<?php

    class SocialMediaController extends CrudController
    {
        public function actionView($id)
        {
            if (!Yii::app()->user->isGuest)
            {
                $this->render('view', array(
                    'model' => $this->loadModel($id),
                ));
            }
            else
                $this->redirect(array('default/login'));
        }

     
        public function actionUpdate($id)
        {
            if (!Yii::app()->user->isGuest)
            {
                $model = $this->loadModel($id);

                if (isset($_POST['SocialMedia']))
                {
                    $model->attributes = $_POST['SocialMedia'];
                    $model->admin_id = Yii::app()->user->id;
                    if ($model->save())
                    {
                        $this->redirect(array('view', 'id' => $model->id));
                    }
                }

                $this->render('update', array(
                    'model' => $model,
                ));
            }
            else
                $this->redirect(array('default/login'));
        }

        public function actionAdmin()
        {
            if (!Yii::app()->user->isGuest)
            {
                $model = new SocialMedia('search');
                $model->unsetAttributes();  // clear any default values
                if (isset($_GET['SocialMedia']))
                {
                    $model->attributes = $_GET['SocialMedia'];
                }

                $this->render('admin', array(
                    'model' => $model,
                ));
            }
            else
                $this->redirect(array('default/login'));
        }

      
        public function loadModel($id)
        {
            $model = SocialMedia::model()->findByPk($id);
            if ($model === null)
            {
                throw new CHttpException(404, 'The requested page does not exist.');
            }
            return $model;
        }

      
        protected function performAjaxValidation($model)
        {
            if (isset($_POST['ajax']) && $_POST['ajax'] === 'social-media-form')
            {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
        }

    }
    