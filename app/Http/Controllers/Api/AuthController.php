<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\GetTokensByCodeRequest;
use App\Http\Requests\Api\Auth\SendCodeRequest;
use App\Http\Resources\Model\TokenResource;
use App\Http\Resources\Model\UserCodeResource;
use App\Http\Resources\Model\UserResource;
use App\Services\Auth\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    public function __construct(protected AuthService $authService)
    {
    }

    public function sendCode(SendCodeRequest $request): JsonResponse
    {
        $code = $this->authService->sendCode($request->phone);

        return response()->json(UserCodeResource::make($code), Response::HTTP_CREATED);
    }

    public function getTokensByCode(GetTokensByCodeRequest $request): JsonResponse
    {
        $token = $this->authService->getTokensByCode($request->code);

        return response()->json(TokenResource::make($token), Response::HTTP_OK);
    }
}
