<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['question_text', 'category_id'];

    // Get the category of a specific question (question_id = 1)
    // $question = Question::find(1);
    // $category = $question->category;
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // Get all answers for a specific question (question_id = 1)
    // $question = Question::find(1);
    // $answers = $question->answers;

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }

    public function quizzes(): BelongsToMany
    {
        return $this->belongsToMany(Quiz::class)->withPivot('id')->withTimestamps();
    }
}
