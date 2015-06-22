<?php

    class FrontBannerController extends CrudController
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

        public function actionCreate()
        {
            if (!Yii::app()->user->isGuest)
            {
                $model = new FrontBanner;

                if (isset($_POST['FrontBanner']))
                {
                    $model->attributes = $_POST['FrontBanner'];
                    $model->file = CUploadedFile::getInstance($model, 'file');
                    $model->admin_id = Yii::app()->user->id;

                    if ($model->save())
                    {
                        $this->saveImageFile($model);
                        $this->redirect(array('view', 'id' => $model->id));
                    }
                }

                $this->render('create', array(
                    'model' => $model,
                ));
            }
            else
                $this->redirect(array('default/login'));
        }

        public function actionUploadImage($id)
        {
            if (!Yii::app()->user->isGuest)
            {
                $model = $this->loadModel($id);
                $model->scenario = 'uploadImage';

                if (isset($_POST['FrontBanner']))
                {
                    $model->attributes = $_POST['FrontBanner'];
                    $model->admin_id = Yii::app()->user->id;
                    $model->file = CUploadedFile::getInstance($model, 'file');
                    $validateFields = array('file', 'file_extension');
                    $updateFields = array('file_extension', 'admin_id');

                    if ($model->validate($validateFields) && $model->update($updateFields))
                    {
                        $this->saveImageFile($model);
                        $this->redirect(array('view', 'id' => $model->id));
                    }
                }

                $this->render('uploadImage', array(
                    'model' => $model,
                ));
            }
            else
                $this->redirect(array('default/login'));
        }

        public function actionDelete($id)
        {
            if (Yii::app()->request->isPostRequest)
            {
                $model = $this->loadModel($id);
                if ($model !== null)
                {
                    $model->is_inactive = ActiveRecord::INACTIVE;
                    $model->update(array('is_inactive'));
                }

                if (!isset($_GET['ajax']))
                    $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }
            else
                throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }

        public function actionAdmin()
        {
            if (!Yii::app()->user->isGuest)
            {
                $model = new FrontBanner('search');
                $model->unsetAttributes();  // clear any default values
                if (isset($_GET['FrontBanner']))
                {
                    $model->attributes = $_GET['FrontBanner'];
                }

                $this->render('admin', array(
                    'model' => $model,
                ));
            }
            else
                $this->redirect(array('default/login'));
        }

        public function saveImageFile($model)
        {
            if ($model->file)
            {
                $originalPath = dirname(Yii::app()->request->scriptFile) . '/images/frontBanner/' . $model->filename;
                $model->file->saveAs($originalPath);

                require_once( dirname(Yii::app()->request->scriptFile) . '/protected/extensions/phpthumb/ThumbLib.inc.php' );

                $image = PhpThumbFactory::create($originalPath);
                $image->resize(700, 400)->save($originalPath);
            }
        }

        public function loadModel($id)
        {
            $model = FrontBanner::model()->findByPk($id);
            if ($model === null)
            {
                throw new CHttpException(404, 'The requested page does not exist.');
            }
            return $model;
        }

        protected function performAjaxValidation($model)
        {
            if (isset($_POST['ajax']) && $_POST['ajax'] === 'banner-form')
            {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
        }

    }
    