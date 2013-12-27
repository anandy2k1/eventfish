<?php

// this contains the application parameters that can be maintained via GUI
return array(
    'title' => 'EventFish',
    'adminEmail' => 'info@eventfish.com',
    'postsPerPage' => 10,
    'productPerPage' => 5,
    'copyrightInfo' => 'Copyright &copy; 2009 by EventFish.',
    'site_url' => 'http://' . $_SERVER['SERVER_NAME'], // LOCAL  
    'site_name' => 'Event-Fish',
    'uploadDir' => 'uploads/',
    'noImagePath' => 'images/noimage.jpg',
    'uploadDirBasePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '../../uploads/',
    'defaultDateFormat' => 'm/d/Y',
    'categoryType' => array(
        'EVENT' => 'Event Planner',
        'VENDOR' => 'Service Provider',
    ),
    'category_image_thumb_width' => '137px',
    'category_image_thumb_height' => '97px',
    'home_category_limit' => 9,
    'defaultSliderType' => array(
        0 => 'Slider Image',
        1 => 'Home Banner'
    ),
    'defaultStatus' => array(
        '1' => 'Active',
        '0' => 'InActive',
    ),
    'defaultCountryId' => array(
        'US' => '1'
    ),
    'compareUserType' => array(
        'admin' => '1',
        'event_planner' => '2',
        'vendor' => '3',
    ),
    'displayEthnicity' => array(
        'Not Specified' => 'Choose Ethnicity',
        'Asian' => 'Asian',
        'Caucasian' => 'Caucasian',
        'African American ' => 'African American',
        'Spanish' => 'Spanish',
        'Portuguese' => 'Portuguese',
        'Russian' => 'Russian'
    ),
    'displayIncomeLevel' => array(
        'Not Specified' => 'Income Level',
        '$0 - $60,000' => '$0 - $60,000',
        '$60,000 - $75,000' => '$60,000 - $75,000',
        '$75,000 - $90,000' => '$75,000 - $90,000',
        '$90,000 - $100, 000' => '$90,000 - $100, 000',
        '$100,000 or more' => '$100,000 or more'
    ),
    'displayMaritalStatus' => array(
        'Not Specified' => 'Choose Status',
        'Single' => 'Single',
        'Married' => 'Married',
        'Divorce' => 'Divorce'
    ),
    'REDIRECT_PAGE' => array(
        'HOME' => '0',
        'STEP1' => '1',
        'STEP2' => '2',
        'STEP3' => '3',
    ),

    'adminEmail' => 'anandy2k1@gmail.com',
    /*'FACEBOOK_APPID' => '222474297933675', // '222260334571937',
    'FACEBOOK_SECRET' => 'e34c58d546621e6f2689c676b26543f1', // 'f1d07d229e54735c1107905898fcb861',*/
    'FACEBOOK_APPID' => '564260773652299', // '222260334571937',
    'FACEBOOK_SECRET' => '9aa718ebde8e728fdb205ca1575b4efe', // 'f1d07d229e54735c1107905898fcb861',
    'category_thumb_width' => '137',
    'category_thumb_height' => '97',
    'slider_thumb_width' => '75',
    'slider_thumb_height' => '75',
    'event_thumb_width' => '300',
    'event_thumb_height' => '400',
    'vendor_profile_width' => '110',
    'vendor_profile_heigh' => '103',
    'categoryParentId' => array(
        'food' => 12,
        'entertainment' => 13,
        'rental' => 14,
        'transportation' => 15,
        'partyAccessories' => 42,
        'equipmentRentals' => 43,
        'costumes' => 44,
        'cloths' => 45
    ),

    'event_image_path' =>  '/uploads/event_images/',
    'event_image_thumb_path' => '/uploads/event_images/thumb/'
);