<?php

namespace Browse;

use Codeception\Example;
use Tests\BrowseTester;

class PosterCest
{
    public function loadPosterWithoutParameter(BrowseTester $I)
    {
        $I->amOnPage('/poster.php');
        $I->seeInCurrentUrl('/img/default.png');
    }


    public function loadPosterWithWrongParameter(BrowseTester $I)
    {
        $I->amOnPage('/poster.php?posterId=324923949243932');
        $I->seeInCurrentUrl('/img/default.png');
    }

    protected function wrongParameterProvider(): array
    {
        return [
            ['id' => '', 'response' => 400],
            ['id' => 'bad_id_value', 'response' => 400],
            ['id' => (string) PHP_INT_MAX, 'response' => 404],
        ];
    }

    public function loadPosterWithCorrectParameter(BrowseTester $I)
    {
        $I->amOnPage('/poster.php?posterId=15');
        $I->seeResponseCodeIs(200);
        $I->haveHttpHeader('Content-Type', 'image/jpeg');
    }
}
