<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index(User $user)
    {
        if (!$user) {
            return redirect()->route('dashboard')->with('error', 'User not found');
        }

        $quizzes = $user->quizzes;

        return view('quizzes.index', compact('quizzes', 'user'));
    }

    public function show(User $user, Quiz $quiz)
    {
        $questions = $quiz->questions;
        return view('quizzes.show', compact('user', 'questions'));
    }

    public function submit(Quiz $quiz)
    {
        dd('Route hit');
        return view('quizzes.show', compact('user', 'questions'));
    }
}
