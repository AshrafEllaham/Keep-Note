<?php

use KeepNote\http\Route;
use App\Controllers\HomeController;
use App\Controllers\NoteController;
use App\Controllers\LoginController;
use App\Controllers\TrashController;
use App\Controllers\SignupController;
use App\Controllers\ArchiveController;
use App\Controllers\ProfileController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/home/search', [HomeController::class, 'search']);

Route::get('/note', [NoteController::class, 'index']);
Route::post('/note', [NoteController::class, 'update']);
Route::post('/note/add', [NoteController::class, 'add']);
Route::post('/note/trash', [NoteController::class, 'trash']);
Route::post('/note/archive', [NoteController::class, 'archive']);

Route::get('/trash', [TrashController::class, 'index']);
Route::post('/trash/delete', [TrashController::class, 'delete']);
Route::post('/trash/restore', [TrashController::class, 'restore']);

Route::get('/archive', [ArchiveController::class, 'index']);
Route::post('/archive/unarchive', [ArchiveController::class, 'unarchive']);
Route::post('/archive/trash', [ArchiveController::class, 'trash']);

Route::get('/login', [LoginController::class, 'index']);
Route::get('/login/logout', [LoginController::class, 'logout']);
Route::post('/login/login', [LoginController::class, 'login']);
Route::get('/signup', [SignupController::class, 'index']);
Route::post('/signup/signup', [SignupController::class, 'signup']);

Route::get('/profile', [ProfileController::class, 'index']);
Route::get('/profile/reset', [ProfileController::class, 'reset']);
Route::post('/profile/save', [ProfileController::class, 'save']);
