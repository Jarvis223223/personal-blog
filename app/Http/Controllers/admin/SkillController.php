<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::paginate(5);
        return view('admin-panel.skills.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-panel.skills.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "percent" => "required | max:100",
        ]);
        Skill::create([
            "name" => $request->name,
            "percent" => $request->percent,
        ]);
        return redirect('admin/skills')->with("successMsg", "You have successful created");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $skill = Skill::find($id);
        return view('admin-panel.skills.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => "required",
            "percent" => "required | max:100",
        ]);

        $skill = Skill::find($id);
        $skill->update([
            "name" => $request->name,
            "percent" => $request->percent,
        ]);
        return redirect('admin/skills')->with('successMsg', 'You have successful updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $skill = Skill::find($id);
        $skill->delete();
        return back()->with('successMsg', 'You have successful deleted');
    }
}