<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string answer
 * @property string question
 */
class Faq extends Model
{
    protected $fillable = [
        'question',
        'answer'
    ];
}
