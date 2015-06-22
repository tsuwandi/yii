<?php

    class DefaultController extends Controller
    {

        public $layout = '/layouts/column1';

        public function actions()
        {
            return array(
                // captcha action renders the CAPTCHA image displayed on the contact page
                'captcha' => array(
                    'class' => 'CCaptchaAction',
                    'backColor' => 0xFFFFFF,
                ),
                // page action renders "static" pages stored under 'protected/views/site/pages'
                // They can be accessed via: index.php?r=site/page&view=FileName
                'page' => array(
                    'class' => 'CViewAction',
                ),
            );
        }

        public function actionError()
        {
            if ($error = Yii::app()->errorHandler->error)
            {
                if (Yii::app()->request->isAjaxRequest)
                    echo $error['message'];
                else
                    $this->render('error', $error);
            }
        }

        public function actionIndex()
        {
            $banner = FrontBanner::model()->active()->findAll();

            $content = Content::model()->active()->findByPk(1);

            $partners = Partner::model()->active()->findAll();

            $productContent = Content::model()->active()->findByPk(5);

            $productList = new CActiveDataProvider('Product', array(
                'criteria' => array(
                    'condition' => 'rate > 3 AND is_inactive = 0',
                    'order' => 'id DESC',
                ),
                'pagination' => array(
                    'pageSize' => 3
                ),
            ));

            $this->render('index', array(
                'banner' => $banner,
                'content' => $content,
                'productContent' => $productContent,
                'partners' => $partners,
                'productList' => $productList
            ));
        }
        
        public function actionSearch()
        {
            $criteria = new CDbCriteria;
            $criteria->compare('name', $_GET['searchByName'], true, 'OR');

            $dataProvider = new CActiveDataProvider('Product', array(
                'criteria' => $criteria,
                'pagination' => array(
                    'pageSize' => 9,
                ),
            ));

            $this->render('search', array(
                'dataProvider' => $dataProvider,
            ));
        }

        public function actionAboutUs()
        {
            $contentAboutUs = Content::model()->active()->findByPk(2);
            $contentVision = Content::model()->active()->findByPk(3);
            $contentMission = Content::model()->active()->findByPk(4);

            $this->render('aboutUs', array(
                'contentAboutUs' => $contentAboutUs,
                'contentVision' => $contentVision,
                'contentMission' => $contentMission,
            ));
        }
        
         public function actionCategory($id)
        {
            $productCategory = ProductCategory::model()->active()->findByPk($id);
            if (!isset($productCategory))
                throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
            else
                $product = Product::model()->active()->findAllByAttributes(array('product_category_id' => $productCategory->id));
            
            $productCategoryList = new CActiveDataProvider('Product', array(
                'criteria' => array(
                    'condition' => 'product_category_id = :productCategoryId   AND is_inactive = 0',
                    'params' => array(':productCategoryId' => $productCategory->id),
                ),
                'pagination' => array(
                    'pageSize' => 8
                ),
            ));
            
            $productCategoryTable = new CActiveDataProvider('Product', array(
                'criteria' => array(
                    'condition' => 'product_category_id = :productCategoryId   AND is_inactive = 0',
                    'params' => array(':productCategoryId' => $productCategory->id),
                ),
                'pagination' => false,
            ));
            
            $this->render('productCategory', array(
                'productCategory' => $productCategory,
                'product' => $product,
                'productCategoryList' => $productCategoryList,
                'productCategoryTable' => $productCategoryTable
            ));
        }


        public function actionProduct($id)
        {
            $product = Product::model()->active()->findByPk($id);
            
            if (!isset($product))
                throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
            
            $productCategory = ProductCategory::model()->active()->findByPk($product->product_category_id);
            
            if (!isset($productCategory))
                throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');

            $this->render('product', array(
                'product' => $product,
            ));
        }

        public function actionNews()
        {
            $newsProvider = new CActiveDataProvider('News', array(
                'criteria' => array(
                    'condition' => 'is_inactive = 0',
                    'order' => 'id DESC'
                ),
                'pagination' => array(
                    'pageSize' => 3
                ),
            ));

            $this->render('news', array(
                'newsProvider' => $newsProvider,
            ));
        }

        public function actionDetailNews($newsId)
        {
            $news = News::model()->active()->findByPk($newsId);

            if (!isset($news))
                throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');

            $this->render('detailNews', array(
                'news' => $news,
            ));
        }

        public function actionContactUs()
        {
            $contactUs = ContactUs::model()->active()->findByPk(1);

            $contentContactUs = Content::model()->active()->findByPk(2);

            $model = new ContactForm;
            if (isset($_POST['ContactForm']))
            {
                $model->attributes = $_POST['ContactForm'];
                if ($model->validate())
                {
                    $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                    $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                    $headers = "From: $name <{$model->email}>\r\n" .
                            "Reply-To: {$model->email}\r\n" .
                            "MIME-Version: 1.0\r\n" .
                            "Content-type: text/plain; charset=UTF-8";

//				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
                    Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                    $this->refresh();
                }
            }

            $this->render('contactUs', array(
                'model' => $model,
                'contactUs' => $contactUs,
            ));
        }

    }
    