<?php

namespace Tests\Unit\Services;

use App\Models\Faq;
use App\Repositories\Faq\FaqRepositoryInterface;
use App\Services\Faq\FaqService;
use Mockery;
use Tests\TestCase;

class FaqServiceTest extends TestCase
{
    protected function tearDown(): void
    {
        Mockery::close();
    }

    public function testAll()
    {
        $expectedFaq = factory(Faq::class, 1)->make();
        $repository = Mockery::mock(FaqRepositoryInterface::class);
        $repository->expects('all')->andReturn($expectedFaq);

        $service = new FaqService($repository);
        $faqs = $service->all();
        $this->assertEquals($expectedFaq, $faqs);
    }
}
