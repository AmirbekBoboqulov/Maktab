<?php

namespace App\Http\Controllers;

use App\Models\ParentInfo;
use Illuminate\Http\Request;

class ParentInfoController extends Controller
{
    public function index()
    {
        $parentInfos = ParentInfo::latest()->get();

        return view('admin.parentInfo.index', compact('parentInfos'));
    }

    public function create()
    {
        return view('admin.parentInfo.create');
    }

    public function store(Request $request)
    {
        ParentInfo::create($this->validated($request));

        return redirect()->route('admin.parentInfo.index')->with('success', 'Ota-onalar maʼlumoti qoʻshildi!');
    }

    public function show(ParentInfo $parentInfo)
    {
        return view('admin.parentInfo.show', compact('parentInfo'));
    }

    public function edit(ParentInfo $parentInfo)
    {
        return view('admin.parentInfo.edit', compact('parentInfo'));
    }

    public function update(Request $request, ParentInfo $parentInfo)
    {
        $parentInfo->update($this->validated($request));

        return redirect()->route('admin.parentInfo.index')->with('success', 'Ota-onalar maʼlumoti yangilandi!');
    }

    public function destroy(ParentInfo $parentInfo)
    {
        $parentInfo->delete();

        return redirect()->route('admin.parentInfo.index')->with('success', 'Ota-onalar maʼlumoti oʻchirildi!');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title_uz' => ['required', 'string', 'max:255'],
            'title_ru' => ['required', 'string', 'max:255'],
            'body_uz' => ['required', 'string'],
            'body_ru' => ['required', 'string'],
        ]);
    }
}
