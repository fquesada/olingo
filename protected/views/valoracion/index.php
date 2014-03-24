<?php
/* @var $this ValoracionController */
/* @var $modelo Clasificacion */

$this->breadcrumbs = array(
    'Valoracion',
);

Yii::app()->clientScript->registerCoreScript('jquery.ui');
Yii::app()->clientScript->registerCssFile(
        Yii::app()->clientScript->getCoreScriptUrl() .
        '/jui/css/base/jquery-ui.css'
);
?>

<style>
    #selectable .ui-selecting { background: #FECA40; }
    #selectable .ui-selected { background: #F39814; color: white; }
    #selectable { list-style-type: none; margin: 0; padding: 0; width: 450px; }
    #selectable li { margin: 3px; padding: 1px; float: left; width: 100px; height: 80px; font-size: 4em; text-align: center; }
    
    #uldetallevariable .ui-selecting { background: #FECA40; }
    #uldetallevariable .ui-selected { background: #F39814; color: white; }
    #uldetallevariable { list-style-type: none; margin: 0; padding: 0; width: auto; }
    #uldetallevariable li { margin: 3px; padding: 1px; float: left; width: 150px; height: auto; text-align: justify}
    
    #ulprofundidad { list-style-type: none; margin: 0; padding: 0; width: auto; }
    #ulprofundidad li { margin: 3px; padding: 1px; float: left; width: 40px; height: auto; text-align: justify}
    
    
    .divgrupo{border:2px solid #a1a1a1; padding:10px 20px; border-radius:25px;}
    .divvariable{border:1px solid #a1a1a1; padding:10px 10px; border-radius:25px; font-size: 12px; font-family: serif; height: 275px;}
    .pdescripciongrupo{font-family: serif; font-size: 14px; text-align: justify;}
</style>

<script>
    $(function() {
        $( "#selectable" ).selectable();
    });
    $(function() {
    $( "#tabs" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
    $( "#tabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
    });
    $(function() {
        $( "#uldetallevariable" ).selectable();
    });
</script>




<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Habilidades</a></li>
    <li><a href="#tabs-2">Conocimiento y Experiencia</a></li>
    <li><a href="#tabs-3">Contextuales</a></li>
  </ul>
  <div id="tabs-1">       
   <?php       
    foreach ($modelo->_grupos as $grupo) {
        echo '<div class="divgrupo">';
        //echo $grupo->id_grupo;
        //echo "</br>";
        echo '<h4>';
        echo $grupo->nombre;
        echo '</h4>';        
        echo '<p class="pdescripciongrupo">';
        echo $grupo->descripcion;
        echo '</p>';             
        foreach ($grupo->_variables as $variable) {
            echo '<div class="divvariable">';
            echo '<h5>';
            echo $variable->nombre;          
            echo '</h5>';           
            echo '<ul id="uldetallevariable">';
            foreach ($variable->_detallevariables as $detallevariable) {
                echo '<li>';
                echo '<input type="radio" name='.$variable->id_variable.' value='.$detallevariable->nivel.'>';
                echo 'Nivel: '; echo $detallevariable->nivel;
                echo " ";
                echo $detallevariable->descripcion;
                echo '</br>Profundidad';
                echo '<ul id="ulprofundidad">';
                foreach ($detallevariable->_profundidades as $profundidad) {
                    echo '<li>';
                    echo '<input type="radio" name='.$detallevariable->id_detalle_variable.' value='.$profundidad->valor.'>';                    
                   // echo 'Valor: ';
                    echo $profundidad->valor;                   
                    echo '</li>';
                } 
                echo '</ul>';
                echo '</li>';
            }
            echo '</ul>';
            echo '</div>';
        }        
        echo '</div>';
    }
   ?>   
      
  </div>
  <div id="tabs-2">
          <ol id="selectable">
    <li class="ui-state-default">1</li>
    <li class="ui-state-default">2</li>
    <li class="ui-state-default">3</li>
    <li class="ui-state-default">4</li>
    <li class="ui-state-default">5</li>
    <li class="ui-state-default">6</li>
    <li class="ui-state-default">7</li>
    <li class="ui-state-default">8</li>
    <li class="ui-state-default">9</li>
    <li class="ui-state-default">10</li>
    <li class="ui-state-default">11</li>
    <li class="ui-state-default">12</li>
    </ol>
  </div>
  <div id="tabs-3">
  </div>
</div>