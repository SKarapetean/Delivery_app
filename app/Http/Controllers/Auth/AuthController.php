<?php

namespace App\Http\Controllers\Auth;

use App\DTO\UserRegisterDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Services\Actions\UserRegisterAction;

class AuthController extends Controller
{
    public function register(UserRegisterRequest $request, UserRegisterAction $action)
    {
        $dto = UserRegisterDTO::fromRequest($request);
        $response = $action->run($dto);

        if ($response < 0) {
            response()->json(['message' => 'Server is overloaded!'],500);
        }

        return response()->json(['code' => $response],201);
    }

    public function login() {}

}
