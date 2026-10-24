<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Categorychildren;
use Illuminate\Http\Request;

class ChildrenCategoryController extends Controller
{
    public function index()
    {
        $childrens = Categorychildren::with('category')->get();
        return view('admin.categorychildren.index', compact('childrens'));
    }

    public function create()
    {
        $category = Category::all();
        return view('admin.categorychildren.create', compact('category'));
    }

    public function show(string $id)
    {
        $category = Categorychildren::with('category')->findOrFail($id);
        return view('admin.categorychildren.show', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:categories,id',
            'url' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['name_uz', 'name_ru', 'category_id']);

        if ($request->hasFile('url')) {
            $image = $request->file('url');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/categorychildren'), $imageName);
            $data['url'] = 'uploads/categorychildren/' . $imageName;
        }

        Categorychildren::create($data);

        return redirect()->route('admin.categorychildren.index')
                         ->with('success', 'Category child successfully created!');
    }

    public function edit(string $id)
    {
        $Category = Category::all();
        $category = Categorychildren::findOrFail($id);
        return view('admin.categorychildren.edit', compact('category', 'Category'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'url' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $category = Categorychildren::findOrFail($id);

        $data = $request->only(['name_uz', 'name_ru', 'category_id']);

        if ($request->hasFile('url')) {
            $image = $request->file('url');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/categorychildren'), $imageName);
            $data['url'] = 'uploads/categorychildren/' . $imageName;
        }

        $category->update($data);

        return redirect()->route('admin.categorychildren.index')
                         ->with('success', 'Category child updated successfully!');
    }

    public function destroy(string $id)
    {
        Categorychildren::destroy($id);
        return redirect()->route('admin.categorychildren.index')
                         ->with('success', 'Category child deleted successfully!');
    }
}
