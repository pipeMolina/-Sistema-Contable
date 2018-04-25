<?php
    $this->breadcrumbs=array(
        'Reportes',
    );
?>
<div class="form">
<?php
if(Yii::app()->user->administrador() || Yii::app()->user->Contador() || Yii::app()->user->Secretario())
{    
echo '<h1 align="center">Libros Contables</h1>
<br>';
        echo '<div class="row">';
                echo CHtml::link('
                    <div class="col-lg-6" style="background-color: #F6CECE;" align="center">
                        <img src="'.Yii::app()->baseUrl.'/images/icons/librodiario.png" class="img-circle" alt="Libro Diario"  width="15%" />
                        <div><h4>Libro Diario</h4></div>
                     </div>', array('reportes/libroDiario'));
            
                echo CHtml::link('
                    <div class="col-lg-6" style="background-color: #F5D0A9;" align="center">
                        <img src="'.Yii::app()->baseUrl.'/images/icons/librodiario.png" class="img-circle" alt="Libro Diario"  width="15%" />
                        <div><h4>Libro Mayor</h4></div>
                    </div>', array('reportes/libroMayor'));                
           
        echo '</div>';
        echo '<div class="row">';
                echo CHtml::link('
                    <div class="col-lg-6" style="background-color: #F3E2A9;" align="center">
                        <img src="'.Yii::app()->baseUrl.'/images/icons/librodiario.png" class="img-circle" alt="Libro Diario"  width="15%" />
                        <div><h4>Saldo por Mes</h4></div>
                    </div>', array('reportes/saldoporMes'));
                echo CHtml::link('
                    <div class="col-lg-6" style="background-color: #F2F5A9;" align="center">
                        <img src="'.Yii::app()->baseUrl.'/images/icons/librodiario.png" class="img-circle" alt="Libro Diario"  width="15%" />
                        <div><h4>Balance General</h4></div>
                    </div>', array('reportes/balanceGeneral'));
        echo '</div>';
        echo '<div class="row">';        
                echo CHtml::link(' 
                    <div class="col-lg-6" style="background-color: #E1F5A9;" align="center"> 
                        <img src="'.Yii::app()->baseUrl.'/images/icons/librodiario.png" class="img-circle" alt="Libro Diario"  width="15%" />
                        <div><h4>Estado Resultado</h4></div>
                    </div>', array('reportes/estadoResultado'));
        echo '</div>';
}
?>
</div>