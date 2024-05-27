<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Chapter;
use App\Models\Option;

class QuestionController extends Controller
{
    public function insert(Request $request)
    {
        $question = new Question();

        if (!$request->title) {
            $response = [
                'msg' => 'Title is required'
            ];
            return response()->json($response, 400);
        } else {
            $question->title = $request->title;
        }

        if (!$request->file('question')) {
            $response = [
                'msg' => 'Question is required'
            ];
            return response()->json($response, 400);
        } else {
            $file = $request->file('question');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->move('question', $fileName);

            $question->question = $fileName;
        }

        if (!$request->file('explanation')) {
            $response = [
                'msg' => 'Explanation is required'
            ];
            return response()->json($response, 400);
        } else {
            $file = $request->file('explanation');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->move('explanation', $fileName);

            $question->explanation = $fileName;
        }

        if (!$request->chapter_id) {
            $response = [
                'msg' => 'Chapter ID is required'
            ];
            return response()->json($response, 400);
        } else {
            $chapter = Chapter::find($request->chapter_id);
            if (!$chapter) {
                $response = [
                    'msg' => 'Chapter not found'
                ];
                return response()->json($response, 404);
            }
            $question->chapter_id = $request->chapter_id;
        }

        if ($question->save()) {
            $response = [
                'msg' => 'Question created',
                'data' => $question
            ];
            return response()->json($response, 201);
        }

        $response = [
            'msg' => 'Error'
        ];
        return response()->json($response, 400);
    }

    public function get()
    {
        $questions = Question::all();

        $response = [
            'msg' => 'List of questions',
            'data' => $questions
        ];
        return response()->json($response, 200);
    }

    public function getOptionByQuestionId(Request $request)
    {
        $questions = Question::find($request->id);
        if (!$questions) {
            $response = [
                'msg' => 'Question not found'
            ];
            return response()->json($response, 404);
        }

        $options = Option::where('question_id', $request->id)->get();

        if (!$options) {
            $response = [
                'msg' => 'Options not found'
            ];
            return response()->json($response, 404);
        }

        $data = [
            'question' => $questions,
            'options' => $options ? $options : []
        ];

        $response = [
            'msg' => 'List of options',
            'data' => $data

        ];
        return response()->json($response, 200);
    }

    public function update(Request $request)
    {
        $id = $request->id;

        $question = Question::find($id);

        if (!$question) {
            $response = [
                'msg' => 'Question not found'
            ];
            return response()->json($response, 404);
        }

        if ($request->title) {
            $question->title = $request->title;
        }

        if ($request->file('question')) {
            $oldFile = $question->question;
            $filePath = public_path('question/' . $oldFile);
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            $file = $request->file('question');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->move('question', $fileName);

            $question->question = $fileName;
        }

        if ($request->file('explanation')) {
            $oldFile = $question->explanation;
            $filePath = public_path('explanation/' . $oldFile);
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            $file = $request->file('explanation');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->move('explanation', $fileName);

            $question->explanation = $fileName;
        }

        if ($request->chapter_id) {
            $chapter = Chapter::find($request->chapter_id);
            if (!$chapter) {
                $response = [
                    'msg' => 'Chapter not found'
                ];
                return response()->json($response, 404);
            }
            $question->chapter_id = $request->chapter_id;
        }

        if ($question->save()) {
            $response = [
                'msg' => 'Question updated',
                'data' => $question
            ];
            return response()->json($response, 200);
        }

        $response = [
            'msg' => 'Error'
        ];
        return response()->json($response, 400);
    }

    public function delete(Request $request)
    {
        $id = $request->id;

        $question = Question::find($id);

        if (!$question) {
            $response = [
                'msg' => 'Question not found'
            ];
            return response()->json($response, 404);
        }

        $oldFile = $question->question;
        $filePath = public_path('question/' . $oldFile);
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $oldFile = $question->explanation;
        $filePath = public_path('explanation/' . $oldFile);
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        if ($question->delete()) {
            $response = [
                'msg' => 'Question deleted'
            ];
            return response()->json($response, 200);
        }

        $response = [
            'msg' => 'Error'
        ];
        return response()->json($response, 400);
    }
}
