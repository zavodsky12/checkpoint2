<?php
require "AuthController.php";
session_start();
$authctr = new AuthController();
class DBStorage
{

    //connection - obsahuje pripojenie k databaze
    private $con;

    //ulohou je aby sa pripojil k databaze
    public function  __construct()
    {
        try {
            $this->con = new PDO("mysql:host=localhost;dbname=databaza", "root", "dtb456");
            $this->con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("DB error: " . $e->getMessage());
        }
    }
    public function storeImage(Post $newPost)
    {
        $this->con->prepare("INSERT INTO sportovci(obrazok, meno, priezvisko, krajina) VALUES (?,?,?,?)")
            ->execute([$newPost->getImage(),"","",""]);
    }
    public function getAllPosts() {
        $stmt = $this->con->prepare("SELECT * FROM sportovci order by likes desc");
        $stmt->execute();

//      najskor sa musi spustit konstruktor a potom az property
        $posts = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Post::class);

        return $posts;
    }

    public function addMeno(Post $meno)
    {
        $this->con->prepare("UPDATE sportovci SET meno = ? WHERE id=?")
            ->execute([$meno->getMeno(), $meno->getId()]);
    }

    public function addPriezvisko(Post $priezvisko)
    {
        $this->con->prepare("UPDATE sportovci SET priezvisko = ? WHERE id=?")
            ->execute([$priezvisko->getPriezvisko(), $priezvisko->getId()]);
    }

    public function addLikes(int $id)
    {
        if (Auth::isLogged()) {
            $this->con->prepare("UPDATE sportovci SET likes = likes + 1 where id=?")
                ->execute([intval($id)]);
        }
    }

    public function deleteFile(int $id)
    {
        $this->con->prepare("DELETE FROM sportovci WHERE id=?")
            ->execute([intval($id)]);
    }
}