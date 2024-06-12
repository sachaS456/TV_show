<?php

namespace Entity;

use Database\MyPdo;
use Entity\Collection;
use Entity\Exception\EntityNotFoundException;

class Season
{
    private int $id;
    private int $tvShowId;
    private string $name;
    private int $seasonNumber;
    private ?int $posterId;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getTvShowId(): int
    {
        return $this->tvShowId;
    }

    public function setTvShowId(int $tvShowId): void
    {
        $this->tvShowId = $tvShowId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getSeasonNumber(): int
    {
        return $this->seasonNumber;
    }

    public function setSeasonNumber(int $seasonNumber): void
    {
        $this->seasonNumber = $seasonNumber;
    }

    public function getPosterId(): ?int
    {
        return $this->posterId;
    }

    public function setPosterId(?int $posterId = null): void
    {
        $this->posterId = $posterId;
    }

    /** Return episode of season.
     *
     * @return array
     */
    public function getEpisode(): array
    {
        return Collection\EpisodeCollection::findBySeasonId($this->getId());
    }

    /** Season by id Finder. Returns the Season links to the id which is given in settings
     * @param int $id
     * @return Season
     */
    public static function findById(int $id): Season // EntityNotFoundException
    {
        $req = MyPdo::getInstance()->prepare(
            <<<'SQL'
    SELECT *
    FROM season
    WHERE id = :seaonId
SQL
        );
        $req->execute([':seaonId' => $id]);

        $res = $req->fetchObject(Season::class);

        if ($res === false) {
            throw new EntityNotFoundException("findById : $id doesn't exist ");
        }
        return $res;
    }

}
