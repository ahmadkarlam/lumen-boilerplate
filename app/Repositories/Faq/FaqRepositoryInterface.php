<?php


namespace App\Repositories\Faq;

use Illuminate\Database\Eloquent\Collection;

interface FaqRepositoryInterface
{
    public function all(): Collection;
}
