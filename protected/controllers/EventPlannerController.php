<?php

class EventPlannerController extends Controller {

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules() {
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

    public function actionStep1() {
        $oModel = Users::model()->findByPk(Yii::app()->user->id);

        if (Yii::app()->getRequest()->getIsPostRequest()) {
            $amPostData = $_POST['Users'];
            $oModel->setAttributes($amPostData);
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

    public function actionStep2() {
        $oModel = Users::model()->findByPk(Yii::app()->user->id);        
        if (Yii::app()->getRequest()->getIsPostRequest()) {
            $anCategoryIds = isset($_POST['categoryids']) ? $_POST['categoryids'] : array();
            if (count($anCategoryIds) > 0) {
                UserCategories::addCategories($oModel->id, $anCategoryIds);
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

    public function actionStep3() {
        $oModel = Users::model()->findByPk(Yii::app()->user->id);
        $this->render('step3', array(
            'model' => $oModel            
        ));
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model, $ssFormName) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === $ssFormName) {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}