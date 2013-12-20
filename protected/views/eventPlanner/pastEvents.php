<div class="past-event-top">
    <div class="top_left">
        <h1>Past Event</h1>
    </div>
    <div class="top_right">

    </div>
</div>
<div class="clear">&nbsp;</div>
<div class="past-event-list">
    <div class="past-event-listing">
        <!---- plan event account start -->
        <div class="inner-content-block-1 left">
            <div class="lef-content-bg f-left">
                <div class="main-lef-wrap">
                    <?php
                    $this->widget('zii.widgets.CListView', array(
                        'dataProvider' => $dataProvider,
                        'itemView' => '_viewPastEvents',
                        'template' => '{items}{pager}'
                    ));
                    ?>
                </div>
            </div>
        </div>
        <!---- plan event account end -->
    </div>
</div>