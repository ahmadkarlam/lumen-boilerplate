<?php

namespace Tests\Unit\Repositories;

use App\Models\Faq;
use App\Repositories\Faq\FaqRepository;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Tests\TestCase;

class FaqRepositoryTest extends TestCase
{
    use DatabaseMigrations;

    public function testGetAllFaq()
    {
        $repository = new FaqRepository();

        $this->assertEquals([], $repository->all()->toArray());

        $faq = factory(Faq::class)->create();
        $faqs = $repository->all();

        $this->assertEquals($faq->toArray(), $faqs[0]->toArray());
        $this->seeInDatabase('faqs', ['answer' => $faqs[0]->answer]);
    }

    public function testCreateFaq()
    {
        $repository = new FaqRepository();
        $data = [
            'answer' => 'foo',
            'question' => 'bar',
        ];
        $faq = $repository->create($data);

        $this->assertEquals('foo', $faq->answer);
        $this->assertEquals('bar', $faq->question);
        $this->seeInDatabase('faqs', $data);
    }
}
