<?php

/**
 * This is the model class for table "tb_conference".
 *
 * The followings are the available columns in table 'tb_conference':
 * @property string $id
 * @property integer $type
 * @property string $summary
 * @property string $start_time
 * @property string $end_time
 * @property string $create_time
 */
class Conference extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Conference the static model class
	 */

	public function getType()
	{
		$types = array('0'=>'Donation Committee');
		return $types[$this->type];
	}

	public function getName(){
		$date = strtotime($this->start_time);
		$name = date("Y年m月d日",$date);
		return $name.' '.$this->getType();
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tb_conference';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type', 'numerical', 'integerOnly'=>true),
			array('summary, start_time, end_time, create_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, type, summary, start_time, end_time, create_time', 'safe', 'on'=>'search'),
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
			'attendance'=>array(self::HAS_MANY,'ConferenceAttendance','conference_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'type' => '类型',//备用
			'summary' => '纪要',
			'start_time' => '会议时间',  
			'end_time' => '结束时间',//备用
			'create_time' => '创建时间',//备用
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('summary',$this->summary,true);
		$criteria->compare('start_time',$this->start_time,true);
		$criteria->compare('end_time',$this->end_time,true);
		$criteria->compare('create_time',$this->create_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}