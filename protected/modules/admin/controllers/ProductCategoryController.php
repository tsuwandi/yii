<?php

    class ProductCategoryController extends CrudController
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
                $model = new ProductCategory;

                if (isset($_POST['ProductCategory']))
                {
                    $model->attributes = $_POST['ProductCategory'];
                    $model->admin_id = Yii::app()->user->id;
                    if ($model->save())
                    {
                        $this->redirect(array('product/create'));
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

                if (isset($_POST['ProductCategory']))
                {
                    $model->attributes = $_POST['ProductCategory'];
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
                $model = new ProductCategory('search');
                $model->unsetAttributes();  // clear any default values
                if (isset($_GET['ProductCategory']))
                {
                    $model->attributes = $_GET['ProductCategory'];
                }

                $this->render('admin', array(
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

     
        public function loadModel($id)
        {
            $model = ProductCategory::model()->findByPk($id);
            if ($model === null)
            {
                throw new CHttpException(404, 'The requested page does not exist.');
            }
            return $model;
        }

        protected function performAjaxValidation($model)
        {
            if (isset($_POST['ajax']) && $_POST['ajax'] === 'product-category-form')
            {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
        }

    }
    