<div class="facebook" >
    <?php //echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl.'/images/facebook.png'),$params['facebook'],array("target"=>"_top"));?>
    <?php
    $this->widget('application.widgets.facebook.Facebook',array('appId'=>Yii::app()->params['FACEBOOK_APPID'],'facebookLoginUrl'=>'eventPlanner/inviteFriends')); ?>
</div>

<ul>
<?php
foreach ($friendsList as $f )
{

    ?>
    <li style="float: left; width:200px; overflow: hidden;">
    <table>
        <tr>
            <td>
                <a href="https://www.facebook.com/<?php echo $f['username']?>" target="_blank"><img src="<?php echo $f['picture']['data']['url']?>"></a>
            </td>
            <td>
                <?php echo $f['username']?>
            </td>
        </tr>
    </table>
    </li>
<?php
}
?>
</ul>


