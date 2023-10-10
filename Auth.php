<?php
session_start();
include_once 'DB.php';

class Auth extends DB
{
    public static function register($data)
    {
        $name = $data['name'];
        $username = $data['username'];
        $password = $data['password'];
        $password_confirm = $data['password_confirm'];


        if ($password === $password_confirm) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users(name,username,password) VALUES ('$name','$username','$password')";
            $result = DB::connect()->query($sql);

            return [
                "status" => "success",
                "data" => $result,
                "message" => "Berhasil register",
            ];
        } 
        else{
            return [
                "status" => "error",
                "data" => [],
                "message" => "Password Tidak cocok",
            ];
        }
    }

    public static function login($data)
    {
        $username = $data["username"];
        $password = $data["password"];

        $user = Auth::checkUsername($username);
        if ($user === null) {
            return [
                "status" => "error",
                "data" => [],
                "message" => "Username tidak ditemukan",
            ];
        } else {
            $decrpty = Auth::checkPassword($password, $user["password"]);

            if(!$decrpty){
                return [
                    "status" => "error",
                    "data" => [],
                    "message" => "Password Salah",
                ];
            }
            else{
                $_SESSION["username"] = $username;
                setcookie("username", $username, time() + 86400);

                header("Location: home.php");
            }
        }
    }


    public static function logout()
    {
    }

    public static function checkUsername($username)
    {
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = DB::connect()->query($sql)->fetch_assoc();

        return $result;
    }

    public static function checkPassword($password, $password_hash)
    {
        $decrpty = password_verify($password, $password_hash);

        return $decrpty;
    }

    public static function check()
    {
    }
}  