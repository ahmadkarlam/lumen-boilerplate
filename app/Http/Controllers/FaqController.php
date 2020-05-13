<?php

namespace App\Http\Controllers;

use App\Repositories\Faq\FaqRepository;
use App\Services\Faq\FaqService;

class FaqController extends Controller
{
    /**
     * @var FaqService
     */
    protected $faqService;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->faqService = new FaqService(new FaqRepository());
    }

    public function index()
    {
        $faqs = $this->faqService->all();
        return [
            'message' => 'success retrieve faq',
            'data' => $faqs
        ];
    }
}
