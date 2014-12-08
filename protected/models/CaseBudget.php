<?php

/**
 * This is the model class for table "tb_case_budget".
 *
 * The followings are the available columns in table 'tb_case_budget':
 * @property string $id
 * @property integer $case_id
 * @property string $type
 * @property integer $fee_type
 * @property double $amount
 * @property integer $source
 * @property string $note
 * @property string $last_date
 * @property string $create_datetime
 * @property string $update_datetime
 */
class CaseBudget extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CaseBudget the static model class
	 */

	static $budget_type_name = array(
		'org_budget'=>'机构意向',
		'our_budget'=>'海星意向',
	);

	static $cost_type_name = array(
		'org_cost'=>'机构资助',
		'our_cost'=>'海星资助',
	);

	public function getType($key)
	{
		$labels = array(
		'hospital_cost'=>'手术实际费用',
		'our_cost'=>'海星资助',
		'org_cost'=>'机构资助',
		'hospital_budget'=>'手术预算',
		'our_budget'=>'海星意向',
		'org_budget'=>'机构意向',
		);
		return $labels[$key];
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
		return 'tb_case_budget';
	}

	

	public function getTypes($fee_type)
	{
		if($fee_type == 0){
			return self::$budget_type_name;
		}else{
			return self::$cost_type_name;
		}
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('case_id, amount, fee_type, source, note','required'),
			array('case_id, amount, fee_type, source', 'numerical', 'integerOnly'=>true),
			array('amount', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, case_id, fee_type, type, amount, source, note, last_date, create_datetime, update_datetime', 'safe', 'on'=>'search'),
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
			'case_id'=>'所属case',
			'type' => '类型',
			'amount' => '金额',
			'source' => '来源',
			'note' => '说明',
			'last_date' => '截至日期',
			'create_datetime' => 'Create Datetime',
			'update_datetime' => 'Update Datetime',
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
		$criteria->compare('fee_type',$this->fee_type);
		$criteria->compare('type',$this->type);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('source',$this->source);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('last_date',$this->last_date,true);
		$criteria->compare('create_datetime',$this->create_datetime,true);
		$criteria->compare('update_datetime',$this->update_datetime,true);

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