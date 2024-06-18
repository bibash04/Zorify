<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index',compact('products'));


    }


    public function create()
    {
        $categories = Category::orderBy('priority')->get();
        return view('products.create',compact('categories'));

    }

    public function store(Request $request)
    {
       $data = $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|integer',
        'stock' => 'required|integer',
        'category_id' => 'required',
        'photopath' => 'required|image',
       ]);

       $photoname = time().'.'.$request->photopath->extension();
       $request->photopath->move(public_path('images/products'), $photoname);
       $data['photopath'] = $photoname;
       Product::create($data);
       return redirect()->route('products.index')->with('success','Product created successfully.');

    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit');

    }
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'description' => 'required',
            ]);
            $Product = Product::find($id);
            $Product->update($data);
            return redirect()->route('products.index')->with('success','product updated successfully.');

    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete($id);
        return redirect()->route('products.index')->with('success','Product deleted successfully');


    }
}
