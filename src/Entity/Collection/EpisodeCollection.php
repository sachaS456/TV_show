<?php

declare(strict_types=1);

namespace Entity\Collection;

use Database\MyPdo;
use Entity\Episode;
use PDO;

class EpisodeCollection
{
    /** Find episodes from a season (using seasonId).
     *
     * @param int $seasonId
     * @return array: Episode[]
     */
    public static function findBySeasonId(int $seasonId): array
    {
        $req = MyPdo::getInstance()->prepare(
            <<<'SQL'
    SELECT *
    FROM episode
    WHERE seasonid = :seasonId
    ORDER BY episodeNumber;
SQL
        );
        $req->execute([':seasonId' => $seasonId]);
        return $req->fetchAll(PDO::FETCH_CLASS, Episode::class);
    }
}
