<?php


namespace App\Model;

use App\Model\A;
use App\Model\B;

class Factory implements  InterfaceInfo
{
   private $Di;
   private $_options;
   private $_connnect;
   private $_toolPath;
   public  function __construct($options = null)
   {
       //加载配置
       if($options != null){
           $this->_options = $options;
           //传容器过来
           $this->setDi();
           //设置toolPath
           if(isset($options['toolPath'])){
               $this->_toolPath = $options['toolPath'];
           }else{
               $this->_toolPath = "\\App\\Model\\";
           }
           //注入工具类
           if(isset($options['connect'])){
               foreach ($options['connect'] as $key=>$val){
                   $this->rejectTool($val);
               }

           }
       }
   }

    //传容器过来
    private function setDi(){
        $this->Di = $this->_options['di'];
    }

    //注入工具类
    public function rejectTool($serviceName){
        $this->Di->set($serviceName,function () use($serviceName){
            $service = $this->_toolPath.$serviceName;
            return new $service();
        });
    }

    //连接工具类
    public function connect($serviceName){
       if (isset($this->_options['connect']) && in_array($serviceName,$this->_options['connect'])) {
           $this->_connnect = $this->Di->getSigleton($serviceName); //必须要走单例
           return $this;
       } else{
           throw new Exception("Service '" . $serviceName . "' wasn't found in the connect option");
           return false;
       }
   }

    /**
     * @inheritDoc
     */
    public function getInfo()
    {
        // TODO: Implement getInfo() method.
        $infoObj = $this->_connnect;
        if($infoObj instanceof InterfaceInfo && $infoObj != false){
            return $infoObj->getInfo();
        }else{
            return false;
        }
    }

    /**
     * @inheritDoc
     */
    public function setInfo($info)
    {
        // TODO: Implement setInfo() method.
        $infoObj = $this->_connnect;
        if($infoObj instanceof InterfaceInfo  && $infoObj != false){
            $infoObj->setInfo($info);
        }

    }


}