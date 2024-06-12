<?php

namespace Crud;

use Entity\Poster;
use Entity\Exception\EntityNotFoundException;
use Tests\CrudTester;

class PosterCest
{
    public function findById(CrudTester $I)
    {
        $poster = Poster::findById(15);
        $I->assertSame(15, $poster->getId());
        $I->assertSame(file_get_contents(codecept_data_dir().'poster/poster15.jpeg'), $poster->getJpeg());
    }

    public function findByIdThrowsExceptionIfPosterDoesNotExist(CrudTester $I)
    {
        $I->expectThrowable(EntityNotFoundException::class, function () {
            Poster::findById(PHP_INT_MAX);
        });
    }
}
