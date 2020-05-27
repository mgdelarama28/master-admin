<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('admin.pages.categories.index', [
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        return view('admin.pages.categories.create');
    }

    public function show($id)
    {
        $category = Category::find($id);

        return view('admin.pages.categories.show', [
            'category' => $category,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->except(['_token', 'image_path',]);

        $data['image_path'] = $request->image_path->store('products', 'public');

        Category::create($data);

        return redirect()->route('admin.categories.index')->with('status', 'Category has been created!');
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('admin.pages.categories.edit', [
            'category' => $category,
        ]);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $data = $request->except(['_token']);

        if ($request->hasFile('image_path')):
            $data['image_path'] = $request->image_path->store('products', 'public');
        endif;

        $category->update($data);

        return redirect()->route('admin.categories.index')->with('status', 'Category has been updated!');
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        $category->delete();
        return redirect()->route('admin.categories.index')->with('status', 'Category has been deleted!');
    }
}
