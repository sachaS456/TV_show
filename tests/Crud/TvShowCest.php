<?php

namespace Crud;

use Entity\TVshow;
use Entity\Exception\EntityNotFoundException;
use Tests\CrudTester;

class TvShowCest
{
    public function findById(CrudTester $I)
    {
        $tvShow = TVshow::findById(3);
        $I->assertSame(3, $tvShow->getId());
        $I->assertSame('Friends', $tvShow->getName());
        $I->assertSame('Friends', $tvShow->getOriginalName());
        $I->assertSame('https://www.netflix.com/title/70153404', $tvShow->getHomepage());
        $I->assertSame('Les péripéties de 6 jeunes newyorkais liés par une profonde amitié. Entre amour, travail, famille, ils partagent leurs bonheurs et leurs soucis au Central Perk, leur café favori...', $tvShow->getOverview());
        $I->assertSame(15, $tvShow->getPosterId());
    }

    public function findByIdThrowsExceptionIfArtistDoesNotExist(CrudTester $I)
    {
        $I->expectThrowable(EntityNotFoundException::class, function () {
            TVshow::findById(PHP_INT_MAX);
        });
    }

    public function delete(CrudTester $I): void
    {
        $artist = TVshow::findById(3);
        $artist->delete();
        $I->cantSeeInDatabase('tvshow', ['id' => 3]);
        $I->cantSeeInDatabase('tvshow', ['name' => 'Friends']);
        $I->assertNull($artist->getId());
        $I->assertSame('Friends', $artist->getName());
    }
}
