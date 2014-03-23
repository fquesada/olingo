<?php

/**
 * This is the model class for table "variable".
 *
 * The followings are the available columns in table 'variable':
 * @property integer $id_variable
 * @property string $nombre
 * @property string $descripcion
 * @property integer $id_grupo
 *
 * The followings are the available model relations:
 * @property DetalleVariable[] $detalleVariables
 * @property Grupo $idGrupo
 */
class Variable extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Variable the static model class
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
		return 'variable';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, id_grupo', 'required'),
			array('id_grupo', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>90),
			array('descripcion', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_variable, nombre, descripcion, id_grupo', 'safe', 'on'=>'search'),
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
			'_detallevariables' => array(self::HAS_MANY, 'DetalleVariable', 'id_variable'),
			'_grupo' => array(self::BELONGS_TO, 'Grupo', 'id_grupo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_variable' => 'Id Variable',
			'nombre' => 'Nombre',
			'descripcion' => 'Descripcion',
			'id_grupo' => 'Id Grupo',
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

		$criteria->compare('id_variable',$this->id_variable);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('id_grupo',$this->id_grupo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}