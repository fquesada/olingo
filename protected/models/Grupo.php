<?php

/**
 * This is the model class for table "grupo".
 *
 * The followings are the available columns in table 'grupo':
 * @property integer $id_grupo
 * @property string $nombre
 * @property string $descripcion
 * @property integer $valor_puntos
 * @property double $valor_porcentual
 * @property integer $id_clasificacion
 *
 * The followings are the available model relations:
 * @property Clasificacion $idClasificacion
 * @property Variable[] $variables
 */
class Grupo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Grupo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'grupo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, id_clasificacion', 'required'),
			array('valor_puntos, id_clasificacion', 'numerical', 'integerOnly'=>true),
			array('valor_porcentual', 'numerical'),
			array('nombre', 'length', 'max'=>90),
			array('descripcion', 'length', 'max'=>600),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_grupo, nombre, descripcion, valor_puntos, valor_porcentual, id_clasificacion', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'_clasificacion' => array(self::BELONGS_TO, 'Clasificacion', 'id_clasificacion'),
			'_variables' => array(self::HAS_MANY, 'Variable', 'id_grupo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_grupo' => 'Id Grupo',
			'nombre' => 'Nombre',
			'descripcion' => 'Descripcion',
			'valor_puntos' => 'Valor Puntos',
			'valor_porcentual' => 'Valor Porcentual',
			'id_clasificacion' => 'Id Clasificacion',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_grupo',$this->id_grupo);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('valor_puntos',$this->valor_puntos);
		$criteria->compare('valor_porcentual',$this->valor_porcentual);
		$criteria->compare('id_clasificacion',$this->id_clasificacion);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}