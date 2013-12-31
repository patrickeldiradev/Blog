<?php

namespace App\Mapper;

use App\DTO\AbstractTransfer;
use App\DTO\UserTransfer;

class UserMapper extends Mapper
{
    protected  array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return AbstractTransfer
     */
    public function mapToTransfer(): AbstractTransfer
    {
        $transfer = new UserTransfer();
        if (isset($this->data['id']))
            $transfer->setId($this->data['id']);

        if (isset($this->data['name']))
            $transfer->setName($this->data['name']);

        if (isset($this->data['email']))
            $transfer->setEmail($this->data['email']);

        if (isset($this->data['type']))
            $transfer->setType($this->data['type']);

        return $transfer;
    }
}
