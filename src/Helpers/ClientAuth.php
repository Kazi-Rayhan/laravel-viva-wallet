<?php

namespace KaziRayhan\VivaWallet\Helpers;

use KaziRayhan\VivaWallet\Contracts\AuthToken;

class ClientAuth
{
    public static function basic(string $username, string $password): array
    {
        return [$username, $password];
    }

    public static function token(AuthToken $authToken): string
    {
        return "{$authToken->getTokenType()} {$authToken->getAccessToken()}";
    }
}
