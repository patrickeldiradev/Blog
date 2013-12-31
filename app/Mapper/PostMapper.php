<?php

namespace App\Mapper;

use App\DTO\AbstractTransfer;
use App\DTO\PostTransfer;
use Illuminate\Support\Str;

class PostMapper extends Mapper
{
    protected array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return AbstractTransfer
     */
    public function mapToTransfer(): AbstractTransfer
    {
        $transfer = new PostTransfer();
        if (isset($this->data['id'])) {
            $transfer->setId($this->data['id']);
        }

        if (isset($this->data['title'])) {
            $transfer->setTitle($this->data['title']);
        }

        if (isset($this->data['description'])) {
            $transfer->setDescription($this->data['description']);
        }

        if (isset($this->data['brief']) && isset($this->data['description'])) {
            $transfer->setBrief(
                Str::limit($this->data['description'], $limit = 30, $end = '...')
            );
        }

        if (isset($this->data['publication_date'])) {
            $transfer->setPublicationDate($this->data['publication_date']);
        }

        if (isset($this->data['user'])) {
            $userMapper = new UserMapper([
                    'id' => auth()->user()->id,
                    'name' => auth()->user()->name,
                    'email' => auth()->user()->email,
                    'type' => auth()->user()->type,
            ]);
            $transfer->setUserTransfer($userMapper->mapToTransfer());
        }

        return $transfer;
    }
}
