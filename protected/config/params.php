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
);
