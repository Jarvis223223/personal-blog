<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\LikesDislike;
use App\Models\Post;
use App\Models\Project;
use App\Models\Skill;
use App\Models\StudentCount;
use Illuminate\Http\Request;
use Auth;

class UiController extends Controller
{
    public function index() {
      $skills = Skill::paginate(10);
      $projects = Project::all();
      $studentCount = StudentCount::find(1);
      $posts = Post::latest()->take(6)->get(); // take latest 

      return view("ui-panel.index", compact('skills', 'projects', 'studentCount', 'posts'));
    }

    public function postIndex() {
      $categories = Category::all();
      $posts = Post::latest()->paginate(5);
      return view('ui-panel.posts', compact('categories', 'posts'));
    }

    public function postDetailsIndex($id) {
      if (!Auth::check()) {
        return redirect()->route('login');
      }
      $post = Post::find($id);
      $likes = LikesDislike::where('post_id', '=', $id)->where('type', '=', 'like')->get();
      $disLikes = LikesDislike::where('post_id', '=', $id)->where('type', '=', 'dislike')->get();

      $comments = Comment::where('post_id', $id)->where('status', 'show')->get();

      $likeStatus = LikesDislike::where('post_id', $id)->where('user_id', Auth::user()->id)->first();
      
      return view('ui-panel.post-details', compact('post', 'likes', 'disLikes', 'likeStatus', 'comments'));
    }

    public function search(Request $request) {
      $categories = Category::all();
      $searchData = $request->search_data;
      // $searchData = '%'.$request->search_data.'%';
      
      $posts = Post::where('title', 'like', '%'. $searchData . '%')
      ->orWhere('content', 'like', '%' . $searchData . '%')
      
      ->orWhereHas('category', function($category) use($searchData) {
        $category->where('name', 'like', '%' . $searchData . '%');
      })->paginate(5);

      return view('ui-panel.posts', compact('categories', 'posts'));
    }

    public function searchByCategory($catId) {
      $categories = Category::all();

      $posts = Post::where('category_id', $catId)->paginate(5);
      return view('ui-panel.posts', compact('categories', 'posts'));
    }
}