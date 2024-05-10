<?php

namespace App\Http\Controllers\User;

use App\Exceptions\AuthWithCodeException;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\AuthUserRequest;
use App\Http\Resources\TokenResource;
use App\Services\Actions\User\AuthUserWithCodeAction;

class UserController extends Controller
{
    /**
     * @throws AuthWithCodeException
     */
    public function authWithCode(AuthUserRequest $request, AuthUserWithCodeAction $action)
    {
        $code = $request->getAuthCode();
        $token = $action->run($code);

        return new TokenResource($token);
    }

}
