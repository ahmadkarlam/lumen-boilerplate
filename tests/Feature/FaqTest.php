<?php

namespace Tests\Feature;

use App\Models\Faq;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Tests\TestCase;

class FaqTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetFaqs()
    {
        $faq = factory(Faq::class, 2)->create();
        $response = $this->get('/');

        $response->assertResponseOk();
        $response->seeJson([
            'message' => 'success retrieve faq',
            'data' => $faq->toArray(),
        ]);
    }
}
