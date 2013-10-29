<?php

class SliderImageManagementController extends AdminCoreController {

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function actionCreate() {
        $model = new SliderImageManagement;
        $model->scenario = 'add_mode';

        if (isset($_POST['SliderImageManagement'])) {
            $amPostData = $_POST['SliderImageManagement'];
            $model->setAttributes($amPostData);
            if ($model->validate()) {
                $oFile = CUploadedFile::getInstanceByName('SliderImageManagement[image_url]');
                if ($oFile) {

                    $ssUploadPath = Yii::getPathOfAlias('webroot') . '/uploads/slider_images/';
                    $ssNewName = md5($oFile->name . time()) . '.' . $oFile->extensionName;
                    $oFile->saveAs($ssUploadPath . '/' . $ssNewName);

                    // SAVE IMAGE INFO INTO DB //
                    $model->image_url = $ssNewName;
                }

                $model->save();
                Yii::app()->user->setFlash('success', "Image has been successfully uploaded");
                $this->redirect(array('admin'));
            }
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id, 'SliderImageManagement');
        $model->scenario = 'edit_mode';

        if (isset($_POST['SliderImageManagement'])) {

            $ssOldImage = $model->image_url;
            $amPostData = $_POST['SliderImageManagement'];
            $model->setAttributes($amPostData);

            if ($model->validate()) {

                $oFile = CUploadedFile::getInstanceByName('SliderImageManagement[image_url]');
                if ($oFile) {
                    $ssUploadPath = Yii::getPathOfAlias('webroot') . '/uploads/slider_images/';
                    $ssNewName = md5($oFile->name . time()) . '.' . $oFile->extensionName;
                    $oFile->saveAs($ssUploadPath . '/' . $ssNewName);

                    // REMOVE OLD IMAGE //
                    Common::removeOldImage($ssOldImage, $ssUploadPath);
                    // SAVE IMAGE INFO INTO DB //
                    $model->image_url = $ssNewName;
                }
                $model->save();
                Yii::app()->user->setFlash('success', "Image has been successfully updated");
                $this->redirect(array('admin'));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id) {
        if (Yii::app()->getRequest()->getIsPostRequest()) {
            $model = $this->loadModel($id, 'SliderImageManagement');
            $ssOldImage = $model->image_url;
            if ($model->delete()) {
                $ssUploadPath = Yii::getPathOfAlias('webroot') . '/uploads/slider_images/';
                Common::removeOldImage($ssOldImage, $ssUploadPath);
            }
            if (!Yii::app()->getRequest()->getIsAjaxRequest())
                $this->redirect(array('admin'));
        }
        else
            throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
    }

    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('SliderImageManagement');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdmin() {
        $model = new SliderImageManagement('search');
        $model->unsetAttributes();

        if (isset($_GET['SliderImageManagement']))
            $model->setAttributes($_GET['SliderImageManagement']);

        $this->render('admin', array(
            'model' => $model,
        ));
    }

}