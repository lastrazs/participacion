<?php

use App\Http\Controllers\SurveyController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\PasswordGeneratorController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/generate-password', function () {
    return view('password.generate-password');
});

Route::post('/generate-password',[PasswordGeneratorController::class, 'generatePassword'])->name('generate-password');
/*
QUESTIONARIO
*/
Route::get('/surveys', [SurveyController::class, 'index'])->name('surveys.index');
Route::get('/surveys/create', [SurveyController::class, 'create'])->name('surveys.create');
Route::post('/surveys', [SurveyController::class, 'store'])->name('surveys.store');
Route::get('/surveys/{survey}', [SurveyController::class, 'show'])->name('surveys.show');

Route::get('/surveys/{survey}/questions/create', [QuestionController::class, 'create'])->name('questions.create');
Route::post('/surveys/{survey}/questions', [QuestionController::class, 'store'])->name('questions.store');

Route::post('/surveys/{survey}/responses', [ResponseController::class, 'store'])->name('responses.store');
/*RESERVACIONES Y CALENDARIO */
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/events', [EventController::class, 'store'])->name('events.store');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');

Route::post('/events/{event}/reservations', [ReservationController::class, 'store'])->name('reservations.store');
