<?php

namespace Entity;

use Database\MyPdo;
use Entity\Collection\AlbumCollection;
use Entity\Collection\SeasonCollection;
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


    /**
     * TvShow by id Finder. Returns the tvShow links to the id which is given in settings
     * @param int $id
     * @return TVshow
     */
    public static function findById(int $id): TVshow // EntityNotFoundException
    {
        $req = MyPdo::getInstance()->prepare(
            <<<'SQL'
    SELECT id, name, originalName, homepage, overview, posterId
    FROM tvshow
    WHERE id = :pid
SQL
        );
        $req->execute(['pid' => $id]);



        $res = $req->fetchObject(TVshow::class);

        if ($res === false) {
            throw new EntityNotFoundException("findById : $id doesn't exist ");
        }
        return $res;
    }

    /**
     * Seasons getter for a tvshow
     * @return array
     */
    public function getSeasons(): array
    {
        return SeasonCollection::findByTVshowId($this->getId());
    }

    /**
     * private constructor
     */
    private function __construct()
    {
    }

    /**
     * Method used to update the artist with the id of current object in the database
     * @return $this
     */
    public function update(): TVshow
    {
        $stmt = MyPdo::getInstance()->prepare(
            <<<'SQL'
        UPDATE tvshow
        SET name = :name, originalName = :original, homepage = :home, overview = :over, posterId = :posterId
        WHERE id = :id
SQL
        );
        $stmt->execute(['id' => $this->getId(), 'name' => $this->getName(), 'original' => $this->getOriginalName(), 'home' => $this->homepage,'over' => $this->overview,'posterId' => $this->posterId]);
        return $this;
    }

    public function insert()
    {
        $stmt = myPdo::getInstance()->prepare(
            <<<'SQL'
            INSERT INTO tvshow (name, originalName, homepage, overview, posterId) VALUES (:id,:name, :original, :home, :over, :posterId)
SQL
        );
        $stmt->execute(['id' => $this->getId(), 'name' => $this->getName(), 'original' => $this->getOriginalName(), 'home' => $this->homepage,'over' => $this->overview,'posterId' => $this->posterId]);
        $this->setId(MyPdo::getInstance()->lastInsertId());
        return $this;
    }



}
