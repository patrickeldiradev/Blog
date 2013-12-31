<?php

namespace App\Mapper;

use App\DTO\AbstractTransfer;

abstract class Mapper
{
    /**
     * @return AbstractTransfer
     */
    abstract public function mapToTransfer(): AbstractTransfer;

}
