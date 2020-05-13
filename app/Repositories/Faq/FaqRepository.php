<?php

namespace App\Repositories\Faq;

use App\Models\Faq;
use Illuminate\Database\Eloquent\Collection;

class FaqRepository implements FaqRepositoryInterface
{
    public function all(): Collection
    {
        return Faq::all();
    }
}
