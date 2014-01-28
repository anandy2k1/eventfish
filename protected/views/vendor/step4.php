<?php
foreach (Yii::app()->user->getFlashes() as $key => $message) {
    echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
}
?>
<section>
    <div class="container">
        <div class="event-dashboard">
            <div class="confirm-dashboard">
                <ul>
                    <li class="disable active">
                        <p class="icon">1</p>

                        <h3>Account Details </h3>
                    </li>
                    <li class="disable active">
                        <p class="icon">2</p>

                        <h3>Create your Profile</h3>
                    </li>
                    <li class="disable active">
                        <p class="icon">3</p>

                        <h3> Service Area</h3>
                    </li>
                    <li class="disable last current">
                        <p class="icon">4</p>

                        <h3>Review</h3>
                    </li>
                </ul>
            </div>
            <div class="account-details">

                <h3>1 Personal Details</h3>

                <div class="personal-details">
                    <table width="100%">
                        <tr>
                            <td width="27%" align="right"><strong>Name:</strong></td>
                            <td align="left"><?php echo ucfirst($model->first_name . ' ' . $model->last_name) ?></td>
                        </tr>
                        <tr>
                            <td align="right"><strong>Email:</strong></td>
                            <td align="left"><?php echo $model->email; ?></td>
                        </tr>
                        <tr>
                            <td align="right"><strong>Address:</strong></td>
                            <td align="left"><?php echo $model->address_1 . ", " . $model->address_2; ?></td>
                        </tr>
                        <tr>
                            <td align="right"><strong>City, State, Zip:</strong></td>
                            <td align="left"><?php echo $model->city . ", " . $model->state . ", " . $model->zip; ?></td>
                        </tr>
                        <tr>
                            <td align="right"><strong>Home Phone:</strong></td>
                            <td align="left"><?php echo $model->phone; ?></td>
                        </tr>
                        <tr>
                            <td align="right"><strong>Mobile Phone:</strong></td>
                            <td align="left"><?php echo $model->mobile; ?></td>
                        </tr>
                        <tr>
                            <td align="right"><strong>Office Phone:</strong></td>
                            <td align="left"><?php echo $model->office_phone; ?></td>
                        </tr>
                        <tr>
                            <td align="right"><strong>Date of Birth:</strong></td>
                            <td align="left"><?php echo $model->date_of_birth; ?></td>
                        </tr>
                        <tr>
                            <td align="right"><strong>Gender:</strong></td>
                            <td align="left"><?php echo $model->gender; ?></td>
                        </tr>
                        <tr>
                            <td align="right"><strong>Ethnicity:</strong></td>
                            <td align="left"><?php echo $model->ethnicity; ?></td>
                        </tr>
                        <tr>
                            <td align="right"><strong>Income:</strong></td>
                            <td align="left"><?php echo $model->income; ?></td>
                        </tr>
                        <tr>
                            <td align="right"><strong>Marital Status:</strong></td>
                            <td align="left"><?php echo $model->marital_status; ?>
                                <span style="float:right"><?php echo CHtml::link('Edit', array('vendor/step1')); ?></span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="clear">&nbsp;</div>
                <div class="buttons">
                    <div class="gotoaccount_btn">
                        <?php echo CHtml::link('Go to Account', array('vendor/index'), array('class' => 'button_green')); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    window.onbeforeunload = function() {
        $.ajax({
            url: '<?php echo Yii::app()->baseUrl;?>/index.php/eventPlanner/sendCloseMail?sendmail=2&userid=<?php echo Yii::app()->user->id?>',
            type: 'GET',
            async: false,
            timeout: 4000
        });
    };
</script>