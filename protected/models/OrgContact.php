<?php

/**
 * This is the model class for table "tb_org_contact".
 *
 * The followings are the available columns in table 'tb_org_contact':
 * @property string $id
 * @property integer $org_id
 * @property string $name
 * @property integer $gender
 * @property string $mobile
 * @property string $email
 * @property string $wechat
 * @property string $job
 * @property string $first_time
 * @property string $create_time
 * @property string $update_time
 */
class OrgContact extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return OrgContact the static model class
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
		return 'tb_org_contact';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('org_id, gender', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>60),
			array('name, org_id', 'required'),
			array('mobile', 'length', 'max'=>20),
			array('email', 'length', 'max'=>64),
			array('job', 'length', 'max'=>64),
			array('wechat', 'length', 'max'=>30),
			array('first_time, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, org_id, name, gender, mobile, email, wechat, job, first_time, create_time, update_time', 'safe', 'on'=>'search'),
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
			'org'=>array(self::BELONGS_TO, 'Org', 'org_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'org_id' => 'Org',
			'name' => '姓名',
			'gender' => '性别',
			'mobile' => '电话',
			'email' => 'Email',
			'wechat' => '微信号',
			'job' => '职务',
			'first_time' => '初次建立联系时间',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
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
		$criteria->compare('org_id',$this->org_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('gender',$this->gender);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('wechat',$this->wechat,true);
		$criteria->compare('job',$this->job,true);
		$criteria->compare('first_time',$this->first_time,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}