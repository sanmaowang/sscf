<?php

/**
 * This is the model class for table "tb_medical_info".
 *
 * The followings are the available columns in table 'tb_medical_info':
 * @property string $id
 * @property integer $case_id
 * @property string $title
 * @property string $content
 * @property string $create_datetime
 * @property string $update_datetime
 * @property integer $is_replied
 * @property integer $is_send
 */
class MedicalInfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MedicalInfo the static model class
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
		return 'tb_medical_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('case_id, title, content', 'required'),
			array('case_id, is_replied, is_send', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>80),
			array('content, create_datetime, update_datetime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, case_id, title, content, create_datetime, update_datetime, is_replied, is_send', 'safe', 'on'=>'search'),
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
			'case_id' => 'Case',
			'title' => '标题',
			'content' => '内容',
			'create_datetime' => 'Create Datetime',
			'update_datetime' => 'Update Datetime',
			'is_replied' => 'Is Replied',
			'is_send' => 'Is Send',
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
		$criteria->compare('case_id',$this->case_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('create_datetime',$this->create_datetime,true);
		$criteria->compare('update_datetime',$this->update_datetime,true);
		$criteria->compare('is_replied',$this->is_replied);
		$criteria->compare('is_send',$this->is_send);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	protected function beforeSave()
	{
    	if(parent::beforeSave()){
        	if($this->isNewRecord){
    				$this->create_datetime=$this->update_datetime=date('Y-m-d H:i:s');
        	}	
        	else{
        		$this->update_datetime=date('Y-m-d H:i:s');
        	}
        	return true;
    	}else
        	return false;
	}
}