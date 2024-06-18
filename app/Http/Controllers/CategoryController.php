<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('priority')->get();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'priority' => 'required|integer',
        ]);
        Category::create($data);
        return redirect()->route('categories.index')->with('success','Category created successfully.');
    }
    public function edit($id)
    {
        $category = Category::find($id);
        return view('categories.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'priority' => 'required|integer',
            ]);
            $Category = Category::find($id);
            $Category->update($data);
            return redirect()->route('categories.index')->with('success','Category updated successfully.');
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete($id);
        return redirect()->route('categories.index')->with('success','Category deleted successfully');

    }

}


