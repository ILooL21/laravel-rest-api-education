<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Lesson;

class CategoryController extends Controller
{
    public function insert(Request $request)
    {
        $category = new Category();

        if (!$request->name) {
            $response = [
                'msg' => 'Name is required'
            ];
            return response()->json($response, 400);
        } else {
            $category->name = $request->name;
        }

        if ($category->save()) {
            $response = [
                'msg' => 'Category created',
                'category' => $category
            ];
            return response()->json($response, 200);
        } else {
            $response = [
                'msg' => 'Failed to create category'
            ];
            return response()->json($response, 400);
        }
    }

    public function get()
    {
        $categories = Category::all();

        $response = [
            'msg' => 'List of categories',
            'categories' => $categories
        ];
        return response()->json($response, 200);
    }

    public function getLessonByCategoryId(Request $request)
    {
        // ambil id dari params url
        $id = $request->id;

        $lessons = Lesson::where('category_id', $id)->get();

        // jika data tidak ditemukan
        if (!$lessons) {
            $response = [
                'msg' => 'Lesson not found',
                'lessons' => []
            ];
            return response()->json($response, 404);
        }

        $response = [
            'msg' => 'List of lessons',
            'lessons' => $lessons
        ];
        return response()->json($response, 200);
    }

    public function update(Request $request)
    {
        // ambil id dari params url
        $id = $request->id;

        // cari data category berdasarkan id
        $category = Category::find($id);

        // jika data tidak ditemukan
        if (!$category) {
            $response = [
                'msg' => 'Category not found'
            ];
            return response()->json($response, 404);
        }

        // update data category jika nama category di request ada
        if ($request->name) {
            $category->name = $request->name;
        }

        // simpan data category
        $category->save();

        $response = [
            'msg' => 'Category updated',
            'category' => $category
        ];

        return response()->json($response, 200);
    }

    public function delete(Request $request)
    {
        // ambil id dari params url
        $id = $request->id;

        // cari data category berdasarkan id
        $category = Category::find($id);

        // jika data tidak ditemukan
        if (!$category) {
            $response = [
                'msg' => 'Category not found'
            ];
            return response()->json($response, 404);
        }

        // hapus data category
        if ($category->delete()) {
            $response = [
                'msg' => 'Category deleted'
            ];
            return response()->json($response, 200);
        } else {
            $response = [
                'msg' => 'Failed to delete category'
            ];
            return response()->json($response, 400);
        }
    }
}
