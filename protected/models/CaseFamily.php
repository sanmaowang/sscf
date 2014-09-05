<?php

/**
 * This is the model class for table "tb_case_family".
 *
 * The followings are the available columns in table 'tb_case_family':
 * @property string $id
 * @property integer $case_id
 * @property string $relationship
 * @property integer $is_immediate
 * @property integer $age
 * @property string $id_card
 * @property string $education
 * @property string $nation
 * @property string $health_state
 * @property string $career
 * @property string $annual_income
 * @property string $note
 * @property string $create_time
 * @property string $update_time
 */
class CaseFamily extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CaseFamily the static model class
	 */

	public $r_label = array('父亲','母亲','兄弟姐妹');
	public $r_edu =  array('小学','初中','高中','本科','硕士','博士及其以上');

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tb_case_family';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, relationship', 'required'),
			array('name, relationship', 'length', 'max'=>20),
			array('case_id, is_immediate, age', 'numerical', 'integerOnly'=>true),
			array('id_card, education, health_state, career', 'length', 'max'=>80),
			array('nation, annual_income', 'length', 'max'=>25),
			array('id_card', 'match', 'pattern'=>'/^\d{6}((1[89])|(2\d))\d{2}((0\d)|(1[0-2]))((3[01])|([0-2]\d))\d{3}(\d|X)$/i',
          'message'=>'身份证格式不正确.'),
			array('note, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, case_id,name, relationship, is_immediate, age, id_card, education, nation, health_state, career, annual_income, note, create_time, update_time', 'safe', 'on'=>'search'),
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
			'name' => '姓名',
			'relationship' => '关系',
			'is_immediate' => '是否直系亲属',
			'age' => '年龄',
			'id_card' => '身份证',
			'education' => '文化程度',
			'nation' => '民族',
			'health_state' => '健康状况',
			'career' => '职业',
			'annual_income' => '年收入',
			'note' => '备注',
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
		$criteria->compare('case_id',$this->case_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('relationship',$this->relationship);
		$criteria->compare('is_immediate',$this->is_immediate);
		$criteria->compare('age',$this->age);
		$criteria->compare('id_card',$this->id_card,true);
		$criteria->compare('education',$this->education,true);
		$criteria->compare('nation',$this->nation,true);
		$criteria->compare('health_state',$this->health_state,true);
		$criteria->compare('career',$this->career,true);
		$criteria->compare('annual_income',$this->annual_income,true);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}