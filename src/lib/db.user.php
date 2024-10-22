<?php

require_once '../src/lib/db.connection.php';

$db = getDBConnection();

class UserActions
{

    public static function registerUser(string $email, string $username, string $password): bool
    {
        global $db;
        try {
            $query = 'INSERT INTO users(username, email, password)
            VALUES(:username, :email, :password)';

            $statement = $db->prepare($query);

            $statement->bindValue(':username', $username, PDO::PARAM_STR);
            $statement->bindValue(':email', $email, PDO::PARAM_STR);
            $statement->bindValue(':password', password_hash($password, PASSWORD_BCRYPT), PDO::PARAM_STR);

            return $statement->execute();
        } catch (PDOException $e) {
            return false;
        }


    }

    public static function getUserByUsername($username)
    {
        try {
            global $db;
            $query = "SELECT *
                FROM users
                WHERE username = :username";
            $statement = $db->prepare($query);

            $statement->bindValue(':username', $username, PDO::PARAM_STR);
            $statement->execute();
            $res = $statement->fetch(PDO::FETCH_ASSOC);

            return $res;
            // return $res['total'] > 0;
        } catch (Exception $e) {
            return [];
        }
    }

    public static function isEmailExists($email): bool
    {
        try {
            global $db;
            $query = "SELECT COUNT(*) as total
                FROM users
                WHERE email = :email";
            $statement = $db->prepare($query);

            $statement->bindValue(':email', $email, PDO::PARAM_STR);
            $statement->execute();
            // $res = $statement->fetch(PDO::FETCH_ASSOC);
            $res = $statement->fetch(PDO::FETCH_ASSOC);

            return $res['total'] > 0;

            // return count($res) > 0;
        } catch (Exception $e) {
            return false;
        }
    }

    public static function insertUserToken(int $userId, string $selector, string $hashedValidator, string $expiry): bool
    {
        global $db;
        $sql = 'INSERT INTO user_tokens(user_id, selector, hashed_validator, expiry)
            VALUES(:user_id, :selector, :hashed_validator, :expiry)';

        $statement = $db->prepare($sql);
        $statement->bindValue(':user_id', $userId);
        $statement->bindValue(':selector', $selector);
        $statement->bindValue(':hashed_validator', $hashedValidator);
        $statement->bindValue(':expiry', $expiry);

        return $statement->execute();
    }

    public static function findUserTokenBySelector(string $selector)
    {
        global $db;
        $sql = 'SELECT id, selector, hashed_validator, user_id, expiry
                FROM user_tokens
                WHERE selector = :selector AND
                    expiry >= now()
                LIMIT 1';

        $statement = $db->prepare($sql);
        $statement->bindValue(':selector', $selector);

        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public static function deleteAllTokensOfUser(int $userId): bool
    {
        global $db;
        $sql = 'DELETE FROM user_tokens WHERE user_id = :user_id';
        $statement = $db->prepare($sql);
        $statement->bindValue(':user_id', $userId);

        return $statement->execute();
    }

    public static function findUserByToken(string $token)
    {
        global $db;
        $tokens = parseToken($token);

        if (!$tokens) {
            return null;
        }

        $sql = 'SELECT users.id, username
            FROM users
            INNER JOIN user_tokens ON user_id = users.id
            WHERE selector = :selector AND
                expiry > now()
            LIMIT 1';

        $statement = $db->prepare($sql);
        $statement->bindValue(':selector', $tokens[0]);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}

