<?php

class EventPlannerController extends Controller
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
            array('allow',
                'actions' => array('*'),
                'users' => array('@'),
            ),
            array('allow',
                'actions' => array('error'),
                'users' => array('*'),
            )
        );
    }

    public function actionIndex()
    {
        $this->render('index');
    }

    public function actionStep1()
    {
        $oModel = Users::model()->findByPk(Yii::app()->user->id);


        $amUserData = Yii::app()->admin->getState('admin');
        $ssUrl = '';
        $oUser = Users::model()->findByPk($amUserData['id']);
        if ($amUserData['role_id'] == UserRole::getRoleIdAsPerType('event_planner')) {
            if ($oUser->redirect_page != 1)
            {
                $ssUrl = Common::eventRedirectPage($oUser);
                $this->redirect($ssUrl);
            }
        }

        if (Yii::app()->getRequest()->getIsPostRequest()) {
            $amPostData = $_POST['Users'];
            $oModel->setAttributes($amPostData);
            $oModel->redirect_page = Yii::app()->params['REDIRECT_PAGE']['STEP2'];
            $oModel->save(false);

            $this->redirect(array('eventPlanner/step2'));
        }

        // FOR GET STATUS DATA AS PER COUNTRY ID //
        $snDefaultCountryId = Yii::app()->params['defaultCountryId']['US'];
        $oCriteria = new CDbCriteria();
        $oCriteria->condition = "country_id = $snDefaultCountryId";
        $omStates = StateMaster::model()->findAll($oCriteria);
        $amStates = CHtml::listData($omStates, 'id', 'state_abbv');

        $this->render('step1', array(
            'model' => $oModel,
            'amStates' => $amStates
        ));
    }

    public function actionStep2()
    {
        $oModel = Users::model()->findByPk(Yii::app()->user->id);
        if (Yii::app()->getRequest()->getIsPostRequest()) {
            $anCategoryIds = isset($_POST['categoryids']) ? $_POST['categoryids'] : array();
            if (count($anCategoryIds) > 0) {
                UserCategories::addCategories($oModel->id, $anCategoryIds);
                $oModel->redirect_page = Yii::app()->params['REDIRECT_PAGE']['HOME'];
                $oModel->save(false);
                $this->redirect(array('eventPlanner/step3'));
            }
        }

        // FOR GET ALL CATEGORIES //
        $omEventCategories = Category::getAllActiveCategories(Yii::app()->params['compareCategoryType']['event_planner']);

        // FOR GET USER SELECTED CATEGORIES //
        $oCriteria = new CDbCriteria();
        $oCriteria->condition = "user_id = :userID";
        $oCriteria->params = array(':userID' => Yii::app()->admin->id);
        $omCategories = UserCategories::model()->findAll($oCriteria);
        $amEventCategories = CHtml::listData($omCategories, 'category_id', 'category_id');

        $this->render('step2', array(
            'model' => $oModel,
            'omEventCategories' => $omEventCategories,
            'amEventCategories' => $amEventCategories
        ));
    }

    public function actionStep3()
    {

        $oModel = Users::model()->findByPk(Yii::app()->user->id);
        $this->render('step3', array(
            'model' => $oModel
        ));
    }

    public function actionPlanEventGeneralAdd()
    {
        $oModel = new Event();
        $oModel->scenario = 'add_mode';
        $bChecked = 0;

        // Uncomment the following line if AJAX validation is needed
        if (Yii::app()->getRequest()->getIsPostRequest()) {

            $bChecked = isset($_POST['use_my_address']) ? $_POST['use_my_address'] : 0;
            $amPostData = $_POST['Event'];
            $amStartTime = explode('.', $amPostData['start_time']);
            $amPostData['start_time'] = $amStartTime[0];
            $amEndTime = explode('.', $amPostData['end_time']);
            $amPostData['end_time'] = $amEndTime[0];
            $oModel->setAttributes($amPostData);
            if ($oModel->validate()) {
                $oFile = CUploadedFile::getInstanceByName('Event[event_image]');

                if ($oFile) {

                    $ssUploadPath = Yii::getPathOfAlias('webroot') . '/uploads/event_images';
                    $ssNewName = md5($oFile->name . time()) . '.' . $oFile->extensionName;
                    $ssSaveImageFile = $ssUploadPath . '/' . $ssNewName;
                    $oFile->saveAs($ssSaveImageFile);

                    // GENERATE THUMBNAIL FOR DISPLY INTO FRONT SIDE //
                    $oThumb = Yii::app()->phpThumb->create($ssSaveImageFile);
                    $ssImgThumbWidth = Yii::app()->params['event_thumb_width'];
                    $ssImgThumbHeight = Yii::app()->params['event_thumb_height'];
                    $oThumb->resize($ssImgThumbWidth, $ssImgThumbHeight);
                    $ssStoreThumbImage = $ssUploadPath . '/thumb/' . $ssNewName;
                    $oThumb->save($ssStoreThumbImage);

                    // SAVE IMAGE INFO INTO DB //
                    $oModel->event_image = $ssNewName;
                }
                $oModel->save();
                Yii::app()->user->setFlash('success', "Event general details has been successfully saved.");
                $this->redirect(array('eventPlanner/planEventAccessoriesAdd', 'id' => $oModel->id));
            }
        }
        // FOR GET STATUS DATA AS PER COUNTRY ID //
        $snDefaultCountryId = Yii::app()->params['defaultCountryId']['US'];
        $oCriteria = new CDbCriteria();
        $oCriteria->condition = "country_id = $snDefaultCountryId";
        $omStates = StateMaster::model()->findAll($oCriteria);
        $amStates = CHtml::listData($omStates, 'id', 'state_abbv');


        //$amUserData = Yii::app()->admin->getState('admin');
        $amUserData =  Users::model()->findByPK(Yii::app()->admin->id);
        $this->render('planEventGeneralAdd', array(
            'model' => $oModel,
            'amStates' => $amStates,
            'amUserData' => $amUserData,
            'bChecked' => $bChecked
        ));
    }

    public function actionPlanEventGeneralEdit($id)
    {
        $oModel = Event::model()->findByPk($id);
        $oModel->scenario = 'edit_mode';
        $bChecked = 0;

        // Uncomment the following line if AJAX validation is needed
        if (Yii::app()->getRequest()->getIsPostRequest()) {

            $ssOldImage = $oModel->event_image;
            $bChecked = isset($_POST['use_my_address']) ? $_POST['use_my_address'] : 0;
            $amPostData = $_POST['Event'];
            $oModel->setAttributes($amPostData);
            if ($oModel->validate()) {
                $oFile = CUploadedFile::getInstanceByName('Event[event_image]');

                if ($oFile) {

                    $ssUploadPath = Yii::getPathOfAlias('webroot') . '/uploads/event_images';
                    $ssNewName = md5($oFile->name . time()) . '.' . $oFile->extensionName;
                    $ssSaveImageFile = $ssUploadPath . '/' . $ssNewName;
                    $oFile->saveAs($ssSaveImageFile);

                    // GENERATE THUMBNAIL FOR DISPLY INTO FRONT SIDE //
                    $oThumb = Yii::app()->phpThumb->create($ssSaveImageFile);
                    $ssImgThumbWidth = Yii::app()->params['event_thumb_width'];
                    $ssImgThumbHeight = Yii::app()->params['event_thumb_height'];
                    $oThumb->resize($ssImgThumbWidth, $ssImgThumbHeight);
                    $ssStoreThumbImage = $ssUploadPath . '/thumb/' . $ssNewName;
                    $oThumb->save($ssStoreThumbImage);

                    // SAVE IMAGE INFO INTO DB //
                    // REMOVE OLD IMAGE //
                    $ssThumbPath = $ssUploadPath . '/thumb/';
                    Common::removeOldImage($ssOldImage, $ssUploadPath, $ssThumbPath);
                    $oModel->event_image = $ssNewName;
                }
                $oModel->save();
                Yii::app()->user->setFlash('success', "Event general details has been successfully saved.");
                $this->redirect(Yii::app()->createUrl('eventPlanner/planEventAccessoriesAdd',array('id' => $oModel->id)));
            }
        }
        // FOR GET STATUS DATA AS PER COUNTRY ID //
        $snDefaultCountryId = Yii::app()->params['defaultCountryId']['US'];
        $oCriteria = new CDbCriteria();
        $oCriteria->condition = "country_id = $snDefaultCountryId";
        $omStates = StateMaster::model()->findAll($oCriteria);
        $amStates = CHtml::listData($omStates, 'id', 'state_abbv');

        //$amUserData = Yii::app()->admin->getState('admin');
        $amUserData =  Users::model()->findByPK(Yii::app()->admin->id);
        $this->render('planEventGeneralEdit', array(
            'model' => $oModel,
            'amStates' => $amStates,
            'amUserData' => $amUserData,
            'bChecked' => $bChecked
        ));
    }

    public function actionPlanEventAccessoriesAdd()
    {
        $this->render('planEventAccessoriesAdd');
    }

    public function actionPlanEventAccessoriesEdit($id, $acce_id)
    {
        $this->render('planEventAccessoriesEdit');
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model, $ssFormName)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === $ssFormName) {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}