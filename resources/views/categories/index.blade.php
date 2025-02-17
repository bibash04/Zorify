@extends('layouts.app')
@section('content')


<h2 class="font-bold text-3xl text-amber-500">Categories</h2>
 <hr class="h-1 bg-amber-600">
 <div class="mt-10 text-right">
    <a href="{{route('categories.create')}}" class="bg-amber-600 text-white p-3 rounded-lg">Add Categories</a>
 </div>

 <div class="mt-10">
   <table class="w-full border">
    <thead>
        <tr class="bg-gray-200">
            <th class="border p-3">Order</th>
            <th class="border p-3">Name</th>
            <th class="border p-3">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr class="text-center">
            <td class="border p-3">{{$category->priority}}</td>
            <td class="border p-3">{{$category->name}}</td>
            <td class="border p-3">
                <a href="{{route('categories.edit',$category->id)}}" class="bg-blue-500 text-white p-2 rounded-lg">Edit</a>
                <a href="{{route('categories.delete',$category->id)}}" class="bg-red-500 text-white p-2 rounded-lg" onclick="return confirm('Are you sure to delete?')">Delete</a>
                <!-- <a href="" class="bg-green-500 text-white p-2 rounded-lg">Update</a> -->
            </td>






        </tr>
        @endforeach

    </tbody>

   </table>
 </div>



@endsection
