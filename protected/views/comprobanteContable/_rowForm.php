<?php $row_id = "lccontable-" . $key ?>
<div class='form-group' id="<?php echo $row_id ?>">
    <?php
    echo $form->hiddenField($model, "[$key]NUMERO_COMPROBANTE");
    //echo $form->updateTypeField($model, $key, "updateType", array('key' => $key));
    ?>
    <div class="col-lg-3">
        <?php
        echo $form->labelEx($model, "[$key]CUENTA");
        echo $form->textField($model, "[$key]CUENTA",array('class'=>'form-control'));
        echo $form->error($model, "[$key]CUENTA");
        ?>
 
    </div> 
    <div class="col-lg-3">
        <?php
        echo $form->labelEx($model, "[$key]DEBE");
        echo $form->textField($model, "[$key]DEBE",array('class'=>'form-control'));
        echo $form->error($model, "[$key]DEBE");
        ?>
    </div> 
    <div class="col-lg-3">
        <?php
        echo $form->labelEx($model, "[$key]HABER");
        echo $form->textField($model, "[$key]HABER",array('class'=>'form-control'));
        echo $form->error($model, "[$key]HABER");
        ?> 
    </div>
    <div class="col-lg-3">
            <?php echo $form->deleteRowButton($row_id, $key); ?>
     </div>
</div>
