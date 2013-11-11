<?php

Yii::import('application.models._base.BaseUserCategories');

class UserCategories extends BaseUserCategories {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /** function addCategories() 
     * for add/remove selected/unselected category ids by the user.
     * @param  int     $snUserId
     * @param  array   $anCategoryIds
     * return  boolean
     */
    public static function addCategories($snUserId, $anCategoryIds) {
        foreach ($anCategoryIds as $snCategoryId) {
            // FOR CHECK USER ALREADY ADDED THE CATEGORY //
            $oCriteria = new CDbCriteria;
            $oCriteria->alias = 'uc';
            $oCriteria->condition = 'uc.user_id=:userID AND uc.category_id=:categoryID';
            $oCriteria->params = array(':userID' => $snUserId, ':categoryID' => $snCategoryId);
            $omRecordExists = UserCategories::model()->find($oCriteria);

            if (!$omRecordExists) {
                // FOR ADD CATEGORY UNDER USER //
                $oModel = new UserCategories();
                $oModel->user_id = $snUserId;
                $oModel->category_id = $snCategoryId;
                $oModel->save();
            }
        }
        // REMOVE CATEGORIES FROM USER WHICH ARE UNSELECTED //
        self::removeUnselectedCategoryIds($snUserId, $anCategoryIds);
        return true;
    }

    /** function removeUnselectedCategoryIds() 
     * for remove category which are unselected by the user
     * @param  int     $snUserId
     * @param  array   $anCategoryIds
     * return  boolean
     */
    public static function removeUnselectedCategoryIds($snUserId, $anCategoryIds) {
        $ssCriteria = (count($anCategoryIds) > 0) ? 'category_id NOT IN(' . implode(',', $anCategoryIds) . ') AND user_id = ' . $snUserId : 'user_id = ' . $snUserId;
        UserCategories::model()->deleteAll($ssCriteria);
        return true;
    }

}