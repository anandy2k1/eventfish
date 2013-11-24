<div class="event-dashboard eventplanner-steps">
    <div class="confirm-dashboard">
        <ul>
            <li class="disable active">
                <p class="icon">1</p>
                <h3>Personal Details </h3>
            </li>
            <li class="disable active">
                <p class="icon">2</p>
                <h3>My Wish list</h3>
            </li>
            <li class="disable current">
                <p class="icon">3</p>
                <h3>Review</h3>
            </li>
        </ul>
    </div>

    <div class="account-details">

        <div class="create-profile">
            <div class="person_details">
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
                        </tr><tr>
                            <td align="right"><strong>Marital Status:</strong></td>
                            <td align="left"><?php echo $model->marital_status; ?>
                                <span style="float:right"><?php echo CHtml::link('Edit', array('eventPlanner/step1')); ?></span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="my_wishlist">

                <h3>2 My Wishlist</h3>
                <div class="inlineBox">
                    <?php
                    if ($model->userCategories):
                        $snI = 1;
                        foreach ($model->userCategories as $omDataSet):
                            $ssClass = ($snI % 5 == 0) ? 'block last' : 'block';
                            ?>
                            <div id="divSelectCat<?php echo $omDataSet->id ?>" class="<?php echo $ssClass; ?>">
                                <div class="img">
                                    <?php echo CHtml::image(Yii::app()->baseUrl . '/images/my-wish.png', '', array('id' => 'imgCat' . $omDataSet->id, 'width' => '108', 'height' => '81')); ?>
                                </div>
                                <div class="text">
                                    <?php echo $omDataSet->category->category_name; ?>
                                </div>
                            </div>
                            <?php
                            $snI++;
                        endforeach;
                    endif;
                    ?>
                    <div class="clear">&nbsp;</div>
                    <div style="float:right"><?php echo CHtml::link('Edit', array('eventPlanner/step2')); ?></div>
                    <div class="clear height-0">&nbsp;</div>

                </div>
            </div>
            <div class="clear">&nbsp;</div>
            <div class="buttons">
                <div class="gotoaccount_btn">
                    <?php echo CHtml::link('Go to Account',  array('eventPlanner/index'), array('class' => 'button_green')); ?>
                </div>
                <div  class="planevent_btn">
                    <?php echo CHtml::link('Plan an Event', array('eventPlanner/planEventGeneralAdd'), array('class' => 'button_orange margin_right')); ?>
                </div>
            </div>
        </div>
    </div>
</div>
