<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = ['answer_text', 'is_correct'];

    public function question(): BelongsTo
    {
        return $this->belongsTo(Answer::class);
    }
}
