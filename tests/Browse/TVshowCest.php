<?php

declare(strict_types=1);

namespace Tests\Browse;

use Codeception\Example;
use Tests\BrowseTester;

class TVshowCest
{
    public function checkAppWebPageHtmlStructure(BrowseTester $I)
    {
        $I->amOnPage('/season.php?TVshowId=57');
        $I->seeResponseCodeIs(200);
        $I->seeElement('.header');
        $I->seeElement('.header h1');
        $I->seeElement('.content');
        $I->seeElement('.footer');
    }

    public function loadTvshowPageWithoutParameter(BrowseTester $I)
    {
        $I->stopFollowingRedirects();
        $I->amOnPage('/season.php');
        $I->seeResponseCodeIsRedirection();
        $I->followRedirect();
        $I->seeInCurrentUrl('/index.php');
    }

    public function loadSeasonPageWithWrongParameter(BrowseTester $I)
    {
        $I->stopFollowingRedirects();
        $I->amOnPage('/season.php?TVshowId=iergveiyvhbieyrbvgy');
        $I->seeResponseCodeIs(302);
        $I->followRedirect();
        $I->seeInCurrentUrl('/index.php');
    }

    protected function wrongParameterProvider(): array
    {
        return [
            ['id' => ''],
            ['id' => 'bad_id_value'],
        ];
    }

    public function loadSeasonPageWithUnknownTvshowid(BrowseTester $I)
    {
        $I->amOnPage('/season.php?TVshowId=100000000000000000');
        $I->seeResponseCodeIs(404);
    }

    public function loadSeasonWithCorrectParameter(BrowseTester $I)
    {
        $I->amOnPage('/season.php?TVshowId=57');
        $I->seeResponseCodeIs(200);
        $I->seeInTitle('Good Omens', '.header h1');
        $I->see('Good Omens', '.header h1');
        $I->assertEquals([
            'Saison 1',
            'Saison 2'
        ], $I->grabMultiple('.content .list .season .season__title'));
    }
}
