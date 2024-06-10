<?php
declare(strict_types=1);

namespace Entity\Collection;

use Database\MyPdo;
use Entity\Episode;
use PDO;

class EpisodeCollection
{

    /** Find episode by seasonId.
     *
     * @param int $seasonId
     * @return array: Episode[]
     */
    public static function findBySeasonId(int $seasonId) : array
    {
        $req = MyPdo::getInstance()->prepare(
            <<<'SQL'
    SELECT *
    FROM season
    WHERE seasonId = :seasonId
    ORDER BY name;
SQL
        );
        $req->execute([':tvshowid' => $seasonId]);
        return $req->fetchAll(PDO::FETCH_CLASS, Episode::class);
    }
}