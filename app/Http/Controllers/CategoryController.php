<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('created_at', 'DESC')->get();

        return response()->json(['message' => 'OK', 'categories' => $categories], 200);
    }

    public function store(CategoryRequest $request)
    {
        $validatedData = $request->validated();

        $category = Category::create($validatedData);

        return response()->json(['message' => 'Success', 'category' => $category], 201);
    }

    public function show($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        return response()->json(['message' => 'OK', 'category' => $category], 200);
    }

    public function update(CategoryRequest $request, $id)
    {
        $validatedData = $request->validated();

        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $category->update($validatedData);

        return response()->json(['message' => 'Update successful', 'category' => $category], 200);
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $category->hotels()->delete();
        $category->delete();

        return response()->json(['message' => 'Category deleted successfully'], 200);
    }
}
