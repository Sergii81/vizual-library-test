<?php

namespace App\Rules;

use App\Models\Book;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class BookPublisherRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $userId = auth('sanctum')->user()->getAuthIdentifier();
        $task = Book::query()->where('id', '=', $value)->first();
        if($task->user_id != $userId) {
            $fail('Wrong publisher');
        }
    }
}
