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


    public function actionGetCategoryList()
    {
        $data=Category::model()->findAll('category_type=:category_type and status = 1 and parent_id = 0 ',array(':category_type'=>$_POST['Category']['category_type']));
        $data=CHtml::listData($data,'id','category_name');
       // echo CHtml::tag('option',0,"Select",true);
        echo CHtml::tag('option',array('value'=>0),CHtml::encode("Select"),true);
        foreach($data as $value=>$name)
        {
            echo CHtml::tag('option',array('value'=>$value),CHtml::encode($name),true);
        }

        /*$oCriteria = new CDbCriteria;
        $oCriteria->alias = 'c';
        $oCriteria->condition = "c.status = 1";
        if ($ssType != '') {
            $oCriteria->addCondition("category_type = '$ssType'");
        }
        if ($bOnlyParent) {
            $oCriteria->addCondition("parent_id = 0");
        }
        $omResultSet = self::model()->findAll($oCriteria);*/
    }
}