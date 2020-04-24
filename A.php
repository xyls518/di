<?php


namespace App\Model;


class A implements InterfaceInfo
{
    private $info;

    /**
     * @return mixed
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param mixed $info
     * @return A
     */
    public function setInfo($info)
    {
        $this->info = $info." welcome client A";
        return $this;
    }
}