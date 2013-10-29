<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body  class="loginpage">
        <div id="header">
            <div class="content">
                <div id="logo">
<!--                    <div class="header-left">
                        <img src="<?php //echo Yii::app()->request->baseUrl; ?>/images/logo.png" alt="" height="30" />
                    </div>-->
                </div>
            </div>
        </div>
        <!-- header -->
        <div class="login_content">
            <div class="content">
                <?php
                foreach (Yii::app()->admin->getFlashes() as $key => $message) {
                    echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
                }
                ?>
                <?php echo $content; ?> 
            </div>
        </div>
        <!-- footer -->
        <div id="footer"> Copyright &copy; <?php echo date('Y'); ?> by <?php echo Yii::app()->params['site_name'] ?>. All Rights Reserved.<br/>
        </div>
        <!-- page -->
    </body>
</html>