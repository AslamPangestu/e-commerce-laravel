<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\UserRepositoryInterfaces;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Rules\Password;

class AuthController extends Controller
{
    use ResponseFormatter;
    protected $repository;

    public function __construct(UserRepositoryInterfaces $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function register(Request $request)
    {
        try {
            $maxInput = 'max:255';
            $request->validate([
                'name' => ['required', 'string', $maxInput],
                'username' => ['required', 'string', $maxInput, 'unique:users'],
                'email' => ['required', 'string', 'email', $maxInput, 'unique:users'],
                'phone' => ['nullable', 'string', $maxInput],
                'password' => ['required', 'string', new Password]
            ]);

            // Add To Table
            $this->repository->create([
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'phone' => $request->phone,
                'role_id' => 2,
                'password' => $request->password,
            ]);

            // Login
            $user = $this->repository->findOneByQuery([
                ['email', '=', $request->email]
            ]);
            $tokenResult = $user->createToken('authToken')->plainTextToken;

            return $this->success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user
            ], 'User Registered');
        } catch (Exception $error) {
            return $this->error([
                'message' => 'Something went wrong',
                'error' => $error->getMessage(),
            ], 'Authentication Failed', 500);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'email|required',
                'password' => 'required'
            ]);

            $credentials = request(['email', 'password']);
            if (!Auth::attempt($credentials)) {
                return $this->error([
                    'message' => 'Unauthorized'
                ], 'Authentication Failed', 500);
            }

            $user = $this->repository->findOneByQuery([
                ['email', '=', $request->email]
            ]);
            if (!Hash::check($request->password, $user->password, [])) {
                throw new Exception('Invalid Credentials');
            }

            $tokenResult = $user->createToken('authToken')->plainTextToken;
            return $this->success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user
            ], 'Authenticated');
        } catch (Exception $error) {
            return $this->error([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 'Authentication Failed', 500);
        }
    }
}
