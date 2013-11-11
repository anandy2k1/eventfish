<?php

/**
 * This is the Common model class for declared general functions/methods.
 */
class Common {

    /**
     * function: objectToArray()
     * For Convert Object To Array 
     * @param $object
     * @return array $amConverted
     */
    public static function objectToArray($object) {
        $amConverted = array();
        foreach ($object as $member => $data) {
            $amConverted[$member] = (array) $data;
        }
        return $amConverted;
    }

    /**
     * function: base64UrlDecode()
     * For decode data into base64 method
     * @param $input
     * @return string decoded data
     */
    public static function base64UrlDecode($input) {
        return base64_decode(strtr($input, '-_', '+/'));
    }

    /**
     * function commonUpdateField
     * for Update a single field for any table.
     *
     * @param $ssTableName Table Name
     * @param $ssFieldName Field Name
     * @param $smFieldValue Field Value
     * @param $ssCompareField Comapare Field Name
     * @param $smCompareValue Compare Filed Value
     *
     * return boolean
     */
    public static function commonUpdateField($ssTableName, $ssFieldName, $smFieldValue, $ssCompareField, $smCompareValue) {
        Yii::app()->db->createCommand()
                ->update($ssTableName, array($ssFieldName => $smFieldValue,
                        ), $ssCompareField . '=:compare_value', array(':compare_value' => $smCompareValue));

        return true;
    }

    /**
     * function commonDeleteRecord
     * for delete the records from table of matched criteria.
     *
     * @param $ssTableName Table Name
     * @param $ssCompareField Comapare Field Name
     * @param $smCompareValue Compare Filed Value
     *
     * return boolean
     */
    public static function commonDeleteRecord($ssTableName, $ssCompareField, $smCompareValue) {
        Yii::app()->db->createCommand()
                ->delete($ssTableName, $ssCompareField . '=:compare_value', array(':compare_value' => $smCompareValue));

        return true;
    }

    /**
     * function: generateToken()
     * For generate random token
     * @param integer $snLength 
     * @return array $smCode
     */
    public static function generateToken($snLength) {
        $smCode = "";
        $smData = "AbcDE123IJKLMN67QRSTUVWXYZaBCdefghijklmn123opq45rs67tuv89wxyz0FGH45OP89";
        for ($snI = 0; $snI < $snLength; $snI++)
            $smCode .= substr($smData, (rand() % (strlen($smData))), 1);

        return strtolower($smCode);
    }

    /**
     * function: createImageURL()
     * For generate random number
     * @param integer $snLength 
     * @return array $smCode
     */
    public static function createImageURL($ssImageName) {
        $ssProfileImageURL = Yii::app()->params['image_upload_url'] . Yii::app()->request->baseUrl . '/uploads/' . $ssImageName;
        return $ssProfileImageURL;
    }

    /**
     * Function replaceMailContent  Replace  Dynamic Mail Content
     * @param $omContent = object of old content
     * @param $asDynamicContent = array of dynamic content
     * return $ssBodyContent = string of replaced old content 
     */
    static public function replaceMailContent($ssBodyContent, $asDynamicContent) {
        if (trim($ssBodyContent) != '') {
            foreach ($asDynamicContent as $key => $value)
                $ssBodyContent = str_replace($key, $value, $ssBodyContent);

            return $ssBodyContent;
        }
        return false;
    }

    /**
     * function: sendMail()
     * For send apple push notification.
     * @param string $ssToEmail
     * @param string $asFromEmail 
     * @param string $ssSubject
     * @param string $ssBody
     */
    public static function sendMail($ssToEmail, $asFromEmail, $ssSubject, $ssBody) {
        $omMessage = new YiiMailMessage;

        $omMessage->setTo($ssToEmail);
        $omMessage->setFrom($asFromEmail);
        $omMessage->setSubject($ssSubject);
        $omMessage->setBody($ssBody, 'text/html', 'utf-8');

        $bMailStatus = Yii::app()->mail->send($omMessage);

        return $bMailStatus;
    }

