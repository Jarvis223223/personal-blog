<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\StudentCount;
use Illuminate\Http\Request;

class StudentCountController extends Controller
{
    public function index()  {
      $studentCounts = StudentCount::all();
      $studentCount = StudentCount::find(1);
      return view('admin-panel.student-count.index', compact('studentCounts', 'studentCount'));
    }

    public function store(Request $request) {
      $request->validate([
        'count' => 'required'
      ]);
      
      StudentCount::create([
        'count' => $request->count,
      ]);
      return back();
    }

    public function update(Request $request, $id) {
      $student = StudentCount::find($id);
      $request->validate([
        'count' => 'required'
      ]);
      $student->update([
        'count' => $student->count + $request->count,
      ]);
      return back();
    }

}