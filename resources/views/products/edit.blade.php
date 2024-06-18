@extends('layouts.app')
@section('content')


<h2 class="font-bold text-3xl text-amber-500">Edit Products</h2>
<hr class="h-1 bg-amber-600">
<div class="mt-10">
   <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-5">
        <select name="category_id" id="" class="w-full p-3 border border-gray-300 rounded-lg">

                <option value="">category 1</option>
                <option value="">category 2</option>
                <option value="">category 3</option>

        </select>
    </div>
    <div class="mb-5">
        <input type="text" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Product Name" name="name">
        @error('name')
        <div class="text-red-500 mt-2 text-sm">{{$message}}</div>
        @enderror
    </div>
    <div class="mb-5">
        <textarea name="description" id="" cols="30" rows="5" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Product Description"></textarea>
        @error('description')
        <div class="text-red-500 mt-2 text-sm">{{$message}}</div>
        @enderror
    </div>
    <div class="mb-5">
        <input type="text" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Price" name="price">
        @error('price')
        <div class="text-red-500 mt-2 text-sm">{{$message}}</div>
        @enderror
    </div>
    <div class="mb-5">
        <input type="text" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Stock" name="stock">
        @error('stock')
        <div class="text-red-500 mt-2 text-sm">{{$message}}</div>
        @enderror
    </div>
    <div class="mb-5">
        <input type="file" class="w-full p-3 border border-gray-300 rounded-lg" name="photopath">

    </div>
     <div class="flex justify-center gap-5">
            <button class="bg-blue-500 text-white py-3 px-10 rounded-lg">Update Product</button>
            <a href="{{route('products.create')}}" class="bg-red-500 text-white py-3 px-7 rounded-lg">Cancel</a>
        </div>
   </form>
</div>


@endsection
