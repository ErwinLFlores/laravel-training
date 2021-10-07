<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\TopicController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/topic-form', [TopicController::class, 'topicForm'])->name('topic.topicform');

Route::get('/topic-all/{name?}', [TopicController::class, 'index'])->name('topic.index');
Route::get('/topic-list', [TopicController::class, 'topicList'])->name('topic.topiclist');

Route::get('/topic-update/{id}', [TopicController::class, 'topicGetId'])->name('topic.topicupdate');

Route::post('/save', [TopicController::class, 'save'])->name('topic.save');
Route::post('/update/{id}', [TopicController::class, 'update'])->name('topic.update');
Route::get('/delete/{id}', [TopicController::class, 'delete'])->name('topic.delete');


/* ACTIVITY */
Route::get('/home', [TopicController::class, 'home'])->name('topic.home');
Route::get('/about', [TopicController::class, 'about'])->name('topic.about');

/* COMMENT */
Route::get('/comment/{topic_id}', [CommentController::class, 'comment'])->name('comment.commentform');
Route::post('/comment/save/{topic_id}', [CommentController::class, 'save'])->name('comment.save');

Route::get('/comment/update-form/{id}', [CommentController::class, 'updateForm'])->name('comment.updateform');

Route::post('/comment/update/{id}', [CommentController::class, 'update'])->name('comment.update');
Route::get('/comment/delete/{id}', [CommentController::class, 'delete'])->name('comment.delete');
