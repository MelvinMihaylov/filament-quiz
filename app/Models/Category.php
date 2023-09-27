<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['category_name'];

    // Get all questions for a specific category (category_id = 1)
    // $category = Category::find(1); $questions = $category->questions;
    public function questions(): hasMany
    {
        return $this->hasMany(Question::class);
    }
}
