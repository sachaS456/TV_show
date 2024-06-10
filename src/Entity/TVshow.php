<?php

namespace Entity;

use Database\MyPdo;
use Entity\Collection\AlbumCollection;
use Entity\Exception\EntityNotFoundException;
use PDO;

class TVshow
{
    private ?int $id;
    private string $name;
    private string $originalName;
    private string $homepage;
    private string $overview;
    private int $posterId;

    /**
     * Id getter
     *
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Id Setter
     * @param int|null $id
     * @return void*
     */
    public function setId(?int $id = null): void
    {
        $this->id = $id;
    }

    /**
     * Name getter
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Name setter
     * @param string $name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * OriginalName getter
     * @return string
     */
    public function getOriginalName(): string
    {
        return $this->originalName;
    }

    /**
     * originalName setter
     * @param string $originalName
     * @return void
     */
    public function setOriginalName(string $originalName): void
    {
        $this->originalName = $originalName;
    }

    /**
     * Homepage getter
     * @return string
     */
    public function getHomepage(): string
    {
        return $this->homepage;
    }

    /**
     * homepage setter
     * @param string $homepage
     * @return void
     */
    public function setHomepage(string $homepage): void
    {
        $this->homepage = $homepage;
    }

    /**
     * Overview getter
     * @return string
     */
    public function getOverview(): string
    {
        return $this->overview;
    }

    /**
     * Overview setter
     * @param string $overview
     * @return void
     */
    public function setOverview(string $overview): void
    {
        $this->overview = $overview;
    }

    /**
     * posterId getter
     * @return int
     */
    public function getPosterId(): int
    {
        return $this->posterId;
    }

    /**
     * poster id setter
     * @param int $posterId
     * @return void
     */
    public function setPosterId(int $posterId): void
    {
        $this->posterId = $posterId;
    }





}
