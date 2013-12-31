<?php

namespace App\DTO;

class PostTransfer extends AbstractTransfer
{
    /**
     * @var int
     */
    protected int $id;

    /**
     * @var string
     */
    protected string $title;

    /**
     * @var string
     */
    protected string $description;

    /**
     * @var string
     */
    protected string $brief;

    /**
     * @var string
     */
    protected string $publication_date;

    /**
     * @var UserTransfer
     */
    protected UserTransfer $userTransfer;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }


    /**
     * @return string
     */
    public function getBrief(): string
    {
        return $this->breif;
    }

    /**
     * @param string $breif
     */
    public function setBrief(string $breif): void
    {
        $this->breif = $breif;
    }


    /**
     * @return string
     */
    public function getPublicationDate(): string
    {
        return $this->publication_date;
    }

    /**
     * @param string $publication_date
     */
    public function setPublicationDate(string $publication_date): void
    {
        $this->publication_date = $publication_date;
    }

    /**
     * @return UserTransfer
     */
    public function getUserTransfer(): UserTransfer
    {
        return $this->userTransfer;
    }

    /**
     * @param UserTransfer $userTransfer
     */
    public function setUserTransfer(UserTransfer $userTransfer): void
    {
        $this->userTransfer = $userTransfer;
    }
}
