<?php

/**
 * This is the model class for table "tb_case_file".
 *
 * The followings are the available columns in table 'tb_case_file':
 * @property string $id
 * @property integer $case_id
 * @property string $key
 * @property string $path
 * @property string $title
 * @property string $desc
 * @property string $create_time
 * @property string $update_time
 */
class CaseFile extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CaseFile the static model class
	 */

	public function getFolder()
	{
		switch ($this->key[0]) {
			case 'f':
				return "Family Background";
				break;
			case 'p':
				return "Pictures";
				break;
			case 'm':
				return "Medical Background";
				break;
			case 'c':
				return "Case Summary and Post-Surgery";
				break;
			case 'a':
				return "Application Materials";
				break;
			case 'o':
				return "";
				break;
			default:
				return "unknown";
				break;
		}
	}

	public function getCateLabel()
	{
		switch ($this->key[0]) {
			case 'f':
				return "家庭背景";
				break;
			case 'p':
				return "照片";
				break;
			case 'm':
				return "病史";
				break;
			case 'c':
				return "结案及术后";
				break;
			case 'a':
				return "申请材料";
				break;
			default:
				return "未知";
				break;
		}
	}

	public function getCate()
	{
		switch ($this->key[0]) {
			case 'f':
				return "fbg";
				break;
			case 'p':
				return "pic";
				break;
			case 'm':
				return "mbg";
				break;
			case 'c':
				return "casesummary";
				break;
			case 'a':
				return "appfiles";
				break;
			default:
				return "unknown";
				break;
		}
	}

	public function getExt()
	{
		return strtolower(substr(strrchr($this->path, '.'), 1));
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
		return 'tb_case_file';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('case_id, title, key, path', 'required'),
			array('case_id', 'numerical', 'integerOnly'=>true),
			array('key', 'length', 'max'=>40),
			array('path', 'length', 'max'=>255),
			array('title', 'length', 'max'=>255),
			array('desc, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, case_id, key, path, title, desc, create_time, update_time', 'safe', 'on'=>'search'),
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
			'case'=>array(self::BELONGS_TO, 'Childcase', 'case_id'),
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
			'key' => '文件类型',
			'path' => '文件',
			'title' => '标题',
			'desc' => '备注',
			'create_time' => 'Create Datetime',
			'update_time' => 'Update Datetime',
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
		$criteria->compare('key',$this->key,true);
		$criteria->compare('path',$this->path,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('desc',$this->desc,true);
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