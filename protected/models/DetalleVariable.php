<?php

/**
 * This is the model class for table "detalle_variable".
 *
 * The followings are the available columns in table 'detalle_variable':
 * @property integer $id_detalle_variable
 * @property integer $nivel
 * @property string $descripcion
 * @property integer $id_variable
 *
 * The followings are the available model relations:
 * @property Variable $idVariable
 * @property Profundidad[] $profundidads
 */
class DetalleVariable extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DetalleVariable the static model class
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
		return 'detalle_variable';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nivel, descripcion, id_variable', 'required'),
			array('nivel, id_variable', 'numerical', 'integerOnly'=>true),
			array('descripcion', 'length', 'max'=>600),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_detalle_variable, nivel, descripcion, id_variable', 'safe', 'on'=>'search'),
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
			'_variable' => array(self::BELONGS_TO, 'Variable', 'id_variable'),
			'_profundidades' => array(self::HAS_MANY, 'Profundidad', 'id_detalle_variable'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_detalle_variable' => 'Id Detalle Variable',
			'nivel' => 'Nivel',
			'descripcion' => 'Descripcion',
			'id_variable' => 'Id Variable',
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

		$criteria->compare('id_detalle_variable',$this->id_detalle_variable);
		$criteria->compare('nivel',$this->nivel);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('id_variable',$this->id_variable);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}