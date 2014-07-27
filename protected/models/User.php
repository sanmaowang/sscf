<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property string $id
 * @property string $username
 * @property string $name
 * @property string $id_card
 * @property integer $gender
 * @property string $birthday
 * @property integer $marital_status
 * @property string $job_number
 * @property string $department
 * @property string $email
 * @property string $password
 * @property string $mobile
 * @property string $nickname
 * @property string $avatar
 * @property string $create_time
 * @property string $update_time
 * @property string $login_count
 * @property integer $role
 * @property integer $is_deleted
 */
class User extends CActiveRecord
{
	public $new_password,$repeat_new_password;
  public $old_password;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'tb_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('old_password, new_password, repeat_new_password', 'required','on'=>'password'),
			array('new_password, repeat_new_password', 'length','min'=>6, 'max'=>12),
      array('new_password', 'compare', 'compareAttribute'=>'repeat_new_password','message'=>"new password and confirm password do not match"),
			array('old_password','validatePassword','on'=>'password'),
			array('gender, marital_status, role, is_deleted', 'numerical', 'integerOnly'=>true),
			array('username, id_card, job_number, department, email, nickname', 'length', 'max'=>64),
			array('name', 'length', 'max'=>20),
			array('username', 'unique'),
			array('email', 'unique'),
			array('email, password, username, role','required','on'=>'create'),
			array('password, avatar', 'length', 'max'=>255),
			array('mobile', 'length', 'max'=>15),
			array('login_count', 'length', 'max'=>10),
			array('birthday, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, name, id_card, gender, birthday, marital_status, job_number, department, email, password, mobile, nickname, avatar, create_time, update_time, login_count, role, is_deleted', 'safe', 'on'=>'search'),
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
			'file' => array(self::MANY_MANY, 'File', 'tb_user_file(user_id，file_id)')
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

	public function beforeSave()
    {
    	if(!empty($this->old_password) && !empty($this->repeat_new_password))
    	$this->password = $this->repeat_new_password;
        return parent::beforeSave();
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
			'marital_status' => 'Marital Status',
			'job_number' => 'Job Number',
			'department' => 'Department',
			'email' => 'Email',
			'password' => Yii::t('site','Password'),
			'old_password' => Yii::t('site','Old Password'),
			'new_password'=> Yii::t('site','New Password'),
			'repeat_new_password'=>Yii::t('site','Confirm Password'),
			'mobile' => 'Mobile',
			'nickname' => 'Nickname',
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
		$criteria->compare('marital_status',$this->marital_status);
		$criteria->compare('job_number',$this->job_number,true);
		$criteria->compare('department',$this->department,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('nickname',$this->nickname,true);
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