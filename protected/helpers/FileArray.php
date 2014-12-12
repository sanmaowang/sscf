<?php

/*
Files Name...
and Validation process
*/
class FileArray {

    static $submitRequiredFiles=array(
      "family_idcard", 
      "family_registry", 
      "family_parents_registry", 
      "family_proof", 
      "mbg_echocardiography", 
    );

    static $finishRequiredFiles = array(
        "case_Hospital_Receipt"=>"医院收据", 
        "case_Expenses_Breakdown"=>"费用清单", 
        "case_Discharge_Summary"=>"出院小结", 
        "case_Funding_Source"=>"手术资金来源和费用明细(EXCEL)", 
    );

    static $needSumbmitIfExists = array(
        "mbg_IV"=>"导管诊断报告（如做导管）", 
        "mbg_X_Ray"=>"胸部X光片报告（有肺炎记录）",  
        "mbg_CT_Directed"=>"CT引导穿刺",  
        "mbg_3D_Echocardiography"=>"三维心超图、心电图", 
        "mbg_Lung_infection"=>"肺炎住院纪录、肺炎用药治疗纪录（有过肺炎并住院治疗的患儿）", 
        "mbg_Incurred_medical_expenses" =>"已经产生的医疗费用收费单据（已经有过手术或者肺炎治疗的孩子）", 
    );

    static $labels = array(
        "family_idcard"=>"父母或监护人身份证", 
        "family_registry"=>"患儿户口本", 
        "family_parents_registry"=>"父母或监护人户口本", 
        "family_other_registry"=>"其它家庭成员户口本", 
        "family_proof"=>"贫困证明（乡级以上盖章有效）", 
        "family_other"=>"其它家庭资料附件", 
        "pic_life"=>"患儿生活照片", 
        "pic_household"=>"家庭房屋照片",
        "pic_visit"=>"海星探视孩子照片",
        "pic_other"=>'其它照片',
        "mbg_echocardiography"=>"心脏彩超（超声心动）报告", 
        "mbg_IV"=>"导管诊断报告（如做导管）",  
        "mbg_X_Ray"=>"胸部X光片报告（有肺炎记录）",  
        "mbg_CT_Directed"   =>"CT引导穿刺",  
        "mbg_3D_Echocardiography"   =>"三维心超图、心电图", 
        "mbg_Lung_infection"    =>"肺炎住院纪录、肺炎用药治疗纪录（有过肺炎并住院治疗的患儿）", 
        "mbg_Incurred_medical_expenses" =>"已经产生的医疗费用收费单据（已经有过手术或者肺炎治疗的孩子）", 
        "mbg_other"=>"其他医疗资料", 
        "case_Hospital_Receipt"=>"医院收据", 
        "case_Expenses_Breakdown"=>"费用清单", 
        "case_Discharge_Summary"=>"出院小结", 
        "case_Funding_Source"=>"手术资金来源和费用明细(EXCEL)", 
        "case_other"=>'其他费用文件', 
        "appfile_Indemnity_Agreement"=>"免责协议",
        "appfile_other"=>"其他申请文件",
        "medical_assessment"=>"医疗评估", 
        "dc_memo"=>"dc_memo", 
        "attach_file"=>"其他附件",
    );

    public function getRequiredFiles(){
      return self::$submitRequiredFiles;
    }

  public function getLabel($key)
  {
    return self::$labels[$key];
  }

  public function getLabels()
  {
    return self::$labels;
  }

  public function getPageTitle($key){
    $page_title = array(
      "appfiles"=>'Application files',
      "mbg"=>"Medical Background",
      "fbg"=>"Family Background",
      "pic"=>"Medical Background",
      "casesummary"=>"Case Summary and Post-Surgery",
    );
    return $page_title[$key];
  }

  public function getDropDown($key)
  {
  $radio_label = array(
      "fbg"=>array(
        "family_idcard"=>"父母或监护人身份证",
        "family_registry"=>"患儿户口本", 
        "family_parents_registry"=>"父母或监护人户口本", 
        "family_other_registry"=>"其它家庭成员户口本", 
        "family_proof"=>"贫困证明（乡级以上盖章有效）",
        "family_other"=>"其它",
        // "father_id"=>"身份证（父亲）",
        // "mother_id"=>"身份证（母亲）",
        // "other_id"=>"身份证（父母外监护人）",
        // "other_im_id"=>"身份证（其他直系亲属）",
        // "other_fm_id"=>"身份证（其他家庭成员）",
        // "parent_registry"=>"户口页（父亲）",
        // "mother_registry"=>"户口页（母亲）",
        // "other_registry"=>"户口页（父母外监护人）",
        // "other_im_registry"=>"户口页（其他直系亲属）",
        // "other_fm_registry"=>"户口页（其他家庭成员）",
        // "other_cun_proof"=>"贫困证明（村级盖章）",
        // "other_xiang_proof"=>"贫困证明（乡级以上盖章）",
        // "other_file"=>"其他文件",
      ),
      "pic"=>array(
        "pic_life"=>"患儿生活照片",
        "pic_household"=>"家庭房屋照片",
        "pic_visit"=>"海星探视孩子照片",
        "pic_other"=>'其它照片'
      ),
      "mbg"=>array(
        "mbg_echocardiography"=>"心脏彩超（超声心动）报告",
        "mbg_IV"=>"导管诊断报告（如做导管）",
        "mbg_X_Ray"=>"胸部X光片报告（有肺炎记录）",
        "mbg_CT_Directed" =>"CT引导穿刺",
        "mbg_3D_Echocardiography" =>"三维心超图、心电图",
        "mbg_Lung_infection"  =>"肺炎住院纪录、肺炎用药治疗纪录（有过肺炎并住院治疗的患儿）",
        "mbg_Incurred_medical_expenses" =>"已经产生的医疗费用收费单据（已经有过手术或者肺炎治疗的孩子）",
        "mbg_other"=>"其他资料"
      ),
      "casesummary"=>array(
        "case_Hospital_Receipt"=>"医院收据",
        "case_Expenses_Breakdown"=>"费用清单",
        "case_Discharge_Summary"=>"出院小结",
        "case_Funding_Source"=>"手术资金来源和费用明细(EXCEL)",
        "case_other"=>'其他文件'
      ),
      "appfiles"=>array(
        "appfile_Indemnity_Agreement"=>"免责协议",
        "appfile_other"=>"其他文件",
        "attach_file"=>'附件',
        "dc_memo"=>'DC_demo'
      )
    );
      return $radio_label[$key];
    }

}

?>