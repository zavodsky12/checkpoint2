<?php
require "Auth.php";

class AuthController
{
    public function loginForm()
    {
        return $this->html();
    }

    public function __construct()
    {
        if (isset($_POST['login'])) {
            $this->login($_POST['login']);
        }
        if (isset($_POST['logout'])) {
            $this->logout();
        }
    }

    public function login($name)
    {
            Auth::login($name);
    }

    public function logout()
    {
        Auth::logout();
        unset($_POST['logout']);
    }

    public function redirectToHome()
    {
        header("Location: index.php");
    }
}