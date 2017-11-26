<?php
/* @var $this CuentaController */
/* @var $model Cuenta */

$this->breadcrumbs=array(
	'Cuentas'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Ver Cuenta', 'url'=>array('index')),
	array('label'=>'Administrar Cuenta', 'url'=>array('admin')),

);
?>

<div div class="panel panel-primary">
	<div class="panel-heading text-center"><h1 class="panel-title">Crear Cuenta</h1></div>
		<div class="panel-body">
			<?php $this->renderPartial('_form', array('model'=>$model)); ?>
		</div>
</div>


<!--Obtener datos de la tabla cuenta para mostrar en el tree panel-->
<?php 
    $sql='SELECT * FROM cuenta WHERE ID_PLANCUENTA=52';
    $connection = Yii::app()->db;
    $command = $connection->createCommand($sql);
    $dataReader = $command->queryAll();
?>


<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">Plan de Cuentas</div>
        <div class="panel-body">
            <!-- TREEVIEW CODE -->
            <ul class="treeview">
                <?php foreach ($dataReader as $key => $value){ ?>
                    <li><a href="#"> <?php echo $value['ID_TIPOCUENTA'];?> </a>
                    <ul>
                        <li><a href="#"><?php echo $value['ID_SUBTIPOCUENTA'];?></a>
                            <ul>
                                <li><a href="#"><?php echo $value['CODIGO_CUENTA'];?></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>   
                <?php }?>
                
            </ul>
            <!-- TREEVIEW CODE -->

        </div>
    </div>
   

<script>
    $.fn.extend({
    treeview:function() {
        
        return this.each(function() {
            // Initialize the top levels;
            var tree = $(this);
            tree.addClass('treeview-tree');
            tree.find('li').each(function() {
                var stick = $(this);
            });
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