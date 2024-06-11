<?php

namespace Entity;

use Database\MyPdo;
use Entity\Exception\EntityNotFoundException;

class Genre
{
    private int $id;
    private string $name;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * By Id Genre Finder
     *
     * @param int $genreId
     * @return array
     */
    public static function findByGenre(int $genreId): array
    {
        $req = MyPdo::getInstance()->prepare(
            <<<'SQL'
            SELECT T.id, T.name, T.originalName, T.homepage, T.overview, t.posterId
            FROM tvshow T 
                JOIN tvshow_genre TG ON TG.id = T.id
                JOIN GENRE G ON G.id = TG.genreId
            WHERE G.id = :gid
            ORDER BY T.name;
SQL
        );
        $req->execute(['gid' => $genreId]);
        $res = $req->fetchObject(Genre::class);

        if ($res === false) {
            throw new EntityNotFoundException("findById : $genreId doesn't exist ");
        }
        return $res;
    }
}
