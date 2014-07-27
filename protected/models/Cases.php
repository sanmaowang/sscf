<?php

/**
 * This is the model class for table "tb_case".
 *
 * The followings are the available columns in table 'tb_case':
 * @property string $id
 * @property integer $child_id
 * @property string $state_desc
 * @property string $medical_insurance_rate
 * @property string $other_subsidy
 * @property string $have_other_illness
 * @property string $have_pneumonia
 * @property string $operation_hospital
 * @property string $doctor
 * @property integer $is_one_time_cure
 * @property string $admission_time
 * @property string $operation_plan_time
 * @property string $other_foundation_staff
 * @property string $staff
 * @property string $applicant
 * @property integer $status
 * @property string $create_time
 * @property string $update_time
 */
class Cases extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Cases the static model class
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
			array('child_id, is_one_time_cure, status', 'numerical', 'integerOnly'=>true),
			array('medical_insurance_rate, other_subsidy, operation_hospital', 'length', 'max'=>255),
			array('doctor', 'length', 'max'=>80),
			array('other_foundation_staff, staff, applicant', 'length', 'max'=>11),
			array('state_desc, have_other_illness, have_pneumonia, admission_time, operation_plan_time, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, child_id, state_desc, medical_insurance_rate, other_subsidy, have_other_illness, have_pneumonia, operation_hospital, doctor, is_one_time_cure, admission_time, operation_plan_time, other_foundation_staff, staff, applicant, status, create_time, update_time', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'child_id' => 'Child',
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
			'status' => '状态',
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
		$criteria->compare('child_id',$this->child_id);
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
		$criteria->compare('status',$this->status);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}