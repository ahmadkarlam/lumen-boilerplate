<?php

namespace Tests\Unit\Repositories;

use App\Models\Faq;
use App\Repositories\Faq\FaqRepository;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Tests\TestCase;

class FaqRepositoryTest extends TestCase
{
    use DatabaseMigrations;

    public function testAll()
    {
        $repository = new FaqRepository();

        $this->assertEquals([], $repository->all()->toArray());

        $faq = factory(Faq::class)->create();
        $faqs = $repository->all();

        $this->assertEquals($faq->toArray(), $faqs[0]->toArray());
    }
}
