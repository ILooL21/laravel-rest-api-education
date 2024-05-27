<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Category;
use App\Models\Chapter;

class LessonController extends Controller
{
    public function get()
    {
        $lessons = Lesson::all();

        $response = [
            'msg' => 'List of lessons',
            'lessons' => $lessons
        ];

        return response()->json($response, 200);
    }

    public function insert(Request $request)
    {
        $lesson = new Lesson();

        if (!$request->name) {
            $response = [
                'msg' => 'Name is required'
            ];
            return response()->json($response, 400);
        } else {
            $lesson->name = $request->name;
        }

        if (!$request->description) {
            $response = [
                'msg' => 'Description is required'
            ];
            return response()->json($response, 400);
        } else {
            $lesson->description = $request->description;
        }

        if (!$request->category_id) {
            $response = [
                'msg' => 'Category ID is required'
            ];
            return response()->json($response, 400);
        } else {
            $category = Category::find($request->category_id);
            if (!$category) {
                $response = [
                    'msg' => 'Category not found'
                ];
                return response()->json($response, 404);
            } else {
                $lesson->category_id = $category->id;
            }
        }

        if ($lesson->save()) {
            $response = [
                'msg' => 'Lesson created',
                'lesson' => $lesson
            ];
            return response()->json($response, 200);
        } else {
            $response = [
                'msg' => 'Failed to create lesson'
            ];
            return response()->json($response, 400);
        }
    }

    public function getChapterByLessonId(Request $request)
    {
        // ambil id dari params url
        $id = $request->id;

        $lesson = Lesson::find($id);

        if (!$lesson) {
            $response = [
                'msg' => 'Lesson not found'
            ];
            return response()->json($response, 404);
        }

        $chapters = Chapter::where('lesson_id', $id)->get();

        // jika data tidak ditemukan
        if (!$chapters) {
            $response = [
                'msg' => 'Chapter not found',
                'chapters' => []
            ];
            return response()->json($response, 404);
        }

        $data = [
            'lesson' => $lesson,
            'chapters' => $chapters
        ];

        $response = [
            'msg' => 'List of chapters',
            'data' => $data
        ];

        return response()->json($response, 200);
    }

    public function update(Request $request)
    {
        // ambil id dari params url
        $id = $request->id;

        // cari data lesson berdasarkan id
        $lesson = Lesson::find($id);

        // jika data tidak ditemukan
        if (!$lesson) {
            $response = [
                'msg' => 'Lesson not found'
            ];
            return response()->json($response, 404);
        }

        if ($request->name) {
            $lesson->name = $request->name;
        }

        if ($request->description) {
            $lesson->description = $request->description;
        }

        if ($request->category_id) {
            $category = Category::find($request->category_id);
            if (!$category) {
                $response = [
                    'msg' => 'Category not found'
                ];
                return response()->json($response, 404);
            } else {
                $lesson->category_id = $category->id;
            }
        }

        if ($lesson->save()) {
            $response = [
                'msg' => 'Lesson updated',
                'lesson' => $lesson
            ];
            return response()->json($response, 200);
        } else {
            $response = [
                'msg' => 'Failed to update lesson'
            ];
            return response()->json($response, 400);
        }
    }

    public function delete(Request $request)
    {
        // ambil id dari params url
        $id = $request->id;

        // cari data lesson berdasarkan id
        $lesson = Lesson::find($id);

        // jika data tidak ditemukan
        if (!$lesson) {
            $response = [
                'msg' => 'Lesson not found'
            ];
            return response()->json($response, 404);
        }

        if ($lesson->delete()) {
            $response = [
                'msg' => 'Lesson deleted'
            ];
            return response()->json($response, 200);
        } else {
            $response = [
                'msg' => 'Failed to delete lesson'
            ];
            return response()->json($response, 400);
        }
    }
}
