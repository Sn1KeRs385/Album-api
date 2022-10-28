<?php

namespace App\Services\Auth;

use App\Enums\CodeType;
use App\Enums\IdentifierType;
use App\Models\User;
use App\Models\UserCode;
use App\Models\UserIdentifier;
use App\Services\CodeService;
use Laravel\Sanctum\NewAccessToken;

class AuthService
{
    public function __construct(protected CodeService $codeService)
    {
    }

    public function sendCode(string $phone): UserCode
    {
        $userIdentifier = UserIdentifier::query()
            ->where('type', IdentifierType::PHONE)
            ->where('value', $phone)
            ->first();

        if ($userIdentifier) {
            $user = $userIdentifier->user;
        } else {
            $user = User::create();
            $user->identifiers()
                ->create(
                    [
                        'type' => IdentifierType::PHONE,
                        'value' => $phone
                    ]
                );
        }

        return $this->codeService->sendCode($user, CodeType::AUTH);
    }

    public function getTokensByCode(string $code): NewAccessToken
    {
        $userCode = $this->codeService->useCode($code);
        $user = $userCode->user;

        return $user->createToken("user_{$user->id}");
    }
}
