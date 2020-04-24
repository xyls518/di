<?php


namespace App\Model;


class B implements  InterfaceInfo
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
     * @return B
     */
    public function setInfo($info)
    {
        $this->info = $info." welcome client B";
        return $this;
    }
}