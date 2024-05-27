<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Lesson;
use App\Models\Question;

class ChapterController extends Controller
{
    public function insert(Request $request)
    {
        $chapter = new Chapter();

        if (!$request->name) {
            $response = [
                'msg' => 'Name is required'
            ];
            return response()->json($response, 400);
        } else {
            $chapter->name = $request->name;
        }

        if (!$request->description) {
            $response = [
                'msg' => 'Description is required'
            ];
            return response()->json($response, 400);
        } else {
            $chapter->description = $request->description;
        }

        if (!$request->video_url) {
            $response = [
                'msg' => 'Video URL is required'
            ];
            return response()->json($response, 400);
        } else {
            $chapter->video_url = $request->video_url;
        }

        if (!$request->lesson_id) {
            $response = [
                'msg' => 'Lesson ID is required'
            ];
            return response()->json($response, 400);
        } else {
            $lesson = Lesson::find($request->lesson_id);
            if (!$lesson) {
                $response = [
                    'msg' => 'Lesson not found'
                ];
                return response()->json($response, 404);
            }
            $chapter->lesson_id = $request->lesson_id;
        }

        if ($chapter->save()) {
            $response = [
                'msg' => 'Chapter created',
                'chapter' => $chapter
            ];
            return response()->json($response, 200);
        } else {
            $response = [
                'msg' => 'Failed to create chapter'
            ];
            return response()->json($response, 400);
        }
    }

    public function get()
    {
        $chapters = Chapter::all();

        $response = [
            'msg' => 'List of chapters',
            'chapters' => $chapters
        ];
        return response()->json($response, 200);
    }

    public function getAllQuestionByChapterId(Request $request)
    {
        $id = $request->id;

        $chapter = Chapter::find($id);

        if (!$chapter) {
            $response = [
                'msg' => 'Chapter not found'
            ];
            return response()->json($response, 404);
        }

        $questions = Question::where('chapter_id', $id)->get();

        $data = [
            'chapter' => $chapter,
            'questions' => $questions
        ];

        $response = [
            'msg' => 'List of questions',
            'data' => $data
        ];
        return response()->json($response, 200);
    }

    public function update(Request $request)
    {
        $id = $request->id;

        $chapter = Chapter::find($id);

        if (!$chapter) {
            $response = [
                'msg' => 'Chapter not found'
            ];
            return response()->json($response, 404);
        }

        if ($request->name) {
            $chapter->name = $request->name;
        }

        if ($request->description) {
            $chapter->description = $request->description;
        }

        if ($request->video_url) {
            $chapter->video_url = $request->video_url;
        }

        if ($request->lesson_id) {
            $lesson = Lesson::find($request->lesson_id);
            if (!$lesson) {
                $response = [
                    'msg' => 'Lesson not found'
                ];
                return response()->json($response, 404);
            }
            $chapter->lesson_id = $request->lesson_id;
        }

        if ($chapter->save()) {
            $response = [
                'msg' => 'Chapter updated',
                'chapter' => $chapter
            ];
            return response()->json($response, 200);
        } else {
            $response = [
                'msg' => 'Failed to update chapter'
            ];
            return response()->json($response, 400);
        }
    }

    public function delete(Request $request)
    {
        $id = $request->id;

        $chapter = Chapter::find($id);

        if (!$chapter) {
            $response = [
                'msg' => 'Chapter not found'
            ];
            return response()->json($response, 404);
        }

        if ($chapter->delete()) {
            $response = [
                'msg' => 'Chapter deleted'
            ];
            return response()->json($response, 200);
        } else {
            $response = [
                'msg' => 'Failed to delete chapter'
            ];
            return response()->json($response, 400);
        }
    }
}
