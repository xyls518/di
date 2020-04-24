<?php


namespace App\Model;


use App\Model\Factory;
use App\Model\Di;


class Client
{

    public $result;
    public function __construct()
    {
       $this->init(); //绑定DI容器
        //设置值进去
       $this->set("A");
       $this->set("B");

       //获取值出来
       $this->result = $this->get("A")."|".$this->get("B");
       echo $this->get("A")."\r\n";
       echo $this->get("B")."\r\n";
    }

    public function init(){
        $di = Di::getSelf();
        $toolPath = "\\App\\Model\\"; //工具类命名空间所在位置
        //注入工厂类
        $di->set("Factory",function () use ($di,$toolPath){
            $factory = new Factory(['connect'=>["A","B"],'di'=>$di,'toolPath'=>$toolPath]);
            return $factory;
        });

    }

    public function get($name){
        return Di::getSelf()->get("Factory")->connect($name)->getInfo(); //new 一个新的factory
    }

    public function set($name){
        Di::getSelf()->get("Factory")->connect($name)->setInfo("this is ".$name." class"); //new 一个新的factory
    }

}