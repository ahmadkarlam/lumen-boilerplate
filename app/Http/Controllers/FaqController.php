<?php

namespace App\Http\Controllers;

use App\Repositories\Faq\FaqRepository;
use App\Services\Faq\FaqService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $faqs = $this->faqService->all();

        return response()->json([
            'message' => 'success retrieve faq',
            'data' => $faqs
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'answer' => 'required',
            'question' => 'required',
        ]);

        $faq = $this->faqService->create($request->toArray());

        return response()->json([
            'message' => 'success create new faq',
            'data' => $faq,
        ]);
    }
}
