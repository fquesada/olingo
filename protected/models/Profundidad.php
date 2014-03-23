<?php

/**
 * This is the model class for table "profundidad".
 *
 * The followings are the available columns in table 'profundidad':
 * @property integer $id_profundidad
 * @property integer $nivel
 * @property integer $valor
 * @property integer $id_detalle_variable
 *
 * The followings are the available model relations:
 * @property DetalleVariable $idDetalleVariable
 */
class Profundidad extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Profundidad the static model class
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
		return 'profundidad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nivel, valor, id_detalle_variable', 'required'),
			array('nivel, valor, id_detalle_variable', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_profundidad, nivel, valor, id_detalle_variable', 'safe', 'on'=>'search'),
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
			'_detallevariable' => array(self::BELONGS_TO, 'DetalleVariable', 'id_detalle_variable'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_profundidad' => 'Id Profundidad',
			'nivel' => 'Nivel',
			'valor' => 'Valor',
			'id_detalle_variable' => 'Id Detalle Variable',
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

		$criteria->compare('id_profundidad',$this->id_profundidad);
		$criteria->compare('nivel',$this->nivel);
		$criteria->compare('valor',$this->valor);
		$criteria->compare('id_detalle_variable',$this->id_detalle_variable);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}