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

    public function update(CrudTester $I)
    {
        $tvShow = TVshow::findById(3);
        $tvShow->setName('Nœud Coulant');
        $tvShow->save();
        $I->canSeeNumRecords(1, 'tvshow', [
            'id' => 3,
            'name' => 'Nœud Coulant'
        ]);
        $I->assertSame(3, $tvShow->getId());
        $I->assertSame('Nœud Coulant', $tvShow->getName());
    }

    public function createWithoutId(CrudTester $I)
    {
        $tvShow = TVshow::create('Nœud Coulant', 'Nœud Coulant', 'www.noeud.com', 'Un noeud cool!', 10);
        $I->assertNull($tvShow->getId());
        $I->assertSame('Nœud Coulant', $tvShow->getName());
        $I->assertSame('Nœud Coulant', $tvShow->getOriginalName());
        $I->assertSame('www.noeud.com', $tvShow->getHomepage());
        $I->assertSame('Un noeud cool!', $tvShow->getOverview());
        $I->assertSame(10, $tvShow->getPosterId());
    }

    public function createWithId(CrudTester $I)
    {
        $tvShow = TVshow::create('Nœud Coulant', 'Nœud Coulant', 'www.noeud.com', 'Un noeud cool!', 10, 5);
        $I->assertSame(5, $tvShow->getId());
        $I->assertSame('Nœud Coulant', $tvShow->getName());
        $I->assertSame('Nœud Coulant', $tvShow->getOriginalName());
        $I->assertSame('www.noeud.com', $tvShow->getHomepage());
        $I->assertSame('Un noeud cool!', $tvShow->getOverview());
        $I->assertSame(10, $tvShow->getPosterId());
    }
    public function insert(CrudTester $I)
    {
        $tvShow = TVshow::create('Nœud Coulant', 'Nœud Coulant', 'www.noeud.com', 'Un noeud cool!', 10000, 100);
        $tvShow->save();
        $I->canSeeNumRecords(0, 'tvshow', [
            'id' => 100,
            'name' => 'Nœud Coulant',
            'originalName' =>'Nœud Coulant',
            'homepage' => 'www.noeud.com',
            'overview' =>'Un noeud cool!',
            'posterId' => 10000
        ]);
        $I->assertSame($tvShow->getId(), 100);
        $I->assertSame('Nœud Coulant', $tvShow->getName());
        $I->assertSame('Nœud Coulant', $tvShow->getOriginalName());
        $I->assertSame('www.noeud.com', $tvShow->getHomepage());
        $I->assertSame('Un noeud cool!', $tvShow->getOverview());
        $I->assertSame(10000, $tvShow->getPosterId());
    }
}