    /**
     * function: closeColorBox()
     * For close color box popup window.
     * @param string $ssCloseScript
     */
    public static function closeColorBox($ssRedirectUrl) {        
        $ssRedirectUrl = Yii::app()->params['site_url'].$ssRedirectUrl;
        $ssCloseScript = "<script src='" . Yii::app()->request->baseUrl . "/js/jquery.js'></script>";
        $ssCloseScript .= "<script src='" . Yii::app()->request->baseUrl . "/js/colorbox/jquery.colorbox.js'></script>";
        //$ssCloseScript .= "<script type='text/javascript'>parent.jQuery.colorbox.close(); parent.window.location.reload(true);</script>";
        $ssCloseScript .= "<script type='text/javascript'>parent.jQuery.colorbox.close(); parent.window.location.href = '" . $ssRedirectUrl . "';</script>";

        echo $ssCloseScript;
        exit;
        //return $ssCloseScript;
    }

    /**
     * function: getListCountry()        
     * @param none
     * @return array.
     */
    public static function getListCountry() {
        $model = CountryMaster::model()->findAll();
        return CHtml::listData($model, 'id', 'country');
    }

    /**
     * function: getSliderImage()        
     * @param string $ssImage
     * @return image.
     */
    public static function getSliderImage($ssImage) {

        $ssOrigPath = Yii::getPathOfAlias('webroot') . '/uploads/slider_images/';
        $amImageInfo = pathinfo($ssImage);
        $ssImageName = $ssOrigPath . $amImageInfo['basename'];
        if (file_exists($ssImageName)) {
            return CHtml::image(Yii::app()->baseUrl . '/uploads/slider_images/' . $ssImage, "", array('width' => '75px', 'height' => '75px'));
        } else {
            return CHtml::image(Yii::app()->baseUrl . '/uploads/slider_images/no-img.jpg', "", array('width' => '75px', 'height' => '75px'));
        }
    }

    /**
     * function: getCategoryImage()        
     * @param string $ssImage
     * @return image.
     */
    public static function getCategoryImage($ssImage) {
        //return CHtml::image(Yii::app()->baseUrl . '/uploads/category_images/' . $ssImage, "", array('width' => '75px', 'height' => '75px'));

        $ssOrigPath = Yii::getPathOfAlias('webroot') . '/uploads/category_images/';
        $amImageInfo = pathinfo($ssImage);
        $ssImageName = $ssOrigPath . $amImageInfo['basename'];
        if ($ssImage != "" && file_exists($ssImageName)) {

            return CHtml::image(Yii::app()->baseUrl . '/uploads/category_images/' . $ssImage, "", array('width' => '75px', 'height' => '75px'));
        } else {
            return CHtml::image(Yii::app()->baseUrl . '/images/no-img.jpg', "", array('width' => '75px', 'height' => '75px'));
        }
    }

    public static function getCategoryImageUrl($ssImage) {
        $ssOrigPath = Yii::getPathOfAlias('webroot') . '/uploads/category_images/';
        $amImageInfo = pathinfo($ssImage);
        $ssImageName = $ssOrigPath . $amImageInfo['basename'];
        if ($ssImage != "" && file_exists($ssImageName)) {
            return Yii::app()->params['site_url'] . Yii::app()->baseUrl . '/uploads/category_images/' . $ssImage;
        } else {
            return Yii::app()->params['site_url'] . Yii::app()->baseUrl . '/images/no-img.jpg';
        }
    }

    /**
     * function: removeOldImage()        
     * @param string $ssName 
     * @param string $ssOrigPath 
     * @param string $ssThumbPath 
     * For remove image.
     */
    public static function removeOldImage($ssName, $ssOrigPath, $ssThumbPath = '') {

        $amImageInfo = pathinfo($ssName);
        $ssImageName = $ssOrigPath . $amImageInfo['basename'];
        if ($ssName != "" && file_exists($ssImageName))
            unlink($ssImageName);

        if ($ssThumbPath != "") {
            $ssThumbPhotoPath = $ssThumbPath . $amImageInfo['basename'];
            if ($ssName != "" && file_exists($ssThumbPhotoPath))
                unlink($ssThumbPhotoPath);
        }
    }

}

