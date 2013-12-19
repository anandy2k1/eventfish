<?php

class AmazonProductsController extends AdminCoreController
{

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function actionCreate()
    {
        $model = new AmazonProducts;

        if (isset($_POST['AmazonProducts'])) {
            $model->setAttributes($_POST['AmazonProducts']);

            if ($model->save()) {
                if (Yii::app()->getRequest()->getIsAjaxRequest())
                    Yii::app()->end();
                else
                    $this->redirect(array('admin'));
            }
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id, 'AmazonProducts');


        if (isset($_POST['AmazonProducts'])) {
            $model->setAttributes($_POST['AmazonProducts']);

            if ($model->save()) {
                $this->redirect(array('admin'));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id)
    {
        if (Yii::app()->getRequest()->getIsPostRequest()) {
            $this->loadModel($id, 'AmazonProducts')->delete();

            if (!Yii::app()->getRequest()->getIsAjaxRequest())
                $this->redirect(array('admin'));
        } else
            throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
    }

    public function actionAdmin()
    {
        $model = new AmazonProducts('search');
        $model->unsetAttributes();
        if (isset($_GET['AmazonProducts']))
            $model->setAttributes($_GET['AmazonProducts']);

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionImportProduct()
    {
        /*
        $oAmazon = new AmazonProductAPI();
        try {
            $amResponse = $oAmazon->searchProducts("eventfish-20", "Accesories", "KEYWORD");
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
        foreach ($amResponse->Items->Item as $item) {
            echo $item->ASIN . "<br/>";
            p($item,0);

        }
        exit;*/
        $oModel = new ImportProductForm();

        if (Yii::app()->getRequest()->getIsPostRequest()) {
            $amPostData = $_POST['ImportProductForm'];
            $oModel->setAttributes($amPostData);
            $oModel->csvfile = $amPostData['csvfile'];
            if ($oModel->validate()) {

                // EXTRACT ASIN NUMBER FROM CSV //
                $oCSVData = CUploadedFile::getInstancesByName('ImportProductForm[csvfile]');
                $oAmazon = new AmazonProductAPI();
                if ($oCSVData) {
                    $oHandleFile = fopen($oCSVData[0]->tempName, "r");
                    $snRow = 1;
                    $amCsvAsinNumbers = array();
                    while (($omData = fgetcsv($oHandleFile, 1000, ",")) !== FALSE) {
                        if ($snRow > 1) {
                            $amCsvAsinNumbers[] = $omData[0];
                            $amResponse = $oAmazon->searchProducts("eventfish-20", "Accesories", "ASIN", $omData[0]);
                            //p($amResponse);
                            foreach ($amResponse->Items->Item as $omItem) {

                                //  if (in_array($omItem->ASIN, $amCsvAsinNumbers)) {

                                // IF ASIN NUMBER AND PRODUCT ALREADY EXISTS UPDATE PRODUCT ATTRIBUTES //
                                $oCheckProductIsExists = AmazonProducts::model()->findByAttributes(array('amazon_asin_number' => $omItem->ASIN));
                                if ($oCheckProductIsExists) {
                                    $oCheckProductIsExists->amazon_asin_number = $omItem->ASIN;
                                    $oCheckProductIsExists->amazon_product_id = $omItem->ItemAttributes->UPC;
                                    $oCheckProductIsExists->product_name = $omItem->ItemAttributes->Title;
                                    $oCheckProductIsExists->product_image = $omItem->MediumImage->URL;
                                    //$oCheckProductIsExists->product_description = $omItem->DetailPageURL;
                                    $oCheckProductIsExists->publisher = $omItem->ItemAttributes->Publisher;
                                    $oCheckProductIsExists->product_price = $omItem->OfferSummary->LowestNewPrice->FormattedPrice;
                                    $oCheckProductIsExists->amazon_product_detail_page_url = $omItem->DetailPageURL;
                                    $oCheckProductIsExists->reviews = $omItem->CustomerReviews->IFrameURL;
                                    $oCheckProductIsExists->save(false);


                                } else { // IF ASIN NUMBER AND PRODUCT DOES NOT EXISTS INSERT PRODUCT ATTRIBUTES //
                                    $oAmzonProduct = new AmazonProducts();
                                    $oAmzonProduct->amazon_asin_number = $omItem->ASIN;
                                    $oAmzonProduct->amazon_product_id = $omItem->ItemAttributes->UPC;
                                    $oAmzonProduct->product_name = $omItem->ItemAttributes->Title;
                                    $oAmzonProduct->product_image = $omItem->MediumImage->URL;
                                    //$oAmzonProduct->product_description = $omItem->DetailPageURL;
                                    $oAmzonProduct->publisher = $omItem->ItemAttributes->Publisher;
                                    $oAmzonProduct->product_price = $omItem->OfferSummary->LowestNewPrice->FormattedPrice;
                                    $oAmzonProduct->amazon_product_detail_page_url = $omItem->DetailPageURL;
                                    $oAmzonProduct->reviews = $omItem->CustomerReviews->IFrameURL;
                                    $oAmzonProduct->save(false);

                                    // FOR ASSIGN PRODUCT INTO CATEGORY //
                                    if (isset($amPostData['category_ids'])) {
                                        foreach ($amPostData['category_ids'] as $snCategoryId) {
                                            $oModel = new AmazonProductsCategories();
                                            $oModel->product_id = $oAmzonProduct->id;
                                            $oModel->category_id = $snCategoryId;
                                            $oModel->save(false);
                                        }
                                    }
                                }
                                // }
                            }
                            Yii::app()->user->setFlash('success', "Products has been successfully uploaded / updated.");
                        }
                        $snRow++;
                    }

                    try {

                    } catch (Exception $e) {
                        Yii::app()->user->setFlash('error', $e->getMessage());
                    }

                    $this->redirect(array('admin'));
                }
            }
        }
        // FOR GET ALL CATEGORIES //
        $omEventCategories = Category::getAllActiveCategories(Yii::app()->params['compareCategoryType']['event_planner']);
        $amCategories = CHtml::listData($omEventCategories, 'id', 'category_name');
        $this->render('importProduct', array(
            'model' => $oModel,
            'amCategories' => $amCategories
        ));
    }

    public function actionImportProductSingle()
    {

        $oModel = new ImportProductForm();

        if (Yii::app()->getRequest()->getIsPostRequest()) {
            $amPostData = $_POST['ImportProductForm'];
            //$oModel->setAttributes($amPostData);
            if (isset($_POST['asin']) && $_POST['asin'] != "" && isset($amPostData['category_ids']))
            {

                // FETCH PRODUCT FROM SINGLE ASIN //
                try {
                    $oAmazon = new AmazonProductAPI();
                    $amResponse = $oAmazon->searchProducts("eventfish-20", "Accesories", "ASIN", $_POST['asin']);

                    foreach ($amResponse->Items->Item as $omItem) {

                        //  if (in_array($omItem->ASIN, $amCsvAsinNumbers)) {

                        // IF ASIN NUMBER AND PRODUCT ALREADY EXISTS UPDATE PRODUCT ATTRIBUTES //
                        $oCheckProductIsExists = AmazonProducts::model()->findByAttributes(array('amazon_asin_number' => $omItem->ASIN));
                        if ($oCheckProductIsExists) {
                            $oCheckProductIsExists->amazon_asin_number = $omItem->ASIN;
                            $oCheckProductIsExists->amazon_product_id = $omItem->ItemAttributes->UPC;
                            $oCheckProductIsExists->product_name = $omItem->ItemAttributes->Title;
                            $oCheckProductIsExists->product_image = $omItem->MediumImage->URL;
                            //$oCheckProductIsExists->product_description = $omItem->DetailPageURL;
                            $oCheckProductIsExists->publisher = $omItem->ItemAttributes->Publisher;
                            $oCheckProductIsExists->product_price = $omItem->OfferSummary->LowestNewPrice->FormattedPrice;
                            $oCheckProductIsExists->amazon_product_detail_page_url = $omItem->DetailPageURL;
                            $oCheckProductIsExists->reviews = $omItem->CustomerReviews->IFrameURL;
                            $oCheckProductIsExists->save(false);


                        } else { // IF ASIN NUMBER AND PRODUCT DOES NOT EXISTS INSERT PRODUCT ATTRIBUTES //
                            $oAmzonProduct = new AmazonProducts();
                            $oAmzonProduct->amazon_asin_number = $omItem->ASIN;
                            $oAmzonProduct->amazon_product_id = $omItem->ItemAttributes->UPC;
                            $oAmzonProduct->product_name = $omItem->ItemAttributes->Title;
                            $oAmzonProduct->product_image = $omItem->MediumImage->URL;
                            //$oAmzonProduct->product_description = $omItem->DetailPageURL;
                            $oAmzonProduct->publisher = $omItem->ItemAttributes->Publisher;
                            $oAmzonProduct->product_price = $omItem->OfferSummary->LowestNewPrice->FormattedPrice;
                            $oAmzonProduct->amazon_product_detail_page_url = $omItem->DetailPageURL;
                            $oAmzonProduct->reviews = $omItem->CustomerReviews->IFrameURL;
                            $oAmzonProduct->save(false);

                            // FOR ASSIGN PRODUCT INTO CATEGORY //
                            if (isset($amPostData['category_ids'])) {
                                foreach ($amPostData['category_ids'] as $snCategoryId) {
                                    $oModel = new AmazonProductsCategories();
                                    $oModel->product_id = $oAmzonProduct->id;
                                    $oModel->category_id = $snCategoryId;
                                    $oModel->save(false);
                                }
                            }
                        }
                        // }
                    }
                    Yii::app()->user->setFlash('success', "Products has been successfully uploaded / updated.");
                    $this->redirect(array('admin'));
                } catch (Exception $e) {
                    //echo $e->getMessage();
                    Yii::app()->user->setFlash('error', $e->getMessage());
                    //exit;
                }
            }
            else{
                Yii::app()->user->setFlash('error', 'Please fill in the ASIN!');
            }

        }


// FOR GET ALL CATEGORIES //
        $omEventCategories = Category::getAllActiveCategories(Yii::app()->params['compareCategoryType']['event_planner']);
        $amCategories = CHtml::listData($omEventCategories, 'id', 'category_name');
        $this->render('importProduct', array(
            'model' => $oModel,
            'amCategories' => $amCategories
        ));
    }

}