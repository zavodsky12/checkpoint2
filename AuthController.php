<?php
require "Auth.php";
require "Sporty/Prihlasenie.php";

class AuthController
{
    private $con;

    public function loginForm()
    {
        return $this->html();
    }

    public function __construct()
    {
        try {
            $this->con = new PDO("mysql:host=localhost;dbname=databaza", "root", "dtb456");
            $this->con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("DB error: " . $e->getMessage());
        }
        if (isset($_POST['login'])) {
            $this->login($_POST['login']);
        }
        if (isset($_POST['logout'])) {
            $this->logout();
        }
    }

    public function login($name)
    {
        $dlzka = strlen($name);
        $pouzivane = substr($name, 1, $dlzka-1);
        $passwd = $_POST['password'];
        if (strpos($pouzivane, '@') !== false) {
            $stmt = $this->con->prepare("SELECT meno FROM prihlasenia WHERE meno = '$name'");
            $stmt->execute();
            $posts = $stmt->fetchAll(PDO::FETCH_COLUMN | PDO::FETCH_PROPS_LATE);
            if (empty($posts)) {
                $this->con->prepare("INSERT INTO prihlasenia(meno, heslo) VALUES (?,?)")
                    ->execute([$name,$passwd]);
                Auth::login($name);
            } else {
                $stmt = $this->con->prepare("SELECT heslo FROM prihlasenia WHERE meno = '$name'");
                $stmt->execute();

                $posts = $stmt->fetchAll(PDO::FETCH_COLUMN | PDO::FETCH_PROPS_LATE);
                //$posts = strval($posts[0]);
                //$posts = explode("'",$posts[0]);
                echo '<script>';
                echo 'console.log('. json_encode( $posts ) .')';
                echo '</script>';
                echo '<script>';
                echo 'console.log('. json_encode( $passwd ) .')';
                echo '</script>';
                if ($passwd == $posts[0]) {
                    Auth::login($name);
                } else {
                    Auth::badLoggin($name);
                }
            }
        } else {
            Auth::badLoggin($name);
        }
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