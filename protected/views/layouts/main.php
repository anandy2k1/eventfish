<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="language" content="en"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/eventfish.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/local.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/popup.css"/>

    <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.8.3.js"></script>

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
<div class="outer-div">
    <!--header panel starts -->
    <header>
        <?php
/*        require_once Yii::getPathOfAlias('webroot')."/protected/extensions/facebook/lib/facebook.php";
        // Create our Application instance (replace this with your appId and secret).
        $facebook = new Facebook(array(
            'appId'  => Yii::app()->params['FACEBOOK_APPID'],
            'secret' => Yii::app()->params['FACEBOOK_SECRET']
        ));
        // Login or logout url will be needed depending on current user state.
        $user = $facebook->getUser();
        if ($user)
        {
            try
            {
                // Proceed knowing you have a logged in user who's authenticated.
                $user_profile = $facebook->api('/me');
            }
            catch (FacebookApiException $e)
            {
                error_log($e);
                $user = null;
            }
        }

        $facebook_Url  = $facebook->getLoginUrl( array(	'req_perms' => 'email','login'=>'facebook','redirect_uri'=>'http://localhost/eventfish/index.php/site/login'));
        $params['facebook'] = $facebook_Url;*/
        ?>
        <!--<div class="facebook">
            <?php /*// echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl.'/images/facebook.png'),$params['facebook']); */?>
        </div>-->
        <div class="container">
            <h1 class="logo">
                <?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . "/images/logo.png", "EventFish", array('width' => '266', 'height' => '83')), array('site/index'), array('title' => 'Home')); ?>
            </h1>

            <div class="header-right">
                <?php
                if (Yii::app()->user->isGuest):
                    echo CHtml::htmlButton('<span><span>Sign Up</span></span>', array('onclick' => 'js:openColorBox("' . Yii::app()->createUrl("site/signUp") . '", "500","600");return false;', 'class' => 'ajax general-btn-1'));
                    echo CHtml::htmlButton('<span><span>Log In</span></span>', array('onclick' => 'js:openColorBox("' . Yii::app()->createUrl("site/login") . '","500","600");return false;', 'class' => 'ajax general-btn'));
                else:
                    echo 'Hello, ' . Yii::app()->user->name . '&nbsp';


                    echo CHtml::link('<span><span onclick="FB.logout();">Logout</span></span>', array('site/logout'), array('class' => 'general-btn'));
                endif;
                ?>
            </div>
            <nav>
                <ul>
                    <li class="first">
                        <?php echo CHtml::link('Home', array('site/index'), array('title' => 'Home')); ?>
                    </li>
                    <li>
                        <?php echo CHtml::link('How it Works', '#', array('title' => 'How it Works')); ?>
                    </li>
                    <li>
                        <?php echo CHtml::link('Plan an Event', '#', array('title' => 'Plan an Event')); ?>
                    </li>
                    <li>
                        <?php echo CHtml::link('Become a Vendor', '#', array('title' => 'Become a Vendor')); ?>
                    </li>
                    <li>
                        <?php echo CHtml::link('Find an Event', '#', array('title' => 'Find an Event')); ?>
                    </li>
                    <li>
                        <?php echo CHtml::link('Planner', '#', array('title' => 'Planner')); ?>
                    </li>
                    <li class="last">
                        <?php echo CHtml::link('View Demo', '#', array('title' => 'View Demo')); ?>
                    </li>

                </ul>
            </nav>
        </div>
    </header>
    <!--header panel ends -->
    <!--middle panel starts -->
    <section>
        <div class="container">
            <?php echo $content; ?>
        </div>
    </section>

    <!--footer panel starts -->
    <footer>
        <div class="container">
            <div class="footer-block col01">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/footer-logo.png" width="164" height="67" alt="Eventfish" title="Eventfish"/>
            </div>
            <div class="footer-block col02">
                <ul>
                    <li>
                        <?php echo CHtml::link('<strong>Learn</strong>', '#', array('title' => 'Learn')); ?>
                    </li>
                    <li>
                        <?php echo CHtml::link('How it works', '#', array('title' => 'How it works')); ?>
                    </li>
                    <li>
                        <?php echo CHtml::link('FAQs', '#', array('title' => 'FAQs')); ?>
                    </li>
                </ul>
            </div>
            <div class="footer-block col02">
                <ul>
                    <li>
                        <?php echo CHtml::link('<strong>Company</strong>', '#', array('title' => 'Company')); ?>
                    </li>
                    <li>
                        <?php echo CHtml::link('About us', array('site/cms', 'id' => 'about_us'), array('title' => 'About us')); ?>
                    </li>
                    <li>
                        <?php echo CHtml::link('Contact us', '#', array('title' => 'Contact us')); ?>
                    </li>
                    <li>
                        <?php echo CHtml::link('Careers', '#', array('title' => 'Careers')); ?>
                    </li>
                </ul>
            </div>
            <div class="footer-block col02">
                <ul>
                    <li>
                        <?php echo CHtml::link('<strong>Partners</strong>', '#', array('title' => 'Partners')); ?>
                    </li>
                    <li>
                        <?php echo CHtml::link('Platform Lincensing', '#', array('title' => 'Platform Lincensing')); ?>
                    </li>
                    <li>
                        <?php echo CHtml::link('International', '#', array('title' => 'International')); ?>
                    </li>
                    <li>
                        <?php echo CHtml::link('Event Planner', '#', array('title' => 'Event Planner')); ?>
                    </li>
                    <li>
                        <?php echo CHtml::link('Locations', '#', array('title' => 'Locations')); ?>
                    </li>
                </ul>
            </div>
            <div class="footer-block col02">
                <ul>
                    <li>
                        <?php echo CHtml::link('<strong>Services</strong>', '#', array('title' => 'Services')); ?>
                    </li>
                    <li>
                        <?php echo CHtml::link('Plan an Event', '#', array('title' => 'Plan an Event')); ?>
                    </li>
                    <li>
                        <?php echo CHtml::link('Become a Vendor', '#', array('title' => 'Become a Vendor')); ?>
                    </li>
                    <li>
                        <?php echo CHtml::link('Get the App', '#', array('title' => 'Get the App')); ?>
                    </li>
                    <li>
                        <?php echo CHtml::link('List of all Events', '#', array('title' => 'List of all Events')); ?>
                    </li>
                </ul>
            </div>
            <div class="icon-bar">
                <p class="left">
                    <?php echo CHtml::link('Terms of Service', '#', array('title' => 'Terms of Service')); ?>
                </p>

                <p class="right">
                    <a target="_blank" href="https://www.facebook.com/eventfish"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/footer-icon01.png" width="30" height="30"/></a>
                    <a target="_blank" href="https://twitter.com/eventfish"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/footer-icon02.png" width="30" height="30"/></a>
                    <a target="_blank" href="http://linkd.in/1gvcoQW"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/footer-icon03.png" width="30" height="30"/></a>
                    <a target="_blank" href="http://www.youtube.com/channel/UCwzEDpI7GzzAF3Hz7btvPeA"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/footer-icon04.png" width="30" height="30"/></a>
                </p>
            </div>
        </div>
    </footer>
    <!--footer panel ends -->
</div>
</body>
</html>
