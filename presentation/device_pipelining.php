<?php

class devicePipelining
{
    public $deviceData;

    public function __construct()
    {
        $this->deviceData = generalOperations::getAllDeviceData();
    }
}
