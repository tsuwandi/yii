<?php

    class ProductController extends CrudController
    {

        public function actionView($id)
        {
            if (!Yii::app()->user->isGuest)
            {
                $model = $this->loadModel($id);
                $productCategory = $model->productCategory(array('scopes' => 'resetScope'));

                $this->render('view', array(
                    'model' => $this->loadModel($id),
                    'productCategory' => $productCategory
                ));
            }
            else
                $this->redirect(array('default/login'));
        }

        public function actionCreate()
        {
            if (!Yii::app()->user->isGuest)
            {
                $model = new Product;

                if (isset($_POST['Product']))
                {
                    $model->attributes = $_POST['Product'];
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

        public function actionUpdate($id)
        {
            if (!Yii::app()->user->isGuest)
            {
                $model = $this->loadModel($id);

                if (isset($_POST['Product']))
                {
                    $model->attributes = $_POST['Product'];
                    $model->admin_id = Yii::app()->user->id;
                    $fields = array('name', 'description', 'further_description', 'rate', 'product_category_id', 'admin_id');
                    if ($model->validate($fields) && $model->update($fields))
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

        public function actionUploadImage($id)
        {
            if (!Yii::app()->user->isGuest)
            {
                $model = $this->loadModel($id);
                $model->scenario = 'uploadImage';

                if (isset($_POST['Product']))
                {
                    $model->attributes = $_POST['Product'];
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
                $model = new Product('search');
                $model->unsetAttributes();  // clear any default values
                if (isset($_GET['Product']))
                {
                    $model->attributes = $_GET['Product'];
                }

                $dataProvider = $model->search();

                $dataProvider->criteria->with = array(
                    'productCategory:resetScope',
                    'admin:resetScope'
                );

                $this->render('admin', array(
                    'model' => $model,
                    'dataProvider' => $dataProvider,
                ));
            }
            else
                $this->redirect(array('default/login'));
        }

        public function saveImageFile($model)
        {
            if ($model->file)
            {
                $originalPath = dirname(Yii::app()->request->scriptFile) . '/images/product/' . $model->filename;
                $model->file->saveAs($originalPath);

                require_once( dirname(Yii::app()->request->scriptFile) . '/protected/extensions/phpthumb/ThumbLib.inc.php' );

                $image = PhpThumbFactory::create($originalPath);
                $image->resize(600, 400)->save($originalPath);
            }
        }

        public function loadModel($id)
        {
            $model = Product::model()->findByPk($id);
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
    