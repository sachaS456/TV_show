<?php

namespace Tests\Crud\Collection;

use Tests\CrudTester;
use Entity\Season;
use Entity\Collection\SeasonCollection;

class SeasonCollectionCest
{
    public function findByTvshowId(CrudTester $I)
    {
        $expectedShowTvs = [
            ['id' => 13, 'name' => 'Épisodes spéciaux', 'tvShowId' => 25, 'seasonNumber' => 2147483647, 'posterId' => 16],
            ['id' => 14, 'name' => 'Saison 1', 'tvShowId' => 25, 'seasonNumber' => 1, 'posterId' => 17],
            ['id' => 15, 'name' => 'Saison 2', 'tvShowId' => 25, 'seasonNumber' => 2, 'posterId' => 18],
            ['id' => 16, 'name' => 'Saison 3', 'tvShowId' => 25, 'seasonNumber' => 3, 'posterId' => 19],
            ['id' => 17, 'name' => 'Saison 4', 'tvShowId' => 25, 'seasonNumber' => 4, 'posterId' => 20],
            ['id' => 18, 'name' => 'Saison 5', 'tvShowId' => 25, 'seasonNumber' => 5, 'posterId' => 21],
            ['id' => 19, 'name' => 'Saison 6', 'tvShowId' => 25, 'seasonNumber' => 6, 'posterId' => 22],
            ['id' => 20, 'name' => 'Saison 7', 'tvShowId' => 25, 'seasonNumber' => 7, 'posterId' => 23],
            ['id' => 21, 'name' => 'Saison 8', 'tvShowId' => 25, 'seasonNumber' => 8, 'posterId' => 24],
            ['id' => 22, 'name' => 'Saison 9', 'tvShowId' => 25, 'seasonNumber' => 9, 'posterId' => 25],
            ['id' => 23, 'name' => 'Saison 10', 'tvShowId' => 25, 'seasonNumber' => 10, 'posterId' => 26],
            ['id' => 208, 'name' => 'Épisodes spéciaux', 'tvShowId' => 25, 'seasonNumber' => 2147483647, 'posterId' => 232],
            ['id' => 209, 'name' => 'Saison 1', 'tvShowId' => 25, 'seasonNumber' => 1, 'posterId' => 233],
            ['id' => 210, 'name' => 'Saison 2', 'tvShowId' => 25, 'seasonNumber' => 2, 'posterId' => 234],
            ['id' => 211, 'name' => 'Saison 3', 'tvShowId' => 25, 'seasonNumber' => 3, 'posterId' => 235],
            ['id' => 212, 'name' => 'Saison 4', 'tvShowId' => 25, 'seasonNumber' => 4, 'posterId' => 236],
            ['id' => 213, 'name' => 'Saison 5', 'tvShowId' => 25, 'seasonNumber' => 5, 'posterId' => 237],
            ['id' => 214, 'name' => 'Saison 6', 'tvShowId' => 25, 'seasonNumber' => 6, 'posterId' => 238],
            ['id' => 215, 'name' => 'Saison 7', 'tvShowId' => 25, 'seasonNumber' => 7, 'posterId' => 239],
            ['id' => 334, 'name' => 'Épisodes spéciaux', 'tvShowId' => 25, 'seasonNumber' => 2147483647, 'posterId' => null],
            ['id' => 335, 'name' => 'Saison 1', 'tvShowId' => 25, 'seasonNumber' => 1, 'posterId' => 371],
            ['id' => 336, 'name' => 'Saison 2', 'tvShowId' => 25, 'seasonNumber' => 2, 'posterId' => 372],
            ['id' => 418, 'name' => 'Saison 1', 'tvShowId' => 25, 'seasonNumber' => 1, 'posterId' => 467],
            ['id' => 419, 'name' => 'Saison 2', 'tvShowId' => 25, 'seasonNumber' => 2, 'posterId' => 468],
            ['id' => 476, 'name' => 'Saison 1', 'tvShowId' => 25, 'seasonNumber' => 1, 'posterId' => 537],
        ];

        $seasons = SeasonCollection::findByTVshowId(25);
        $I->assertCount(count($expectedShowTvs), $seasons);
        $I->assertContainsOnlyInstancesOf(Season::class, $seasons);
        foreach ($seasons as $index => $season) {
            $expectedShowTv = $expectedShowTvs[$index];
            $I->assertEquals($expectedShowTv['id'], $season->getId());
            $I->assertEquals($expectedShowTv['name'], $season->getName());
            $I->assertEquals($expectedShowTv['tvShowId'], $season->getTvShowId());
            $I->assertEquals($expectedShowTv['seasonNumber'], $season->getSeasonNumber());
            $I->assertEquals($expectedShowTv['posterId'], $season->getPosterId());
        }
    }
}
