<?php
/* @var $this ValoracionController */

class ValoracionController extends Controller
{
	public function actionIndex()
	{
                $clasificacion = $this->cargardatos();
		$this->render('index', array('modelo' => $clasificacion));                
	}
        
        function cargardatos(){            
           return $clasificacion = Clasificacion::model()->findByPk(1);
        }
}