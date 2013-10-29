<?php

class CategoryController extends AdminCoreController {

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id, 'Category'),
        ));
    }

    public function actionCreate() {
        $model = new Category;
        $model->scenario = 'add_mode';

        if (isset($_POST['Category'])) {
            $model->setAttributes($_POST['Category']);

            if ($model->validate()) {
                $oFile = CUploadedFile::getInstanceByName('Category[category_image]');
                if ($oFile) {

                    $ssUploadPath = Yii::getPathOfAlias('webroot') . '/uploads/category_images/';
                    $ssNewName = md5($oFile->name . time()) . '.' . $oFile->extensionName;
                    $oFile->saveAs($ssUploadPath . '/' . $ssNewName);

                    // SAVE IMAGE INFO INTO DB //
                    $model->category_image = $ssNewName;
                }
                $model->save();
                Yii::app()->user->setFlash('success', "Record has been successfully created.");
                $this->redirect(array('admin'));
            }
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id, 'Category');
        $model->scenario = 'edit_mode';

        if (isset($_POST['Category'])) {
            $ssOldImage = $model->category_image;
            $amPostData = $_POST['Category'];
            $model->setAttributes($amPostData);

            $oFile = CUploadedFile::getInstanceByName('Category[category_image]');
            if ($oFile) {
                $ssUploadPath = Yii::getPathOfAlias('webroot') . '/uploads/category_images/';
                $ssNewName = md5($oFile->name . time()) . '.' . $oFile->extensionName;
                $oFile->saveAs($ssUploadPath . '/' . $ssNewName);

                // REMOVE OLD IMAGE //
                Common::removeOldImage($ssOldImage, $ssUploadPath);
                // SAVE IMAGE INFO INTO DB //
                $model->category_image = $ssNewName;
            }
            $model->save();
            Yii::app()->user->setFlash('success', "Record has been successfully updated");
            $this->redirect(array('admin'));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id) {
        if (Yii::app()->getRequest()->getIsPostRequest()) {
            $model = $this->loadModel($id, 'Category');
            $ssOldImage = $model->category_image;
            if ($model->delete()) {
                $ssUploadPath = Yii::getPathOfAlias('webroot') . '/uploads/category_images/';
                Common::removeOldImage($ssOldImage, $ssUploadPath);
            }
            if (!Yii::app()->getRequest()->getIsAjaxRequest())
                $this->redirect(array('admin'));
        }
        else
            throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
    }

    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Category');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdmin() {
        $model = new Category('search');
        $model->unsetAttributes();

        if (isset($_GET['Category']))
            $model->setAttributes($_GET['Category']);

        $this->render('admin', array(
            'model' => $model,
        ));
    }

}