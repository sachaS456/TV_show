<?php

namespace Browse;
use Codeception\Example;
use Tests\BrowseTester;
class PosterCest
{
    public function loadCoverWithoutParameter(BrowseTester $I)
    {
        $I->amOnPage('/poster.php');
        $I->seeInCurrentUrl('/img/default.png');
    }


    public function loadCoverWithWrongParameter(BrowseTester $I)
    {
        $I->amOnPage('/poster.php?posterId=324923949243932');
        $I->seeInCurrentUrl('/img/default.png');
    }
}