<?php

/**
 * This is the model class for table "tb_case".
 *
 * The followings are the available columns in table 'tb_case':
 * @property string $id
 * @property string $name
 * @property string $nickname
 * @property string $avatar
 * @property string $birthday
 * @property integer $gender
 * @property string $home
 * @property string $height
 * @property string $weight
 * @property string $id_card
 * @property string $address
 * @property string $nation
 * @property string $citivaltype
 * @property string $contact
 * @property string $telephone
 * @property string $state_desc
 * @property string $medical_insurance_rate
 * @property string $other_subsidy
 * @property string $have_other_illness
 * @property string $have_pneumonia
 * @property string $operation_hospital
 * @property string $doctor
 * @property string $is_one_time_cure
 * @property string $admission_time
 * @property string $operation_plan_time
 * @property string $other_foundation_staff
 * @property string $staff
 * @property string $applicant
 * @property integer $create_by
 * @property integer $source
 * @property integer $status
 * @property string $create_time
 * @property string $update_time
 */
class Childcase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Childcase the static model class
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
		return 'tb_case';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, create_by', 'required'),
			array('gender, source, create_by, status', 'numerical', 'integerOnly'=>true),
			array('name, id_card, nation, citivaltype,is_one_time_cure, contact, telephone', 'length', 'max'=>25),
			array('id_card', 'length', 'max'=>18),
			array('nickname, avatar', 'length', 'max'=>64),
			array('home, doctor', 'length', 'max'=>80),
			array('height, weight', 'length', 'max'=>6),
			array('address', 'length', 'max'=>160),
			array('medical_insurance_rate, other_subsidy, operation_hospital', 'length', 'max'=>255),
			array('other_foundation_staff, staff, applicant', 'length', 'max'=>11),
			array('birthday, state_desc, have_other_illness, have_pneumonia, admission_time, operation_plan_time, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, nickname, avatar, birthday, gender, home, height, weight, id_card, address, nation, citivaltype, contact, telephone, state_desc, medical_insurance_rate, other_subsidy, have_other_illness, have_pneumonia, operation_hospital, doctor, is_one_time_cure, admission_time, operation_plan_time, other_foundation_staff, staff, applicant, create_by, source, status, create_time, update_time', 'safe', 'on'=>'search'),
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
			'createby'=>array(self::BELONGS_TO, 'User', 'create_by'),
			'family'=>array(self::HAS_MANY,'CaseFamily','case_id'),
			'files'=>array(self::HAS_MANY,'CaseFile','case_id'),
			'charge'=>array(self::BELONGS_TO,'User','staff'),
			'sourcefrom'=>array(self::BELONGS_TO,'Org','source'),
		);
	}

	public function getStatus()
	{
		$key = $this->status;
		$status = array(
			0 => "新建",
			1 => "等待资助",
			2 => "确认资助",
			3 => "已资助",
			4 => "不资助",
		);
		return $status[$key];
	}

	public function getStatusLabel()
	{
		$key = $this->status;
		$status = array(
			0 => "<span class='label'>新建</label>",
			1 => "<span class='label label-info'>等待资助</label>",
			2 => "<span class='label label-warning'>确认资助</label>",
			3 => "<span class='label label-success'>已资助</label>",
			4 => "<span class='label label-important'>不资助</label>",
		);
		return $status[$key];
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => '姓名',
			'nickname' => '昵称',
			'avatar' => '头像',
			'birthday' => '出生日期',
			'gender' => '性别',
			'home' => '出生地',
			'height' => '身高（厘米）',
			'weight' => '体重（公斤）',
			'id_card' => '身份证',
			'address' => '家庭详细地址',
			'nation' => '民族',
			'citivaltype' => '户口性质',
			'contact' => '家庭联系人',
			'telephone' => '联系电话',
			'economical_source_desc'=>'主要经济来源说明',
			'special_desc'=>'特殊情况说明',
			'family_note'=>'备注',
			'other_note'=>'备注',
			'state_desc' => '患儿病情描述',
			'medical_insurance_rate' => '是否有医疗保险及跨地区治疗报销比例',
			'other_subsidy' => '当地民政或其他形式的大病救助补贴',
			'have_other_illness' => '是否有家族遗传病、其他重大疾病（如有请详细说明）',
			'have_pneumonia' => '是否在半年内患有肺炎（如有请详细说明肺炎治疗时间和治疗经过）',
			'operation_hospital' => '手术医院',
			'doctor' => '主治大夫',
			'is_one_time_cure' => '是否一次性根治',
			'admission_time' => '入院时间',
			'operation_plan_time' => '计划手术时间',
			'other_foundation_staff' => '其他基金会牵头人',
			'staff' => '海星尽职调查专员',
			'applicant' => '申请者',
			'source' => '案例来源',
			'status' => '状态',
			'create_by' => '创建者',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
		);
	}

	protected function beforeSave()
	{
    	if(parent::beforeSave()){
        	if($this->isNewRecord){
    				$this->create_time=$this->update_time=date('Y-m-d H:i:s');
        	}	
        	else{
        		$this->update_time=date('Y-m-d H:i:s');
        	}
        	if($this->birthday ==""){
        		$this->birthday = null;
        	}
        	if($this->admission_time ==""){
        		$this->admission_time = null;
        	}
        	if($this->operation_plan_time ==""){
        		$this->operation_plan_time = null;
        	}
        	return true;
    	}else
        	return false;
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('nickname',$this->nickname,true);
		$criteria->compare('avatar',$this->avatar,true);
		$criteria->compare('birthday',$this->birthday,true);
		$criteria->compare('gender',$this->gender);
		$criteria->compare('home',$this->home,true);
		$criteria->compare('height',$this->height,true);
		$criteria->compare('weight',$this->weight,true);
		$criteria->compare('id_card',$this->id_card,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('nation',$this->nation,true);
		$criteria->compare('citivaltype',$this->citivaltype,true);
		$criteria->compare('contact',$this->contact,true);
		$criteria->compare('telephone',$this->telephone,true);
		$criteria->compare('state_desc',$this->state_desc,true);
		$criteria->compare('economical_source_desc',$this->state_desc,true);
		$criteria->compare('special_desc',$this->state_desc,true);
		$criteria->compare('family_note',$this->state_desc,true);
		$criteria->compare('other_note',$this->state_desc,true);
		$criteria->compare('state_desc',$this->state_desc,true);
		$criteria->compare('medical_insurance_rate',$this->medical_insurance_rate,true);
		$criteria->compare('other_subsidy',$this->other_subsidy,true);
		$criteria->compare('have_other_illness',$this->have_other_illness,true);
		$criteria->compare('have_pneumonia',$this->have_pneumonia,true);
		$criteria->compare('operation_hospital',$this->operation_hospital,true);
		$criteria->compare('doctor',$this->doctor,true);
		$criteria->compare('is_one_time_cure',$this->is_one_time_cure);
		$criteria->compare('admission_time',$this->admission_time,true);
		$criteria->compare('operation_plan_time',$this->operation_plan_time,true);
		$criteria->compare('other_foundation_staff',$this->other_foundation_staff,true);
		$criteria->compare('staff',$this->staff,true);
		$criteria->compare('applicant',$this->applicant,true);
		$criteria->compare('create_by',$this->create_by);
		$criteria->compare('source',$this->source);
		$criteria->compare('status',$this->status);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}