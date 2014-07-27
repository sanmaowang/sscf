<?php

class CampaignOperationDbLogRoute extends CDbLogRoute 
{
	protected function createLogTable($db,$tableName)
	{
		$db->createCommand()->createTable($tableName, array(
			'id'=>'pk',
			'level'=>'varchar(128)',
			'category'=>'varchar(128)',
			'logtime'=>'datetime',
			'message'=>'text',
			'campaign_id'=>'integer',
			'operator_id'=>'integer',
		));
	}

	protected function processLogs($logs)
	{
		$command = $this->getDbConnection()->createCommand();
		$logTime = date('Y-m-d H:i:s');

		foreach($logs as $log)
		{
			$info = explode('#', $log[0]);
			$command->insert($this->logTableName,array(
				'level'=>$log[1],
				'category'=>$log[2],
				'logtime'=>$logTime,
				'message'=>$info[1],
				'campaign_id'=>$info[0],
				'operator_id'=>Yii::app()->user->id,
			));
		}
	}
}