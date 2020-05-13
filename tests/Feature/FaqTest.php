<?php

namespace Tests\Feature;

use App\Models\Faq;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Tests\TestCase;

class FaqTest extends TestCase
{
    use DatabaseMigrations;

    public function testGetFaqs()
    {
        $faq = factory(Faq::class, 2)->create();
        $response = $this->get('/faq');

        $response->assertResponseOk();
        $response->seeJson([
            'message' => 'success retrieve faq',
            'data' => $faq->toArray(),
        ]);
    }

    public function testCreateNewFaq()
    {
        $response = $this->json('POST', '/faq', ['answer' => 'foo', 'question' => 'bar']);

        $response->assertResponseOk();
        $response->seeJson([
            'message' => 'success create new faq',
            'answer' => 'foo',
        ]);
    }

    public function testValidationCreateNewFaq()
    {
        $response = $this->json('POST', '/faq', ['answer' => 'foo']);

        $response->assertResponseStatus(422);
        $response->seeJson([
            'message' => 'validation error',
            'question' => [
                'The question field is required.'
            ]
        ]);
    }
}
