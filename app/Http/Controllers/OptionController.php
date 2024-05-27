<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Option;
use App\Models\Question;

class OptionController extends Controller
{
    public function insert(Request $request)
    {
        $option = Option::where('question_id', $request->question_id)->count();

        if ($option >= 4) {
            $response = [
                'msg' => 'Option is full'
            ];
            return response()->json($response, 400);
        }

        $option = new Option();

        if (!$request->option) {
            $response = [
                'msg' => 'Option is required'
            ];
            return response()->json($response, 400);
        } else {
            $option->option = $request->option;
        }

        if (!$request->is_correct) {
            $response = [
                'msg' => 'Is Correct is required'
            ];
            return response()->json($response, 400);
        } else {
            $option->is_correct = $request->is_correct;
        }

        if (!$request->question_id) {
            $response = [
                'msg' => 'Question ID is required'
            ];
            return response()->json($response, 400);
        } else {
            $question = Question::find($request->question_id);
            if (!$question) {
                $response = [
                    'msg' => 'Question not found'
                ];
                return response()->json($response, 404);
            }
            $option->question_id = $request->question_id;
        }

        if ($option->save()) {
            $response = [
                'msg' => 'Option successfully created',
                'data' => $option
            ];
            return response()->json($response, 201);
        } else {
            $response = [
                'msg' => 'Failed to create option'
            ];
            return response()->json($response, 400);
        }
    }

    public function get()
    {
        $options = Option::all();

        $response = [
            'msg' => 'List of options',
            'data' => $options
        ];
        return response()->json($response, 200);
    }

    public function getById(Request $request)
    {
        $id = $request->id;

        $option = Option::find($id);

        if (!$option) {
            $response = [
                'msg' => 'Option not found'
            ];
            return response()->json($response, 404);
        }

        $response = [
            'msg' => 'Option detail',
            'data' => $option
        ];
        return response()->json($response, 200);
    }

    public function answer(Request $request)
    {
        $question_id = $request->id;
        $option_id = $request->option;

        $question = Question::find($question_id);
        if (!$question) {
            $response = [
                'msg' => 'Question not found'
            ];
            return response()->json($response, 404);
        }

        //check if the option is correct
        $option = Option::where('question_id', $question_id)->where('id', $option_id)->first();

        if (!$option) {
            $response = [
                'msg' => 'Option not found'
            ];
            return response()->json($response, 404);
        } else {
            $isCorectAnswer = Option::where('question_id', $question_id)->where('is_correct', 1)->first();

            if ($option->is_correct) {
                $response = [
                    'msg' => 'Correct Answer',
                    'answer' => $isCorectAnswer
                ];
                return response()->json($response, 200);
            } else {
                $response = [
                    'msg' => 'Wrong Answer',
                    'answer' => $isCorectAnswer
                ];
                return response()->json($response, 200);
            }
        }
    }

    public function update(Request $request)
    {
        $id = $request->id;

        $option = Option::find($id);

        if (!$option) {
            $response = [
                'msg' => 'Option not found'
            ];
            return response()->json($response, 404);
        }

        if ($request->option) {
            $option->option = $request->option;
        }

        if ($request->is_correct) {
            $option->is_correct = $request->is_correct;
        }

        if ($request->question_id) {
            $question = Question::find($request->question_id);
            if (!$question) {
                $response = [
                    'msg' => 'Question not found'
                ];
                return response()->json($response, 404);
            }

            $optionCount = Option::where('question_id', $request->question_id)->count();
            if ($optionCount >= 4) {
                $response = [
                    'msg' => 'Option is full'
                ];
                return response()->json($response, 400);
            }

            $option->question_id = $request->question_id;
        }

        if ($option->save()) {
            $response = [
                'msg' => 'Option updated',
                'data' => $option
            ];
            return response()->json($response, 200);
        } else {
            $response = [
                'msg' => 'Failed to update option'
            ];
            return response()->json($response, 400);
        }
    }

    public function delete(Request $request)
    {
        $id = $request->id;

        $option = Option::find($id);

        if (!$option) {
            $response = [
                'msg' => 'Option not found'
            ];
            return response()->json($response, 404);
        }

        if ($option->delete()) {
            $response = [
                'msg' => 'Option deleted'
            ];
            return response()->json($response, 200);
        } else {
            $response = [
                'msg' => 'Failed to delete option'
            ];
            return response()->json($response, 400);
        }
    }
}
