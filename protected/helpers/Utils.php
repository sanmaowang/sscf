<?php
/**
 * Utils class file. 
 * 
 * @author Sanmao Wang <wang@sanmao.me>
 * @copyright Copyright &copy; 2013 Sgg Inc. 
 */

class Utils {
  public static function fileExt($filename) {
    return strtolower( strrchr( $filename , '.' ) );
  }

  public static function display_percent($num, $digit){
    if($num != 0){
      return round($num * 100, $digit)."%";
    }
  }
  public static function display_money($num,$digit){
    $num = round($num, $digit);
    if($num != 0){
      if($num >= 1000){
        return "￥".number_format($num);
      }else{
        return "￥".sprintf("%.2f",$num);
      }
    }
  }
  public static function display_num($num){
    if(isset($num) && $num !=0){
      if($num >= 1000){
        return number_format($num);
      }else{
        return sprintf("%.2f", $num);  
      }
    }
  }

  public static function array_build_tree($items){
    $childs = array();
    foreach($items as $item)
        $childs[$item->parent_id][] = $item;
    foreach($items as $item) if (isset($childs[$item->id]))
        $item->childs = $childs[$item->id];
    return $childs[0];
  }

  
  public static function recur_mkdirs($path, $chmod = 0777) {
    
    //$GLOBALS["dirseparator"]
    $dirs = explode(DIRECTORY_SEPARATOR, $path);
    $pos = strrpos($path, ".");
    if ($pos === false) { // note: three equal signs
        // not found, means path ends in a dir not file
        $subamount = 0;
    } else {
        $subamount = 1;
    }
    
    for ($c = 0; $c < count($dirs) - $subamount; $c++) {
        $thispath = "";
        for ($cc = 0; $cc <= $c; $cc++) {
            $thispath .= $dirs[$cc].DIRECTORY_SEPARATOR;
        }
        if (!file_exists($thispath)) {
            //print "$thispath<br>";
            mkdir($thispath, $chmod);
        }
    }
  }

 public static function age($birthdate){
   $birthDate = explode("-", $birthdate);
   $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md") ? ((date("Y")-$birthDate[0])-1):(date("Y")-$birthDate[0]));
   return $age;
 }

 public static function time_ago($cur_time){
    $agoTime = time() - $cur_time;
    if ( $agoTime <= 60 ) {
        return $agoTime.'秒前';
    }elseif( $agoTime <= 3600 && $agoTime > 60 ){
        return intval($agoTime/60) .'分钟前';
    }elseif ( date('d',$cur_time) == date('d',time()) && $agoTime > 3600){
        return '今天 '.date('H:i',$cur_time);
    }elseif( date('d',$cur_time+86400) == date('d',time()) && $agoTime < 172800){
        return '昨天 '.date('H:i',$cur_time);
    }else{
        return date('Y年n月j日 H:i',$cur_time);
    }
  }

 //获取文件目录列表,该方法返回数组
public static function getDir($dir) {
    $dirArray[]=NULL;
    if (false != ($handle = opendir ( $dir ))) {
        $i=0;
        while ( false !== ($file = readdir ( $handle )) ) {
            //去掉"“.”、“..”以及带“.xxx”后缀的文件
            if ($file != "." && $file != ".."&&!strpos($file,".")) {
                $dirArray[$i]=$file;
                $i++;
            }
        }
        //关闭句柄
        closedir ( $handle );
    }
    return $dirArray;
}
 

}
