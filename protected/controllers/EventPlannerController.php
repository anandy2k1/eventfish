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
        $omEvents = Event::getUserEvents(Yii::app()->user->id);

        $this->render('index', array(
            'omEvents' => $omEvents
        ));
    }

    public function actionStep1()
    {
        $oModel = Users::model()->findByPk(Yii::app()->user->id);
        $amUserData = Yii::app()->user->getState('admin');

        /* Commented on 21 Dec 2013
        $ssUrl = '';
        $oUser = Users::model()->findByPk($amUserData['id']);
        if ($amUserData['role_id'] == UserRole::getRoleIdAsPerType('event_planner')) {
            if ($oUser->redirect_page != 1) {
                $ssUrl = Common::eventRedirectPage($oUser);
                $this->redirect($ssUrl);
            }
        }*/

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
        $oCriteria->params = array(':userID' => Yii::app()->user->id);
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
            $oModel->user_id = Yii::app()->user->id;
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
        $amUserData = Users::model()->findByPK(Yii::app()->user->id);
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
                $this->redirect(Yii::app()->createUrl('eventPlanner/planEventAccessoriesAdd', array('id' => $oModel->id)));
            }
        }
        // FOR GET STATUS DATA AS PER COUNTRY ID //
        $snDefaultCountryId = Yii::app()->params['defaultCountryId']['US'];
        $oCriteria = new CDbCriteria();
        $oCriteria->condition = "country_id = $snDefaultCountryId";
        $omStates = StateMaster::model()->findAll($oCriteria);
        $amStates = CHtml::listData($omStates, 'id', 'state_abbv');

        //$amUserData = Yii::app()->admin->getState('admin');
        $amUserData = Users::model()->findByPK(Yii::app()->user->id);

        // FOR CHECK EVENT ACCESSORIES ARE EXISTS OR NOT //
        $oEventAccessories = EventAccessories::model()->findByAttributes(array('event_id' => $oModel->id));

        $this->render('planEventGeneralEdit', array(
            'model' => $oModel,
            'amStates' => $amStates,
            'amUserData' => $amUserData,
            'bChecked' => $bChecked,
            'oEventAccessories' => $oEventAccessories
        ));
    }

    public function actionPlanEventAccessoriesAdd($id)
    {
        // FOR GET EVENT DETAILS //
        $oEventModel = Event::model()->findByPk($id);

        // FOR SAVE SELECTED AMAZON PRODUCT QTY INTO EVENT ACCESSORIES TABLE //
        if (Yii::app()->getRequest()->getIsPostRequest()) {
            $bIsRecordSave = false;
            if (isset($_POST['qty'])) {
                foreach ($_POST['qty'] as $snProductId => $snQty) {
                    if ($snQty > 0) {
                        $oModel = new EventAccessories();
                        $oModel->event_id = $oEventModel->id;
                        $oModel->amazon_product_id = $snProductId;
                        $oModel->qty = $snQty;
                        $oModel->save(false);
                        $bIsRecordSave = true;
                    }
                }
            }
            // IF IS RECORD SAVE SUCCESSFULLY REDIRECT INTO INVITATION PAGE //
            if ($bIsRecordSave) {
                Yii::app()->user->setFlash('success', "Amazon product accessories has been successfully added.");
                $this->redirect(Yii::app()->createUrl('eventPlanner/sendEventInvitation', array('id' => $oEventModel->id)));
            }
        }

        $catId = Yii::app()->params['categoryParentId']['partyAccessories'];
        if (isset($_GET['catId'])) {
            $catId = $_GET['catId'];
        }

        // FOR FETCHING AMAZON PRODUCTS //
        $oCriteria = new CDbCriteria();
        $oCriteria->alias = 'amp';
        $oCriteria->join = "INNER JOIN amazon_products_categories amc ON amp.id = amc.product_id";
        $oCriteria->condition = 'amc.category_id= :snCategoryId';
        $oCriteria->params = array(':snCategoryId' => $catId);

        $count = AmazonProducts::model()->count($oCriteria);
        $pages = new CPagination($count);
        // results per page
        $pages->pageSize = Yii::app()->params['productPerPage'];
        if (isset($_GET['pagesize'])) {
            $pages->pageSize = $_GET['pagesize'];
        }
        $pageNumber = 1;
        if (isset($_GET['page'])) {
            $pageNumber = $_GET['page'];
        }
        $totalPages = ceil((float)($count / $pages->pageSize));

        $pages->applyLimit($oCriteria);
        $omAmazonProducts = AmazonProducts::model()->findAll($oCriteria);

        if (isset($_GET['ajaxcall'])) {
            $this->layout = false;
            $this->render('ajaxEventAccessoriesFetch',
                array(
                    'model' => $omAmazonProducts,
                    'pages' => $pages,
                    'totalPages' => $totalPages,
                    'pageNumber' => $pageNumber,
                    'pagesize' => $pages->pageSize,
                    'catId' => $catId,
                    'oEventModel' => $oEventModel,
                    'isEdit'=>'0'
                )
            );
        } else {
            $this->render('planEventAccessoriesAdd',
                array(
                    'model' => $omAmazonProducts,
                    'pages' => $pages,
                    'totalPages' => $totalPages,
                    'pageNumber' => $pageNumber,
                    'pagesize' => $pages->pageSize,
                    'catId' => $catId,
                    'oEventModel' => $oEventModel,
                    'isEdit'=>'0'
                )
            );
        }
    }

    public function actionPlanEventAccessoriesEdit($id)
    {
        // FOR GET EVENT DETAILS //
        $oEventModel = Event::model()->findByPk($id);

        // FOR SAVE SELECTED AMAZON PRODUCT QTY INTO EVENT ACCESSORIES TABLE //
        if (Yii::app()->getRequest()->getIsPostRequest()) {
            $bIsRecordSave = false;
            if (isset($_POST['qty'])) {
                foreach ($_POST['qty'] as $snProductId => $snQty) {
                    if (trim($snQty) != "") {
                        $omCheckIsProductExists = EventAccessories::model()->findByAttributes(array('event_id' => $oEventModel->id, 'amazon_product_id' => $snProductId));
                        $oModel = ($omCheckIsProductExists) ? $omCheckIsProductExists : new EventAccessories();
                        $oModel->event_id = $oEventModel->id;
                        $oModel->amazon_product_id = $snProductId;
                        $oModel->qty = $snQty;
                        $oModel->save(false);
                        $bIsRecordSave = true;
                    }
                }
            }
            // IF IS RECORD SAVE SUCCESSFULLY REDIRECT INTO INVITATION PAGE //
            if ($bIsRecordSave) {
                Yii::app()->user->setFlash('success', "Amazon product accessories has been successfully added.");
                $this->redirect(Yii::app()->createUrl('eventPlanner/sendEventInvitation', array('id' => $oEventModel->id)));
            }
        }

        $catId = Yii::app()->params['categoryParentId']['partyAccessories'];
        if (isset($_GET['catId'])) {
            $catId = $_GET['catId'];
        }

        // FOR FETCHING AMAZON PRODUCTS //
        $oCriteria = new CDbCriteria();
        $oCriteria->alias = 'amp';
        $oCriteria->join = "INNER JOIN amazon_products_categories amc ON amp.id = amc.product_id";
        $oCriteria->condition = 'amc.category_id= :snCategoryId';
        $oCriteria->params = array(':snCategoryId' => $catId);

        $count = AmazonProducts::model()->count($oCriteria);
        $pages = new CPagination($count);
        // results per page
        $pages->pageSize = Yii::app()->params['productPerPage'];
        if (isset($_GET['pagesize'])) {
            $pages->pageSize = $_GET['pagesize'];
        }
        $pageNumber = 1;
        if (isset($_GET['page'])) {
            $pageNumber = $_GET['page'];
        }
        $totalPages = ceil((float)($count / $pages->pageSize));

        $pages->applyLimit($oCriteria);
        $omAmazonProducts = AmazonProducts::model()->findAll($oCriteria);

        // FOR GET ADDED PRODUCTS FOR THIS EVENT //
        $oCriteria = new CDbCriteria();
        $oCriteria->alias = 'ama';
        $oCriteria->condition = 'ama.event_id = :snEventID';
        $oCriteria->params = array('snEventID' => $oEventModel->id);
        $omEventProducts = EventAccessories::model()->findAll($oCriteria);
        $anProducts = CHtml::listData($omEventProducts, 'amazon_product_id', 'amazon_product_id');
        $anProductsQty = CHtml::listData($omEventProducts, 'amazon_product_id', 'qty');

        // FOR CHECK EVENT ACCESSORIES ARE EXISTS OR NOT //
        $oEventAccessories = EventAccessories::model()->findByAttributes(array('event_id' => $oEventModel->id));

        if (isset($_GET['ajaxcall'])) {
            $this->layout = false;
            $this->render('ajaxEventAccessoriesFetch',
                array(
                    'model' => $omAmazonProducts,
                    'pages' => $pages,
                    'totalPages' => $totalPages,
                    'pageNumber' => $pageNumber,
                    'pagesize' => $pages->pageSize,
                    'catId' => $catId,
                    'oEventModel' => $oEventModel,
                    'anProducts' => $anProducts,
                    'anProductsQty' => $anProductsQty,
                    'oEventAccessories' => $oEventAccessories,
                    'isEdit'=>'1'
                )
            );
        } else {
            $this->render('planEventAccessoriesEdit',
                array(
                    'model' => $omAmazonProducts,
                    'pages' => $pages,
                    'totalPages' => $totalPages,
                    'pageNumber' => $pageNumber,
                    'pagesize' => $pages->pageSize,
                    'catId' => $catId,
                    'oEventModel' => $oEventModel,
                    'anProducts' => $anProducts,
                    'anProductsQty' => $anProductsQty,
                    'oEventAccessories' => $oEventAccessories,
                    'isEdit'=>'1'
                )
            );
        }
    }

    public function actionSendEventInvitation($id)
    {
        // FOR GET EVENT DETAILS //
        $oEventModel = Event::model()->findByPk($id);
        $oEventModel->scenario = 'edit_mode';
        $bChecked = 0;

        // Uncomment the following line if AJAX validation is needed
        if (Yii::app()->getRequest()->getIsPostRequest()) {

            $ssOldImage = $oEventModel->event_image;
            $bChecked = isset($_POST['use_my_address']) ? $_POST['use_my_address'] : 0;
            $amPostData = $_POST['Event'];
            $oEventModel->setAttributes($amPostData);
            if ($oEventModel->validate()) {
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
                    $oEventModel->event_image = $ssNewName;
                }
                $oEventModel->save();
                Yii::app()->user->setFlash('success', "Event details has been successfully updated.");
                $this->redirect(Yii::app()->createUrl('eventPlanner/sendEventInvitationStep2', array('id' => $oEventModel->id)));
            }
        }

        // FOR GET STATUS DATA AS PER COUNTRY ID //
        $snDefaultCountryId = Yii::app()->params['defaultCountryId']['US'];
        $oCriteria = new CDbCriteria();
        $oCriteria->condition = "country_id = $snDefaultCountryId";
        $omStates = StateMaster::model()->findAll($oCriteria);
        $amStates = CHtml::listData($omStates, 'id', 'state_abbv');

        // FOR GET USER INFO //
        $amUserData = Users::model()->findByPK(Yii::app()->user->id);

        // FOR CHECK EVENT ACCESSORIES ARE EXISTS OR NOT //
        $oEventAccessories = EventAccessories::model()->findByAttributes(array('event_id' => $oEventModel->id));

        $this->render('sendEventInvitation', array(
            'oEventModel' => $oEventModel,
            'amStates' => $amStates,
            'amUserData' => $amUserData,
            'bChecked' => $bChecked,
            'oEventAccessories' => $oEventAccessories
        ));
    }

    public function actionSendEventInvitationStep2($id)
    {
        // FOR GET EVENT DETAILS //
        $oEventModel = Event::model()->findByPk($id);

        // FOR CHECK EVENT ACCESSORIES ARE EXISTS OR NOT //
        $oEventAccessories = EventAccessories::model()->findByAttributes(array('event_id' => $oEventModel->id));

        $this->render('sendEventInvitationStep2', array(
            'oEventModel' => $oEventModel,
            'oEventAccessories' => $oEventAccessories
        ));
    }

    public function actionSendEventInvitationStep3($id)
    {
        // FOR GET EVENT DETAILS //
        if (isset($_POST['userdata'])) {
            Yii::app()->user->setState('amFbFriendsList', $_POST['userdata']);
            echo json_encode(array('error' => 0, 'redirect' => Yii::app()->createAbsoluteUrl('eventPlanner/sendEventInvitationStep3', array('id' => $id))));
            exit;
        }

        $oEventModel = Event::model()->findByPk($id);

        // FOR CHECK EVENT ACCESSORIES ARE EXISTS OR NOT //
        $oEventAccessories = EventAccessories::model()->findByAttributes(array('event_id' => $oEventModel->id));

        $this->render('sendEventInvitationStep3', array(
            'oEventModel' => $oEventModel,
            'oEventAccessories' => $oEventAccessories
        ));
    }
    public function actionPastEvents()
    {
        $amSearch = array();
        if (Yii::app()->getRequest()->getIsPostRequest()) {
          //  p($_POST);
        }
        $oCriteria = Event::getUserPastEvents(Yii::app()->user->id, $amSearch, true);
        $dataProvider = new CActiveDataProvider('Event', array(
                'criteria' => $oCriteria,
                'pagination' => array('pageSize' => 10)
            )
        );


        $this->render('pastEvents', array(
            'dataProvider' => $dataProvider,
        ));
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