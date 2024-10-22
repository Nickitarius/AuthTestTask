<?php

require_once '../src/lib/db.connection.php';

$db = getDBConnection();

class UserActions
{

    public static function register_user(string $email, string $username, string $password): bool
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

    public static function isUsernameExists($username): bool
    {
        try {
            global $db;
            $query = "SELECT COUNT(*) as total
                FROM users
                WHERE username = :username";
            $statement = $db->prepare($query);

            $statement->bindValue(':username', $username, PDO::PARAM_STR);
            $statement->execute();
            $res = $statement->fetch(PDO::FETCH_ASSOC);

            // return $res;
            return $res['total'] > 0;
        } catch (Exception $e) {
            return false;
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
}
