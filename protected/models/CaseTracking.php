<?php

/**
 * This is the model class for table "tb_case_tracking".
 *
 * The followings are the available columns in table 'tb_case_tracking':
 * @property string $id
 * @property integer $case_id
 * @property string $step1
 * @property string $step2
 * @property string $step3
 * @property string $step4
 * @property string $step5
 * @property string $step6
 * @property string $step7
 * @property string $step8
 * @property string $step9
 * @property string $step10
 * @property string $step11
 */
class CaseTracking extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CaseTracking the static model class
	 */

	public function getStep($id)
	{
		$steps = array(
			'1' => '接受申请表',
			'2' => '家访',
			'3' => 'DD书面资料收集',
			'4' => '完成医疗评估',
			'5' => '电话会议讨论',
			'6' => '赞助决定',
			'7' => '打款',
			'8' => '入院',
			'9' => '手术',
			'10' => '出院',
			'11' => '结案单据',
		);
		return $steps[$id];
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
		return 'tb_case_tracking';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('case_id', 'numerical', 'integerOnly'=>true),
			array('step1, step2, step3, step4, step5, step6, step7, step8, step9, step10, step11', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, case_id, step1, step2, step3, step4, step5, step6, step7, step8, step9, step10, step11', 'safe', 'on'=>'search'),
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
			'logs'=>array(self::HAS_MANY,'CaseTrackingLog','tracking_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'case_id' => '案例',
			'step1' => '接受申请表',
			'step2' => '家访',
			'step3' => 'DD书面资料收集',
			'step4' => '完成医疗评估',
			'step5' => '电话会议讨论',
			'step6' => '赞助决定',
			'step7' => '打款',
			'step8' => '入院',
			'step9' => '手术',
			'step10' => '出院',
			'step11' => '结案单据',
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
		$criteria->compare('step1',$this->step1,true);
		$criteria->compare('step2',$this->step2,true);
		$criteria->compare('step3',$this->step3,true);
		$criteria->compare('step4',$this->step4,true);
		$criteria->compare('step5',$this->step5,true);
		$criteria->compare('step6',$this->step6,true);
		$criteria->compare('step7',$this->step7,true);
		$criteria->compare('step8',$this->step8,true);
		$criteria->compare('step9',$this->step9,true);
		$criteria->compare('step10',$this->step10,true);
		$criteria->compare('step11',$this->step11,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getLatestLog($sid)
	{
		$log = CaseTrackingLog::model()->find(array(
				'select' =>array('log_time,id,log_content'),
	  		'order' => 'id DESC',
				'condition' => 'tracking_id = :tid AND step = :sid',
				'params' => array(':tid'=>$this->id,':sid'=>$sid),
		));
		return $log;
	}
}