<?php

/**
 * This is the model class for table "tb_org".
 *
 * The followings are the available columns in table 'tb_org':
 * @property string $id
 * @property integer $parent_id
 * @property string $name
 * @property string $offical_name
 * @property string $address
 * @property string $description
 * @property string $website
 * @property string $contact
 * @property integer $type
 * @property string $create_time
 * @property string $update_time
 */
class Org extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Org the static model class
	 */

	public $childs;

	public $types = array(
		1=>"公立医院",
		2=>"私立医院",
		3=>"全国公募基金会",
		4=>"地方公募基金会",
		5=>"全国非公募基金会",
		6=>"地方非公募",
		7=>"医院银行"
	);
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tb_org';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, parent_id', 'required'),
			array('parent_id, type', 'numerical', 'integerOnly'=>true),
			array('name, offical_name, contact, website', 'length', 'max'=>64),
			array('address', 'length', 'max'=>255),
			array('description, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, parent_id, name, contact, offical_name, address, description,website,  type, create_time, update_time', 'safe', 'on'=>'search'),
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
			'parent'=>array(self::BELONGS_TO, 'Org', 'parent_id'),
      'sub' => array(self::HAS_MANY, 'Org', 'parent_id'),
      'contact' => array(self::HAS_MANY, 'OrgContact', 'org_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'parent_id' => '所属机构',
			'name' => '名称',
			'offical_name' => '官方名称',
			'address' => '总部地址',
			'description' => '主要介绍',
			'website' => '官方网站',
			'contact' => '联系方式',
			'type' => '类型',
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
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('offical_name',$this->offical_name,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('contact',$this->contact,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
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
}