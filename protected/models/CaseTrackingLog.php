<?php

/**
 * This is the model class for table "tb_case_tracking_log".
 *
 * The followings are the available columns in table 'tb_case_tracking_log':
 * @property string $id
 * @property integer $tracking_id
 * @property integer $step
 * @property string $log_content
 * @property string $log_time
 * @property string $create_time
 * @property string $update_time
 */
class CaseTrackingLog extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CaseTrackingLog the static model class
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
		return 'tb_case_tracking_log';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tracking_id, step', 'numerical', 'integerOnly'=>true),
			array('log_content, log_time, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, tracking_id, step, log_content, log_time, create_time, update_time', 'safe', 'on'=>'search'),
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
			'track'=>array(self::BELONGS_TO, 'CaseTracking', 'tracking_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'tracking_id' => 'Tracking',
			'step' => 'Step',
			'log_content' => '更新内容',
			'log_time' => '更新时间',
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
		$criteria->compare('tracking_id',$this->tracking_id);
		$criteria->compare('step',$this->step);
		$criteria->compare('log_content',$this->log_content,true);
		$criteria->compare('log_time',$this->log_time,true);
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