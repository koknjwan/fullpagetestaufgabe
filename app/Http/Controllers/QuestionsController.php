<?php

namespace App\Http\Controllers;

use App\Models\Questions;

class QuestionsController extends Controller
{
  public function index()
  {
    $questions = Questions::all();
    return view("welcome", ['questions' => $questions]);
  }
}
