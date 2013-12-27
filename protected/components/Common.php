<?php

/**
 * This is the Common model class for declared general functions/methods.
 */
class Common
{

    /**
     * function: objectToArray()
     * For Convert Object To Array
     * @param $object
     * @return array $amConverted
     */
    public static function objectToArray($object)
    {
        $amConverted = array();
        foreach ($object as $member => $data) {
            $amConverted[$member] = (array)$data;
        }
        return $amConverted;
    }

    /**
     * function: base64UrlDecode()
     * For decode data into base64 method
     * @param $input
     * @return string decoded data
     */
    public static function base64UrlDecode($input)
    {
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
    public static function commonUpdateField($ssTableName, $ssFieldName, $smFieldValue, $ssCompareField, $smCompareValue)
    {
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
    public static function commonDeleteRecord($ssTableName, $ssCompareField, $smCompareValue)
    {
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
    public static function generateToken($snLength)
    {
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
    public static function createImageURL($ssImageName)
    {
        $ssProfileImageURL = Yii::app()->params['image_upload_url'] . Yii::app()->request->baseUrl . '/uploads/' . $ssImageName;
        return $ssProfileImageURL;
    }

    /**
     * Function replaceMailContent  Replace  Dynamic Mail Content
     * @param $omContent = object of old content
     * @param $asDynamicContent = array of dynamic content
     * return $ssBodyContent = string of replaced old content
     */
    static public function replaceMailContent($ssBodyContent, $asDynamicContent)
    {
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
    public static function sendMail($ssToEmail, $asFromEmail, $ssSubject, $ssBody)
    {
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
    public static function closeColorBox($ssRedirectUrl)
    {
        $ssRedirectUrl = Yii::app()->params['site_url'] . $ssRedirectUrl;
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
    public static function getListCountry()
    {
        $model = CountryMaster::model()->findAll();
        return CHtml::listData($model, 'id', 'country');
    }

    /**
     * function: getSliderImage()
     * @param string $ssImage
     * @return image.
     */
    public static function getSliderImage($ssImage)
    {

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
    public static function getCategoryImage($ssImage)
    {
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

    public static function getCategoryImageUrl($ssImage)
    {
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
    public static function removeOldImage($ssName, $ssOrigPath, $ssThumbPath = '')
    {

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

    public static function getEventImage($ssImage)
    {
        $ssOrigPath = Yii::getPathOfAlias('webroot') . '/uploads/event_images/';
        $amImageInfo = pathinfo($ssImage);
        $ssImageName = $ssOrigPath . $amImageInfo['basename'];
        if ($ssImage != "" && file_exists($ssImageName)) {
            return Yii::app()->params['site_url'] . Yii::app()->baseUrl . '/uploads/event_images/thumb/' . $ssImage;
        } else {
            return Yii::app()->params['site_url'] . Yii::app()->baseUrl . '/images/no-img.jpg';
        }
    }

    public static function eventRedirectPage($oUser)
    {
        $ssUrl = ($oUser->redirect_page == 0) ? Yii::app()->createUrl('eventPlanner/index') : (($oUser->redirect_page == 1) ? Yii::app()->createUrl('eventPlanner/step1') : Yii::app()->createUrl('eventPlanner/step2'));
        return $ssUrl;
    }

    public static function vendorRedirectPage($oUser)
    {
        $ssUrl = '';
        if ($oUser->redirect_page == 0) {
            $ssUrl = Yii::app()->createUrl('vendor/index');
        } elseif ($oUser->redirect_page == 1) {
            $ssUrl = Yii::app()->createUrl('vendor/step1');
        } elseif ($oUser->redirect_page == 2) {
            $ssUrl = Yii::app()->createUrl('vendor/step2');
        } else {
            $ssUrl = Yii::app()->createUrl('vendor/step3');
        }
        return $ssUrl;
    }

    public static function getVendorImage($ssImage)
    {
        $ssOrigPath = Yii::getPathOfAlias('webroot') . '/uploads/user_images/';
        $amImageInfo = pathinfo($ssImage);
        $ssImageName = $ssOrigPath . $amImageInfo['basename'];
        if ($ssImage != "" && file_exists($ssImageName)) {
            return Yii::app()->params['site_url'] . Yii::app()->baseUrl . '/uploads/user_images/thumb/' . $ssImage;
        } else {
            return Yii::app()->params['site_url'] . Yii::app()->baseUrl . '/images/default-img.png';
        }
    }

    public static function getVendorLastPhoto($omUserPhotos)
    {
        if (!empty($omUserPhotos)) {
            $smPhoto = Yii::app()->params['site_url'] . Yii::app()->baseUrl . '/images/up-photos.png';
            foreach ($omUserPhotos as $omUserPhoto) {
                $smPhoto = Yii::app()->params['site_url'] . Yii::app()->baseUrl . '/uploads/user_images/' . $omUserPhoto->photo_url;
            }
            return $smPhoto;
        } else {
            return Yii::app()->params['site_url'] . Yii::app()->baseUrl . '/images/up-photos.png';
        }
    }

    public static function getVendorLastVideoImage($omUserVideos)
    {
        if (!empty($omUserVideos)) {
            $snVideoImage = Yii::app()->params['site_url'] . Yii::app()->baseUrl . '/images/video.png';
            foreach ($omUserVideos as $omUserVideo) {
                $snVideoImage = $omUserVideo->video_image;
            }
            return $snVideoImage;
        } else {
            return Yii::app()->params['site_url'] . Yii::app()->baseUrl . '/images/video.png';
        }
    }


    public static function getCategoryNames($pId)
    {
        $oCriteria = new CDbCriteria();
        $oCriteria->alias = "c";
        $oCriteria->join = " left join amazon_products_categories as p on c.id = p.category_id ";
        $oCriteria->condition = " p.product_id = " . $pId;

        $oCriteria->select = " p.*,c.* ";

        $oCategories = Category::model()->findAll($oCriteria);
        $str = array();
        foreach($oCategories as $objCategory)
        {
            $str[] = $objCategory->category_name;
        }
        return implode(",",$str);
    }
    public static function textTruncate($source_text, $word_count)
    {
        $word_count++;
        $long_enough = TRUE;
        if ((trim($source_text) != "") && ($word_count > 0)) {
            $split_text = explode(" ", $source_text, $word_count);
            if (sizeof($split_text) < $word_count) {
                $long_enough = FALSE;
            } else {
                array_pop($split_text);
                $source_text = implode(" ", $split_text);
            }
        }
        return $long_enough;
    }

    public static function getSubCategoryCount($catId)
    {
        $oCriteria = new CDbCriteria();
        $oCriteria->condition = ' parent_id = ' . $catId;
        $oCategories = Category::model()->count($oCriteria);

        return $oCategories;
    }
    public static function getSubCategories($catId,$type)
    {
        $oCriteria = new CDbCriteria();
        $type = ($type == 'panner_div') ? "EVENT" : "VENDOR";
        $oCriteria->condition = ' parent_id = ' . $catId . " and category_type = '" . $type . "' ";
        $oCategories = Category::model()->findAll($oCriteria);

        return $oCategories;
    }
    public static function trim($string, $charCount, $endString = '...')
    {
        if (strlen($string) < $charCount)
            return $string;
        if (preg_match('/\W/', $string[$charCount])) {
            $trimedString = substr($string, 0, $charCount);
            if (preg_match('/\W/', $trimedString[strlen($trimedString) - 1])) {
                $trimedString = substr($string, 0, strlen($trimedString) - 1);
            }
            $trimedString .= $endString;
        } else {
            $str = substr($string, 0, $charCount);
            for ($i = strlen($str) - 1; $i >= 0; $i--) {
                if (preg_match('/\W/', $str[$i])) {
                    $position = $i;
                    break;
                }
            }
            $trimedString = substr($str, 0, $position);
            if (preg_match('/\W/', $trimedString[strlen($trimedString) - 1])) {
                $trimedString = substr($string, 0, strlen($trimedString) - 1);
            }
            $trimedString .= $endString;
        }
        return $trimedString;
    }

    /**
     * function: getUserMenusAsPerRole()
     * @return array $amMenuItems
     */
    public static function getUserMenusAsPerRole($ssRoleType)
    {
        $amMenuItems = array();
        switch ($ssRoleType) {
            case 'event_planner':
                $amMenuItems = array(
                    '1' => array(
                        'link_name' => 'Home',
                        'url' => array('eventPlanner/index'),
                        'title' => 'My Home'
                    ),
                    '2' => array(
                        'link_name' => 'Past Events',
                        'url' => array('eventPlanner/pastEvents'),
                        'title' => 'Past Events'
                    ),
                    '3' => array(
                        'link_name' => 'Transaction History',
                        'url' => '#',
                        'title' => 'Transaction History'
                    ),
                    '4' => array(
                        'link_name' => 'Become a Vendor',
                        'url' => '#',
                        'title' => 'Become a Vendor'
                    ),
                    '5' => array(
                        'link_name' => 'My Account',
                        'url' => array('eventPlanner/step1'),
                        'title' => 'My Account'
                    )
                );
                return $amMenuItems;
                break;
            case 'vendor':
                $amMenuItems = array(
                    '1' => array(
                        'link_name' => 'Vendor Home',
                        'url' => array('Vendor/index'),
                        'title' => 'Vendor Home'
                    ),
                    '2' => array(
                        'link_name' => 'Transaction History',
                        'url' => '#',
                        'title' => 'Transaction History'
                    ),
                    '3' => array(
                        'link_name' => 'My Reviews',
                        'url' => '#',
                        'title' => 'My Reviews'
                    ),
                    '4' => array(
                        'link_name' => 'Profile Analysis',
                        'url' => '#',
                        'title' => 'Profile Analysis'
                    ),
                    '5' => array(
                        'link_name' => 'Featured Listing',
                        'url' => '#',
                        'title' => 'Featured Listing'
                    ),
                    '6' => array(
                        'link_name' => 'My Account',
                        'url' => array('vendor/step1'),
                        'title' => 'My Account'
                    )
                );
                return $amMenuItems;
                break;
            default:
                $amMenuItems = array(
                    '1' => array(
                        'link_name' => 'Home',
                        'url' => array('site/index'),
                        'title' => 'Home'
                    ),
                    '2' => array(
                        'link_name' => 'How it Works',
                        'url' => '#',
                        'title' => 'How it Works'
                    ),
                    '3' => array(
                        'link_name' => 'Plan an Event',
                        'url' => '#',
                        'title' => 'Plan an Event'
                    ),
                    '4' => array(
                        'link_name' => 'Become a Vendor',
                        'url' => '#',
                        'title' => 'Become a Vendor'
                    ),
                    '5' => array(
                        'link_name' => 'Find an Event Planner',
                        'url' => '#',
                        'title' => 'Find an Event Planner'
                    ),
                    '6' => array(
                        'link_name' => 'View Demo',
                        'url' => '#',
                        'title' => 'View Demo'
                    ),
                );
                return $amMenuItems;
                break;
        }
    }
}

