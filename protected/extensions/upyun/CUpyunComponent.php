<?php
require_once ('upyun.class.php');
/**
 * Image Store in upyun
 *
 * @author Sanmao
 */
class CUpyunComponent extends CApplicationComponent
{
    public $upyun;
    public function init()
    {
        parent::init();
        $this->upyun = new UpYun('seastar', 'sanmao', 'N3XNuTuERE');
    }

    public function load()
    {
        return new CUpyunComponent;
    }

    public function saveImg($img, $img_rename, $opts = array()) {
        try
        {
            $fh = fopen($img, 'rb');
            $rsp = $this->upyun->writeFile($img_rename, $fh, True, $opts);   // 上传图片，自动创建目录
            fclose($fh);
            return $rsp;
        }
        catch(Exception $e) {
            echo $e->getCode();
            echo "1111111";
            echo $e->getMessage();
        }
    }
}
?>
