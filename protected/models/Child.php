<?php

/**
 * This is the model class for table "tb_child".
 *
 * The followings are the available columns in table 'tb_child':
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
 * @property string $create_time
 * @property string $update_time
 */
class Child extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Child the static model class
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
		return 'tb_child';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('gender', 'numerical', 'integerOnly'=>true),
			array('name, id_card, nation, citivaltype, contact, telephone', 'length', 'max'=>25),
			array('nickname, avatar', 'length', 'max'=>64),
			array('home', 'length', 'max'=>80),
			array('height, weight', 'length', 'max'=>6),
			array('address', 'length', 'max'=>160),
			array('birthday, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, nickname, avatar, birthday, gender, home, height, weight, id_card, address, nation, citivaltype, contact, telephone, create_time, update_time', 'safe', 'on'=>'search'),
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
			'name' => '姓名',
			'nickname' => '昵称',
			'avatar' => '头像',
			'birthday' => '生日',
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
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}