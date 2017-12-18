<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-treepanel.css" />

<div class="container">
    <div class="panel panel-primary" id="size">
        <div class="panel-heading text-center"><h1 class="panel-title"> Plan de Cuentas</h1> </div>
            <!-- TREEVIEW CODE -->
            <ul class="treeview">
                <li><a href="#">Activo </a>
                    <ul>
                        <li><a href="#">Activo Circulante</a><!--Inicio Activo Circulante-->
                            <ul>

                                <?php
                                     foreach ($model as $key => $value) 
                                    if($value['ID_SUBTIPOCUENTA']==10100000){
                                {?>
                                    <li><p> <?php echo $value['DESCRIPCION_CUENTA'];?></p></li>
                                <?php }}?>
                                               
                            </ul>
                        </li><!-- Fin Activo Circulante -->
                        <li><a href="#">Activo Fijo</a><!--Inicio Activo Fijo-->
                            <ul>
                                <?php 
                                foreach ($model as $key => $value) 
                                    if($value['ID_SUBTIPOCUENTA']==10200000){ 
                                {?>
                                    <li><p> <?php echo $value['DESCRIPCION_CUENTA'];?></p></li>
                                <?php }}?>
                                               
                            </ul>
                        </li><!-- Fin Activo Fijo -->
                        <li><a href="#">Activo Into</a><!--Inicio Activo Into-->
                            <ul>
                                <?php 
                                foreach ($model as $key => $value) 
                                    if($value['ID_SUBTIPOCUENTA']==10300000){
                                {?>
                                    <li><p> <?php echo $value['DESCRIPCION_CUENTA'];?></p></li>
                                <?php }}?>
                                               
                            </ul>
                        </li><!-- Fin Activo Into -->
                    </ul>                  
                  </li>

                  <li><a href="#">Pasivo </a>
                    <ul>
                        <li><a href="#">Pasivo Exigible</a><!--Inicio Activo Circulante-->
                            <ul>

                                <?php
                                     foreach ($model as $key => $value) 
                                    if($value['ID_SUBTIPOCUENTA']==20100000){
                                {?>
                                    <li><p> <?php echo $value['DESCRIPCION_CUENTA'];?></p></li>
                                <?php }}?>
                                               
                            </ul>
                        </li><!-- Fin Activo Circulante -->
                        <li><a href="#">Pasivo Largo Plazo</a><!--Inicio Activo Fijo-->
                            <ul>
                                <?php 
                                foreach ($model as $key => $value) 
                                    if($value['ID_SUBTIPOCUENTA']==20200000){ 
                                {?>
                                    <li><p> <?php echo $value['DESCRIPCION_CUENTA'];?></p></li>
                                <?php }}?>
                                               
                            </ul>
                        </li><!-- Fin Activo Fijo -->
                        <li><a href="#">Patrimonio</a><!--Inicio Activo Into-->
                            <ul>
                                <?php 
                                foreach ($model as $key => $value) 
                                    if($value['ID_SUBTIPOCUENTA']==20300000){
                                {?>
                                    <li><p> <?php echo $value['DESCRIPCION_CUENTA'];?></p></li>
                                <?php }}?>
                                               
                            </ul>
                        </li><!-- Fin Activo Into -->
                    </ul>                  
                  </li>
            </ul>
            <!-- TREEVIEW CODE -->
    </div>

<script>
   $.fn.extend({
    treeview:   function() {
        return this.each(function() {
            // Initialize the top levels;
            var tree = $(this);
        
            tree.find('li').has("ul").each(function () {
                var branch = $(this); //li with children ul
                
                branch.prepend("<i class='tree-indicator glyphicon glyphicon-chevron-right'></i>");
                branch.addClass('tree-branch');
                branch.on('click', function (e) {
                    if (this == e.target) {
                        var icon = $(this).children('i:first');
                        
                        icon.toggleClass("glyphicon-chevron-down glyphicon-chevron-right");
                        $(this).children().children().toggle();
                    }
                })
                branch.children().children().toggle();
                
                /**
                 *  The following snippet of code enables the treeview to
                 *  function when a button, indicator or anchor is clicked.
                 *
                 *  It also prevents the default function of an anchor and
                 *  a button from firing.
                 */
                branch.children('.tree-indicator, button, a').click(function(e) {
                    branch.click();
                    
                    e.preventDefault();
                });
            });
        });
    }
});

/**
 *  The following snippet of code automatically converst
 *  any '.treeview' DOM elements into a treeview component.
 */
$(window).on('load', function () {
    $('.treeview').each(function () {
        var tree = $(this);
        tree.treeview();
    })
})
  
</script>
<style>
#size {
    width : 800px;
}
</style>
