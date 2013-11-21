<?php

class AmazonProductsController extends AdminCoreController {

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function actionCreate() {
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

    public function actionUpdate($id) {
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

    public function actionDelete($id) {
        if (Yii::app()->getRequest()->getIsPostRequest()) {
            $this->loadModel($id, 'AmazonProducts')->delete();

            if (!Yii::app()->getRequest()->getIsAjaxRequest())
                $this->redirect(array('admin'));
        }
        else
            throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
    }

    public function actionAdmin() {
        $model = new AmazonProducts('search');
        $model->unsetAttributes();

        if (isset($_GET['AmazonProducts']))
            $model->setAttributes($_GET['AmazonProducts']);

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionImportProduct() {

        $oAmazon = new AmazonProductAPI();

        try
        {
            $amResponse = $oAmazon->searchProducts("eventfish-20","Accesories", "KEYWORD");
        }
        catch(Exception $e)
        {
            echo $e->getMessage();exit;
        }
        p($amResponse);


        $oModel = new ImportProductForm();

        if (Yii::app()->getRequest()->getIsPostRequest()) {
            $amPostData = $_POST['ImportProductForm'];
            $oModel->setAttributes($amPostData);
            if ($oModel->validate()) {
                p($_POST);
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