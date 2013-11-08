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
            p($oModel->attributes);
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