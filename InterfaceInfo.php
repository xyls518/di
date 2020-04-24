<?php

namespace App\Model;

interface InterfaceInfo
{
    /**
     * @return mixed
     */
    public function getInfo();

    /**
     * @param mixed $info
     * @return A
     */
    public function setInfo($info);
}