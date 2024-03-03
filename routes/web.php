<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\ProjectController;
use App\Http\Controllers\admin\SkillController;
use App\Http\Controllers\admin\StudentCountController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeDislikeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UiController;
use App\Http\Controllers\admin\AdminDashboarkController;

// UI
Route::get('/', [UiController::class, "index"]);
Route::get('/posts', [UiController::class, "postIndex"]);
Route::get('/posts/{id}/details', [UiController::class, "postDetailsIndex"]);
Route::get('search_posts', [UiController::class, "search"]);
Route::get('search_posts_by_category/{catId}', [UiController::class, "searchByCategory"]);

// Like && DisLike
Route::post('posts/like/{postId}', [LikeDislikeController::class, 'like']);
Route::post('posts/dislike/{postId}', [LikeDislikeController::class, 'dislike']);

// Comments
Route::post('posts/comments/{postId}', [CommentController::class, "comment"]);

// Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAdmin']], function () {
  Route::get('/dashboard', [AdminDashboarkController::class, "index"]);  

  // User
  Route::get('/users', [UserController::class, 'index']);
  Route::get('/users/{id}/edit', [UserController::class, 'edit']);
  Route::post('/users/{id}/update', [UserController::class, 'update']);
  Route::post('/users/{id}/delete', [UserController::class, 'delete']);

  // Skill
  Route::resource('skills', SkillController::class);

  // Project
  Route::resource('projects', ProjectController::class);

  // Student Count
  Route::get('student_counts', [ StudentCountController::class, 'index'])->name('student_counts.index');
  Route::post('student_counts/store', [ StudentCountController::class, 'store']);
  Route::post('student_counts/{id}/update', [ StudentCountController::class, 'update']);

  // Category
  Route::resource('categories', CategoryController::class);

  // Post
  Route::resource('posts', PostController::class);

  Route::post('comment/{id}/show_hide', [PostController::class, 'showHide']);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');