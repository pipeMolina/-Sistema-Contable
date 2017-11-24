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


		<!--<div class="panel-body">
			<?php //$this->renderPartial('admin', array('model'=>$model)); ?>	
		</div>-->




<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">Treeview List</div>
        <div class="panel-body">
            <!-- TREEVIEW CODE -->
            <ul class="treeview">
                <li><a href="#">Tree</a>
                    <ul>
                        <li><a href="#">Branch</a></li>
                        <li><a href="#">Branch</a>
                            <ul>
                                <li><a href="#">Stick</a></li>
                                <li><a href="#">Stick</a></li>
                                <li><a href="#">Stick</a>
                                    <ul>
                                        <li><a href="#">Twig</a></li>
                                        <li><a href="#">Twig</a></li>
                                        <li><a href="#">Twig</a></li>
                                        <li><a href="#">Twig</a>
                                            <ul>
                                                <li><a href="#">Leaf</a></li>
                                                <li><a href="#">Leaf</a></li>
                                                <li><a href="#">Leaf</a></li>
                                                <li><a href="#">Leaf</a></li>
                                                <li><a href="#">Leaf</a></li>
                                                <li><a href="#">Leaf</a></li>
                                                <li><a href="#">Leaf</a></li>
                                                <li><a href="#">Leaf</a></li>
                                                <li><a href="#">Leaf</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Twig</a></li>
                                        <li><a href="#">Twig</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Stick</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Branch</a></li>
                        <li><a href="#">Branch</a></li>
                    </ul>
                </li>
            </ul>
            <!-- TREEVIEW CODE -->
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Treeview Div</div>
        <div class="panel-body">
            <!-- TREEVIEW CODE -->
            <div class="treeview">
                <ul>
                    <li><a href="#">Tree</a>
                        <ul>
                            <li><a href="#">Branch</a></li>
                            <li><a href="#">Branch</a>
                                <ul>
                                    <li><a href="#">Stick</a></li>
                                    <li><a href="#">Stick</a></li>
                                    <li><a href="#">Stick</a>
                                        <ul>
                                            <li><a href="#">Twig</a></li>
                                            <li><a href="#">Twig</a></li>
                                            <li><a href="#">Twig</a></li>
                                            <li><a href="#">Twig</a>
                                                <ul>
                                                    <li><a href="#">Leaf</a></li>
                                                    <li><a href="#">Leaf</a></li>
                                                    <li><a href="#">Leaf</a></li>
                                                    <li><a href="#">Leaf</a></li>
                                                    <li><a href="#">Leaf</a></li>
                                                    <li><a href="#">Leaf</a></li>
                                                    <li><a href="#">Leaf</a></li>
                                                    <li><a href="#">Leaf</a></li>
                                                    <li><a href="#">Leaf</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Twig</a></li>
                                            <li><a href="#">Twig</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Stick</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Branch</a></li>
                            <li><a href="#">Branch</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- TREEVIEW CODE -->
        </div>
    </div>

<script>
    $.fn.extend({
    treeview:   function() {
        
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