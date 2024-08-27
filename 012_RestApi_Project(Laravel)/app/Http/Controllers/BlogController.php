<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blog;

use App\Models\User;

// use Dotenv\Exception\ValidationException;

use  Illuminate\Validation\ValidationException;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

class BlogController extends Controller
{

    public function index()
    {
        return Blog::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'price' => 'required'
        ]);

        return Blog::create($request->all());
    }

    public function show($id)
    {
        return Blog::find($id);
    }

    public function update(Request $request, $id)
    {
        $update = Blog::find($id);

        $update->update($request->all());

        return $update;
    }

    public function destroy($id)
    {
       return Blog::destroy($id);
    }

    public function search($name)
    {
        return Blog::where('name', 'like', '%' . $name . '%')->get();
    }
}
