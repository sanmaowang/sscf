<?php
/*
	for initial data;
*/

	private function getFile($dir,$arr)
	{
		// $total = $arr;
		if($dh = opendir($dir)){
			while(($file = readdir($dh))!== false){
      	if($file != "." && $file != ".."&&$file !=".DS_Store"){
    			$file_newname = $this->renameFile($file);
    			$file_newname = $file;

      		$dir_old = $dir.'/'.$file;
      		$dir_new = $dir.'/'.$file_newname;

      		if(is_dir($dir_old)){
      			if(rename($dir_old,$dir_new))
      			$arr[$file_newname] = $this->getFile($dir_new,$arr[$file_newname]);
      		}else{
      			if(rename($dir_old,$dir_new)){
	      			$arr[] .= $file_newname;
	      			$this->filespath[] .= $dir_new; 
      			}
      		}
      	}
			}
		}
		return $arr;
	}


	private function renameFile($name)
	{
		$filename = $name;
		if($name[0] == '0'){
			if($name[3] == "2"){
				$filename = trim(substr($name,3));
			}else if($name[3] == '.'){
				$filename = trim(substr($name,4));
			}
		}
		return $filename;
	}

	private function getFileType($file)
	{
    $file =	strtolower($file);
		$folder_names = array(
    	'application' =>'appfile_other',
    	'case'=>'case_other',
    	'family'=>'family_other',
    	'medical'=>'mbg_other',
    	'picture'=>'pic_other',
    	'archive'=>'dc_memo',
    );
    
    $type = 'attach_file';
    foreach ($folder_names as $key => $value) {
    	if(strpos($file, $key) !== false){
    		$type = $value;
    		break;
    	}
    }
    return $type;
	}


	public function actionTest()
	{
		$dir = Yii::getPathOfAlias('webroot')."/uploads/case/passed";  // 文件夹的名称
		if(count($this->filespath) == 0){
			$arr = $this->getFile($dir,array());
		}
		ksort($arr,SORT_NUMERIC);
		foreach($arr as $case_name =>$files){
			preg_match_all("/[\x{4e00}-\x{9fa5}]+/u", $case_name, $chinese);
			$child = implode("", $chinese[0]);
			$childcase = Childcase::model()->findByAttributes(array('name'=>$child));
			if($childcase){
				$case_id = $childcase->id;
			}else{
				$model = new Childcase;
				$model->name = trim($child);
				$model->create_by = 1;
				$model->status = 4;
				if($model->save()){
					$case_id = $model->id;
				}
			}
			foreach ($this->filespath as $file_name) {
					if(strstr($file_name,$child)){
						$file = pathinfo($file_name);
						$file_path = substr($file_name, strlen($dir)+1);
						$file_real_name = $file['filename'];
						$file_path_array = explode('/', $file_path);
						$file_path_array = array_reverse($file_path_array);
						
						$i = count($file_path_array);
						if($i >=3){
							$type = $this->getFileType($file_path_array[$i-2]);
						}else{
							$type = "attach_file";
						}
						
						$caseFile = new CaseFile;
						$caseFile->case_id = $case_id;
						$caseFile->path = $file_path;
						$caseFile->key = $type;
						$caseFile->title = $file_real_name;
						if($caseFile->save()){
							$new_arr[] .= 'success';
							// $new_arr[$caseFile->id]['file_name'] = $file_real_name;
						}else{
							$new_arr[] .= $caseFile->getErrors();
						}
					}
				}
			$arr[$case_name]['case_id'] = $case_id;
		}
		echo CJSON::encode($new_arr);
	}

?>