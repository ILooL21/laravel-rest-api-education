<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function me(Request $request)
    {
        $user = $request->user();
        $response = [
            'msg' => 'User data',
            'user' => $user
        ];
        return response()->json($response, 200);
    }

    public function register(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user) {
            $response = [
                'msg' => 'User already exists'
            ];
            return response()->json($response, 400);
        } else {
            $validator = Validator::make($request->all(), [
                'username' => 'required|string',
                'email' => 'required|email|unique:users',
                'password' => 'required'
            ]);

            if ($validator->fails()) {
                $response = [
                    'msg' => 'Validation error',
                    'errors' => $validator->errors()
                ];
                return response()->json($response, 400);
            } else {
                $check = User::all();
                if ($check->count() == 0) {
                    $user = new User([
                        'username' => $request->username,
                        'email' => $request->email,
                        'role' => 'admin',
                        'password' => bcrypt($request->password)
                    ]);
                } else {
                    $user = new User([
                        'username' => $request->username,
                        'email' => $request->email,
                        'role' => 'user',
                        'password' => bcrypt($request->password)
                    ]);
                }
            }

            if ($user->save()) {
                $response = [
                    'msg' => 'User created',
                    'user' => $user,
                ];
                return response()->json($response, 201);
            }
        }
        $response = [
            'msg' => 'An error occurred'
        ];
        return response()->json($response, 404);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            $response = [
                'msg' => 'Validation error',
                'errors' => $validator->errors()
            ];
            return response()->json($response, 400);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            $response = [
                'msg' => 'Tidak ada user dengan email tersebut'
            ];
            return response()->json($response, 404);
        } else {
            if (!password_verify($request->password, $user->password)) {
                $response = [
                    'msg' => 'Password Salah'
                ];
                return response()->json($response, 401);
            }
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        session(['token' => $token]);

        $userdata = [
            'username' => $user->username,
            'email' => $user->email,
            'role' => $user->role
        ];

        $response = [
            'msg' => 'User logged in',
            'user' => $userdata,
            'token' => $token
        ];

        return response()->json($response, 200);
    }

    public function logout(Request $request)
    {
        $token = $request->user()->currentAccessToken();
        if ($token) {
            $token->delete();
            return response()->json(['msg' => 'User logged out'], 200);
        } else {
            return response()->json(['msg' => 'User not logged in'], 400);
        }
    }

    public function update(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user->email != $request->user()->email) {
            $response = [
                'msg' => 'Unauthorized'
            ];
            return response()->json($response, 401);
        }


        //jika request username tidak kosong maka update username
        if ($request->username) {
            $user->username = $request->username;
        }

        if (!password_verify($request->oldpassword, $user->password)) {
            $response = [
                'msg' => 'Password Lama Salah',

            ];
            return response()->json($response, 401);
        }

        //jika request password tidak kosong maka update password
        if ($request->newpassword) {
            $user->password = bcrypt($request->newpassword);
        }

        $userdata = [
            'username' => $user->username,
            'email' => $user->email,
            'role' => $user->role
        ];

        if ($user->save()) {
            $response = [
                'msg' => 'User updated',
                'token' => $request->bearerToken(),
                'user' => $userdata

            ];
            return response()->json($response, 200);
        }

        $response = [
            'msg' => 'An error occurred'
        ];
        return response()->json($response, 404);
    }

    public function get()
    {
        //ambil user selain yang sedang login
        $users = User::where('email', '!=', auth()->user()->email)->get();
        $response = [
            'msg' => 'List of users',
            'users' => $users
        ];
        return response()->json($response, 200);
    }

    public function changeRole(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user) {
            if ($user->role == 'admin') {
                $user->role = 'user';
            } else {
                $user->role = 'admin';
            }

            if ($user->save()) {
                $response = [
                    'msg' => 'Role updated',
                    'user' => $user
                ];
                return response()->json($response, 200);
            }
        }

        $response = [
            'msg' => 'An error occurred'
        ];
        return response()->json($response, 404);
    }
}
