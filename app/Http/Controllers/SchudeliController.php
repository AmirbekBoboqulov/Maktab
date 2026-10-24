<?php

namespace App\Http\Controllers;

use App\Models\empCategory;
use App\Models\Lesson;
use App\Models\Schudeli;
use App\Models\SmenaType;
use Illuminate\Http\Request;

class SchudeliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Smena bilan birga olish (Eager Loading)
        $schudeli = Schudeli::with('smena')->get();

        return view('admin.schudeli.index', compact('schudeli'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $smenatype = Smenatype::all();
        $lessons = Lesson::all();
        return view('admin.schudeli.create',compact('smenatype','lessons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'smena_id' => 'required',
            'lesson_id' => 'required',
            'week_day' => 'required|array',
            'room' =>  'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,pdf',
            'time' => 'required',
        ]);
        // Save selected classes as comma-separated string
        $requestData['week_day'] = implode(',', $request->input('week_day', []));
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('admin/images/'), $imageName);
            $requestData['image'] = $imageName;
        }else {
            $requestData['image'] = 'default.jpg'; // mavjud bo'lgan default rasm nomi
        }
        Schudeli::create($requestData);
        return redirect()->route('admin.schedule.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $schedule = Schudeli::with(['smena', 'lesson'])->findOrFail($id);
        return view('admin.schudeli.show', compact('schedule'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $schedule = Schudeli::findOrFail($id);
        $smenatype = SmenaType::all();
        $lessons = Lesson::all();
        $selectedClasses = $schedule->week_day ? explode(',', $schedule->week_day) : [];

        return view('admin.schudeli.edit', compact('schedule', 'smenatype', 'lessons', 'selectedClasses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $schedule = Schudeli::findOrFail($id);

        $requestData = $request->validate([
            'smena_id' => 'required',
            'lesson_id' => 'required',
            'week_day' => 'required|array',
            'room' =>  'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,pdf',
            'time' => 'required',
        ]);

        $requestData['week_day'] = implode(',', $request->input('week_day', []));

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('admin/images/'), $imageName);
            $requestData['image'] = $imageName;
        }

        $schedule->update($requestData);

        return redirect()->route('admin.schedule.index')->with('success', 'Jadval yangilandi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Schudeli::destroy($id);
        return redirect()->route('admin.schedule.index');
    }
}
