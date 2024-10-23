<?php

include_once '../src/lib/db.user.php';

//Contains functions to assist in using tokens for remembering user sessions
function generateTokens(): array
{
    $selector = bin2hex(random_bytes(16));
    $validator = bin2hex(random_bytes(32));

    return [$selector, $validator, $selector . ':' . $validator];
}

function parseToken(string $token): ?array
{
    $parts = explode(':', $token);

    if ($parts && count($parts) == 2) {
        return [$parts[0], $parts[1]];
    }
    return null;
}

function token_is_valid(string $token): bool
{ // parse the token to get the selector and validator [$selector, $validator] = parse_token($token);
    [$selector, $validator] = parseToken($token);
    $tokens = UserActions::findUserTokenBySelector($selector);
    if (!$tokens) {
        return false;
    }

    return password_verify($validator, $tokens['hashed_validator']);
}

function rememberMe(int $userId, int $daysToExpire = 30)
{
    echo 'rememberMe called';

    [$selector, $validator, $token] = generateTokens();

    // Remove all existing tokens associated with the user id
    UserActions::deleteAllTokensOfUser($userId);

    // Set expiration date
    $expiredSeconds = time() + 60 * 60 * 24 * $daysToExpire;

    // Insert a token to the database
    $hashValidator = password_hash($validator, PASSWORD_DEFAULT);
    $expiry = date('Y-m-d H:i:s', $expiredSeconds);

    if (UserActions::insertUserToken($userId, $selector, $hashValidator, $expiry)) {
        setcookie('remember_me', $token, $expiredSeconds);
    }
}
