<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <?php
        $baseUrl = Yii::app()->baseUrl;
        $cs = Yii::app()->getClientScript();
        $cs->registerScriptFile($baseUrl . '/js/colorbox/jquery.colorbox.js');
        $cs->registerCssFile($baseUrl . '/css/colorbox/colorbox.css');
        ?>
        <script type="text/javascript">
            function openColorBox(urls, smWidth, smHeight) {

                smWidth = (smWidth > 0) ? smWidth : "840px";
                smHeight = (smHeight > 0) ? smHeight : "500px";
                $('.ajax').colorbox({
                    href: urls,
                    width: smWidth,
                    height: smHeight,
                    iframe: true,
                    scrolling: false
                });
            }
        </script>
    </head>

    <body>
        <div class="container" id="page">
            <div id="header">
                <div id="logo">
                    <div class="header-left">
                        <?php echo CHtml::link(CHtml::image(Yii::app()->baseUrl . "/images/logo.png", 'Home', array('height' => '30px')), array('site/index'), array('title' => 'Home')) ?>
                    </div>

                    <div class="header-right">
                        <?php echo CHtml::link(CHtml::encode(AdminModule::getLoginText()), CHtml::encode(AdminModule::getLoginUrl()), array('title' => CHtml::encode(AdminModule::getLoginText()))); ?> 
                        <?php
                        if (Yii::app()->getUser()->getId() > 0):
                            echo CHtml::link('Change Password', Yii::app()->createUrl('admin/index/changepassword'), array('title' => 'Change Password'));
                        endif;
                        ?>
                        <?php echo CHtml::encode(AdminModule::getWelcomeText()); ?></div>        
                </div>
            </div>
            <!-- header -->

            <div id="adminmenu" class="jqueryslidemenu">
                <?php $this->widget('AdminMenu', JVAccessControlFilter::getAdminMenuItems()); ?>
            </div>
            <!-- mainmenu --> 
            <!-- breadcrumbs start -->
            <div class="breadcrumb">
                <?php
                $this->widget('application.extensions.inx.AdminBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                ));
                ?>
            </div>
            <!-- breadcrumbs Ends -->
            <div class="maincont"> 
                <?php
                foreach (Yii::app()->user->getFlashes() as $key => $message) {
                    echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
                }
                ?>
                <div class="content_left">
                    <div id="sidebar">
                        <?php
                        $this->beginWidget('zii.widgets.CPortlet', array(
                            'title' => 'Operations',
                        ));
                        $this->widget('zii.widgets.CMenu', array(
                            'items' => $this->menu,
                            'htmlOptions' => array('class' => 'operations'),
                        ));
                        $this->endWidget();
                        ?>
                    </div>
                    <!-- sidebar --> 
                </div>
                <div  class="content_right"> <?php echo $content; ?> 
                    <?php if ($this->action->id != 'admin' && $this->action->id != 'index'): ?>

                        <a href="javascript:history.back()" class="backlink"> <?php echo Yii::t('app', 'Back'); ?> </a>
                    <?php endif; ?></div>
            </div>
        </div>
        <!-- footer -->
        <div id="footer"> Copyright &copy; <?php echo date('Y'); ?> by <?php echo Yii::app()->params['site_name'] ?>. All Rights Reserved.<br/>
        </div>
        <!-- page -->

    </body>
</html>