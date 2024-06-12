<?php
declare(strict_types=1);

namespace Tests\Browse;

use Codeception\Example;
use Tests\BrowseTester;

class TVshowCest
{
    public function checkAppWebPageHtmlStructure(BrowseTester $I)
    {
        $I->amOnPage('/season.php?TVshowId=3');
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
}