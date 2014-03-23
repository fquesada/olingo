<?php

/**
 * This is the model class for table "clasificacion".
 *
 * The followings are the available columns in table 'clasificacion':
 * @property integer $id_clasificacion
 * @property string $nombre
 * @property double $valor_porcentual
 *
 * The followings are the available model relations:
 * @property Grupo[] $grupos
 */
class Clasificacion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Clasificacion the static model class
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
		return 'clasificacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, valor_porcentual', 'required'),
			array('valor_porcentual', 'numerical'),
			array('nombre', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_clasificacion, nombre, valor_porcentual', 'safe', 'on'=>'search'),
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
			'_grupos' => array(self::HAS_MANY, 'Grupo', 'id_clasificacion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_clasificacion' => 'Id Clasificacion',
			'nombre' => 'Nombre',
			'valor_porcentual' => 'Valor Porcentual',
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

		$criteria->compare('id_clasificacion',$this->id_clasificacion);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('valor_porcentual',$this->valor_porcentual);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}