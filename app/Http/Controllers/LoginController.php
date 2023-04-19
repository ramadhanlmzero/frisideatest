<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Services\UserService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * I'm using Custom Trait to standarize API response
     */
    use ApiResponser;

    protected $userService;

    /**
     * I'm using Service Pattern to centralize code
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        $auth = $this->userService->auth($data);

        if ($auth->status == false) {
            return $this->errorResponse($auth->message);
        }

        return $this->successResponse($auth, $auth->message);
    }

    public function logout()
    {
        auth('sanctum')->user()->currentAccessToken()->delete();
        return $this->successResponse(null, 'Logout berhasil!');
    }
}
