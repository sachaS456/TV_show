<?php
declare(strict_types=1);

namespace Entity;

use Database\MyPdo;
use Entity\Exception\EntityNotFoundException;

class Poster
{
    private int $id;
    private string $jpeg;

    public function getId(): int
    {
        return $this->id;
    }

    public function getJpeg(): string
    {
        return $this->jpeg;
    }

    /** Find Poster by id.
     *
     * @param int $id: poster id
     * @return Poster: poster
     */
    public static function findById(int $id): Poster // EntityNotFoundException
    {
        $requete = MyPdo::getInstance()->prepare(<<<'SQL'
SELECT id, jpeg
FROM poster
WHERE id = :Posterid;
SQL);

        $requete->execute([':Posterid' => $id]);

        $res = $requete->fetchObject(Poster::class);

        if ($res === false) {
            throw new EntityNotFoundException("findById : $id doesn't exist ");
        }
        return $res;
    }
}