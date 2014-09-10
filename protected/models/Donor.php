<?php

/**
 * This is the model class for table "tb_donor".
 *
 * The followings are the available columns in table 'tb_donor':
 * @property string $id
 * @property string $username
 * @property string $name
 * @property string $id_card
 * @property integer $gender
 * @property string $birthday
 * @property string $company
 * @property string $job
 * @property string $department
 * @property string $email
 * @property string $password
 * @property string $mobile
 * @property string $avatar
 * @property string $create_time
 * @property string $update_time
 * @property string $login_count
 * @property integer $role
 * @property integer $is_deleted
 */
class Donor extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Donor the static model class
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
		return 'tb_donor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('gender, role, is_deleted', 'numerical', 'integerOnly'=>true),
			array('username, id_card, company, job, department, email, password', 'length', 'max'=>64),
			array('name', 'length', 'max'=>20),
			array('mobile', 'length', 'max'=>15),
			array('avatar', 'length', 'max'=>255),
			array('login_count', 'length', 'max'=>10),
			array('username', 'unique'),
			array('email', 'unique'),
			array('email, password, username, name','required'),
			array('birthday, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, name, id_card, gender, birthday, company, job, department, email, password, mobile, avatar, create_time, update_time, login_count, role, is_deleted', 'safe', 'on'=>'search'),
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
			'receipt' => array(self::MANY_MANY, 'Receipt', 'tb_donor_receipt(donor_id，receipt_id)')
		);
	}

	public function validatePassword($attribute,$params){
		if(!$this->hasErrors())
		{
			if(!empty($this->old_password) && $this->old_password != $this->password){
				$this->addError($attribute,'the old password is not correct' ); 
			}
		}
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
        	return true;
    	}else
        	return false;
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'name' => 'Name',
			'id_card' => 'Id Card',
			'gender' => 'Gender',
			'birthday' => 'Birthday',
			'company' => 'Company',
			'job' => 'Job',
			'department' => 'Department',
			'email' => 'Email',
			'password' => 'Password',
			'mobile' => 'Mobile',
			'avatar' => 'Avatar',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
			'login_count' => 'Login Count',
			'role' => 'Role',
			'is_deleted' => 'Is Deleted',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('id_card',$this->id_card,true);
		$criteria->compare('gender',$this->gender);
		$criteria->compare('birthday',$this->birthday,true);
		$criteria->compare('company',$this->company,true);
		$criteria->compare('job',$this->job,true);
		$criteria->compare('department',$this->department,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('avatar',$this->avatar,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('login_count',$this->login_count,true);
		$criteria->compare('role',$this->role);
		$criteria->compare('is_deleted',$this->is_deleted);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}