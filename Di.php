<?php


namespace App\Model;


class Di
{
    private  $_service = []; //存服务
    private  $_sigleton=[]; //存单例
    private  static $instance;

    public function __construct()
    {

    }

    //设置服务
    public  function set($name, $definition)
    {
        $this->_service[$name] = $definition;
    }
    //获取服务
    public  function get($name)
    {
        if (isset($this->_service[$name])) {
            $definition = $this->_service[$name];
        } else {
            throw new Exception("Service '" . name . "' wasn't found in the dependency injection container");
            return false;
        }
        if (is_object($definition)) {
            $instance = call_user_func($definition); //从新new 了一个对象
        }
        $this->_sigleton[$name] = $instance;
        return $instance;
    }

    public static function getSelf(){
        if(empty(self::$instance)){
            self::$instance = new self();
        }
        return self::$instance;
    }

    //获取单例
    public  function getSigleton($name){
        if (isset($this->_sigleton[$name])) {
            return $this->_sigleton[$name];
        } else {
            $instance = $this->get($name);
            return $instance;
        }

    }
}