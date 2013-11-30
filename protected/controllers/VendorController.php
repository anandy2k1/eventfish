<?php

class VendorController extends GxController
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

    public function accessRules()
    {

        return array(
            array('deny', // deny Guest user to perform 'create', 'update' and 'delete' actions
                'actions' => array('index', 'step1', 'step2'),
                'users' => array('Guest'),
            ),
            array('allow', // allow authenticated users to access all actions
                'actions' => array('error'),
                'users' => array('Guest'),
            ),
            //array('deny'),
        );
    }

    public function actionIndex()
    {
        $this->render('index');
    }

    public function actionStep1()
    {
        $oModel = Users::model()->findByPk(Yii::app()->user->id);

        if (Yii::app()->getRequest()->getIsPostRequest()) {
            $amPostData = $_POST['Users'];

            $oModel->setAttributes($amPostData);
            $oModel->save(false);

            $anCategoryIds = isset($_POST['categoryids']) ? $_POST['categoryids'] : array();
            if (count($anCategoryIds) > 0) {
                UserCategories::addCategories($oModel->id, $anCategoryIds);
            }
            $this->redirect(array('vendor/step2'));
        }
        // FOR GET STATUS DATA AS PER COUNTRY ID //
        $snDefaultCountryId = Yii::app()->params['defaultCountryId']['US'];
        $oCriteria = new CDbCriteria();
        $oCriteria->condition = "country_id = $snDefaultCountryId";
        $omStates = StateMaster::model()->findAll($oCriteria);
        $amStates = CHtml::listData($omStates, 'id', 'state_abbv');

        $this->render('step1', array(
            'model' => $oModel,
            'amStates' => $amStates,
            'ssSearchBy' => ''
        ));
    }

    public function actionStep2()
    {
        $oModel = Users::model()->findByPk(Yii::app()->user->id);
        if (Yii::app()->getRequest()->getIsPostRequest()) {
            $amPostData = $_POST['Users'];
            $oModel->setAttributes($amPostData);
            $oModel->save(false);

            // FOR SAVE VENDOR PHOTOS //
            $oFile = CUploadedFile::getInstanceByName('Users[vendor_image]');
            if ($oFile) {

                $ssUploadPath = Yii::getPathOfAlias('webroot') . '/uploads/user_images';
                $ssNewName = md5($oFile->name . time()) . '.' . $oFile->extensionName;
                $ssSaveImageFile = $ssUploadPath . '/' . $ssNewName;
                $oFile->saveAs($ssSaveImageFile);

                // GENERATE THUMBNAIL FOR DISPLY INTO FRONT SIDE //
                $oThumb = Yii::app()->phpThumb->create($ssSaveImageFile);
                $ssImgThumbWidth = Yii::app()->params['vendor_profile_width'];
                $ssImgThumbHeight = Yii::app()->params['vendor_profile_heigh'];
                $oThumb->resize($ssImgThumbWidth, $ssImgThumbHeight);
                $ssStoreThumbImage = $ssUploadPath . '/thumb/' . $ssNewName;
                $oThumb->save($ssStoreThumbImage);

                // SAVE IMAGE INFO INTO DB //
                $oUserPhoto = new UserPhotos;
                $oUserPhoto->user_id = $oModel->id;
                $oUserPhoto->photo_url = $ssNewName;
                $oUserPhoto->save();
            }

            // FOR SAVE VENDOR TOP 5 QUESTIONS //
            if (isset($_POST['questions'][0]) && $_POST['questions'][0] != "") {
                UserTop5Questions::model()->deleteAll('vendor_id = ' . Yii::app()->admin->id);
                foreach ($_POST['questions'] as $ssQuestion) {
                    if ($ssQuestion != "") {
                        // SAVE IMAGE INFO INTO DB //
                        $oUserTop5Q = new UserTop5Questions();
                        $oUserTop5Q->vendor_id = $oModel->id;
                        $oUserTop5Q->question = $ssQuestion;
                        $oUserTop5Q->save();
                    }
                }
            }

            Yii::app()->user->setFlash('success', "Vendor personal details has been successfully saved.");
            $this->redirect(array('vendor/step2'));
        }
        $this->render('step2', array(
            'model' => $oModel
        ));
    }

    public function actionRenderCategoryTab(){
        $this->layout = false;
        $ssSearchBy = Yii::app()->getRequest()->getParam('search_by','');




        $this->render('renderCategoryTab', array(
            'ssSearchBy' => $ssSearchBy
        ));
    }

    public function actionGetRenderCategories()
    {
        $this->layout = false;
        $snParentId = Yii::app()->getRequest()->getParam('parent_id', 0);
        $ssSearchBy = Yii::app()->getRequest()->getParam('search_by', '');
        $oCategories = Category::getRenderCategories($snParentId, $ssSearchBy);


        $this->render('getRenderCategories', array(
            'model' => $oCategories
        ));
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    /*
      protected function performAjaxValidation($model, $ssFormName) {
      if (isset($_POST['ajax']) && $_POST['ajax'] === $ssFormName) {
      echo CActiveForm::validate($model);
      Yii::app()->end();
      }
      } */
}