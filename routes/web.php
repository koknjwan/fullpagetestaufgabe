<?php

use App\Http\Controllers\QuestionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [QuestionsController::class, 'index']);