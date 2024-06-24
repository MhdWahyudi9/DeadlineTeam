<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // public function ....(Request $request)
    // {

    // }

    public function index()
    {
        $categories = Category::all();
        return view('Category.category', ['categories' => $categories]);
    }

    public function add()
    {
        return view('Category.category-add');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|unique:categories|max:100',
        ]);

        $category = Category::create($request->all());
        return redirect('categories')->with('status', 'Category Berhasil di Tambahkan');
    }

    public function edit($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('Category.category-edit', ['category' => $category]);
    }

    public function update(Request $request, $slug)
    {
        $validate = $request->validate([
            'name' => 'required|unique:categories|max:100',
        ]);

        $category = Category::where('slug', $slug)->first();
        $category->slug = null;
        $category->update($request->all());
        return redirect('categories')->with('status', 'Update Categories Berhasil');
    }

    public function delete($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('Category.category-delete', ['category' => $category]);
        // $category = Category::where('slug', $slug)->first();
        // $category->delete();
        // return redirect('categories')->with('status', 'delete Categories Berhasil');
    }


    public function destroy($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $category->delete();
        return redirect('categories')->with('status', 'delete Categories Berhasil');
    }

    public function deletedCategory()
    {
        $deletedCategories = Category::onlyTrashed()->get();
        return view('Category.category-deleted-list', ['deletedCategories' => $deletedCategories]);
    }

    public function restore($slug)
    {
        $category = Category::withTrashed()->where('slug', $slug)->first();
        $category->restore();
        return redirect('categories')->with('status', 'category restored successfully');
    }

}
