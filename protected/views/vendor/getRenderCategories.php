<table width="100%" id="tblData" class="target"  cellspadding="3" cellspacing="0">
    <?php
    if ($model):
        $snI = $snJ = 1;
        foreach ($model as $omResults):
            echo (($snI % 4) == 1) ? '<tr>' : '';
            ?>
            <td style="margin-left:10px;">

                <?php echo CHtml::checkBoxList('categoryids[]', '', array($omResults->id => $omResults->category_name)); ?>

            </td>
            <?php
            echo (($snI % 4) == 0) ? '</tr>' : '';
            $snJ = ($snI % 4 == 0) ? 1 : $snJ++;
            $snI++;
        endforeach;
    endif;
    ?>
</table>
