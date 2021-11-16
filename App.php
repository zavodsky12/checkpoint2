<?php
require "Sporty/Post.php";
require "DBStorage.php";

class App
{
    private DBStorage $storage;

    public function __construct()
    {
        $this->storage = new DBStorage();

        if (isset($_FILES['file'])) {
            $this->saveImage();
        }

        if (isset($_POST['meno'])) {
            $this->storage->addMeno(new Post(id: $_POST['id'], meno: $_POST['text']));
        }

        if (isset($_POST['priezvisko'])) {
            $this->storage->addPriezvisko(new Post(id: $_POST['id'], priezvisko: $_POST['text']));
        }

        if (isset($_GET['like'])) {
            $this->storage->addLikes($_GET['like']);
        }
    }
    private function saveImage() {
        if ($_FILES['file']['error'] == UPLOAD_ERR_OK) {

            //ulozime fyzicky obrazok do priecinku files
            $name = date('Y-m-d-H-i-s_').$_FILES['file']['name'];
            $path = "files/$name";
            move_uploaded_file($_FILES['file']['tmp_name'], $path);

            //ulozime jeho urlko do databazy
            $newPost = new Post(obrazok: $name);
            $this->storage->storeImage($newPost);
        } else {
            die("Image upload error");
        }
    }

    public function getAllPosts()
    {
        return $this->storage->getAllPosts();
    }
}