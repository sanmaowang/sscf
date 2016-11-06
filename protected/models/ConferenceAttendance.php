<?php

/**
 * This is the model class for table "tb_conference_attendance".
 *
 * The followings are the available columns in table 'tb_conference_attendance':
 * @property string $id
 * @property integer $conference_id
 * @property integer $user_id
 * @property string $reason
 * @property integer $attendance_status
 */
class ConferenceAttendance extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ConferenceAttendance the static model class
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
		return 'tb_conference_attendance';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('conference_id, user_id, attendance_status', 'numerical', 'integerOnly'=>true),
			array('reason', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, conference_id, user_id, reason, attendance_status', 'safe', 'on'=>'search'),
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
			'user'=>array(self::BELONGS_TO, 'User', 'user_id'),
			'conference'=>array(self::BELONGS_TO, 'Conference', 'conference_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'conference_id' => 'Conference',
			'user_id' => 'User',
			'reason' => '缺席理由',
			'attendance_status' => '状态',
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
		$criteria->compare('conference_id',$this->conference_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('reason',$this->reason,true);
		$criteria->compare('attendance_status',$this->attendance_status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}