<?php

// this contains the application parameters that can be maintained via GUI
return array(
    'title' => 'EventFish',
    'adminEmail' => 'info@eventfish.com',
    'postsPerPage' => 10,
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

    'adminEmail'=>'anandy2k1@gmail.com',
    'FACEBOOK_APPID'  => '545510715524866', // '222260334571937',
    'FACEBOOK_SECRET' => '207c0eb32450f374446849b9ae5a9007', // 'f1d07d229e54735c1107905898fcb861',


);

