<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use \App\Models\CategoryTopp;

class CategoryTop extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoryTop = CategoryTopp::all();
        return view('admin.CategoryTop.index', compact('categoryTop'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.CategoryTop.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $this->validated($request);

        CategoryTopp::create($validatedData);

        return redirect()->route('admin.CategoryTop.index')->with('success', 'Kategoriya muvaffaqiyatli yaratildi!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = CategoryTopp::findOrFail($id);
        return view("admin.CategoryTop.show",compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = CategoryTopp::findOrFail($id); // Bitta kategoriya olish uchun shunday bo‘lishi kerak
        return view('admin.CategoryTop.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $this->validated($request);

        $category = CategoryTopp::findOrFail($id);
        $category->update($validatedData);

        return redirect()->route('admin.CategoryTop.index')->with('success', 'Kategoriya havolasi yangilandi.');
    }

    protected function validated(Request $request): array
    {
        return $request->validate([
            'name_uz' => ['required', 'string', 'max:255'],
            'name_ru' => ['required', 'string', 'max:255'],
            'url' => [
                'required',
                'string',
                'max:255',
                function (string $attribute, string $value, \Closure $fail): void {
                    $value = trim((string) $value);

                    $scheme = parse_url($value, PHP_URL_SCHEME);
                    $isHttpUrl = in_array(strtolower((string) $scheme), ['http', 'https'], true)
                        && filter_var($value, FILTER_VALIDATE_URL) !== false;

                    $isInternalPath = $value !== ''
                        && !str_contains($value, ' ')
                        && !str_contains($value, "\n")
                        && !str_contains($value, "\r")
                        && !str_contains($value, "\t")
                        && !str_contains(strtolower($value), 'javascript:')
                        && !str_starts_with(strtolower($value), 'data:');

                    if (!$isHttpUrl && !$isInternalPath) {
                        $fail('URL https:// manzil yoki sayt ichidagi yo‘l bo‘lishi kerak.');
                    }
                },
            ],
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories = CategoryTopp::findOrFail($id);
        $categories->delete();
        return redirect()->route('admin.CategoryTop.index')->with('success', 'Successfully deleted!');
    }
}
