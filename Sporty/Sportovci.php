<?php
require "../App.php";
$app = new App();
$authctr = new AuthController();
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../vlastne.css">
    <link rel="stylesheet" href="../nove.css">
    <title>Športovci</title>
</head>

<body>
<div class="header zadnyObrazok">
    <h1>Moja nová stránka</h1>
    <h2>Stránka, ktorá sa venuje olympijským hrám v Tokiu</h2>
</div>

<div class="row">
    <div class="col-1 col-s-0">

    </div>
    <div class="col-2 col-s-12 menu">
        <ul>
            <li class="hlavne"><a href="../index.php">Hlavná stránka</a></li>
            <li class="hlavne"><a href="Sportovci.php">Športy<i class="fas fa-caret-down"></i></li>
            <li class="opacne"><a href="Atletika.php" class="red">Atletika</a></li>
            <li class="opacne"><a href="Futbal.html" class="red">Futbal</a></li>
            <li class="opacne"><a href="Plavanie.html" class="red">Plávanie</a></li>
            <li class="opacne"><a href="Volejbal.html" class="red">Volejbal</a></li>
            <li class="hlavne">Krajiny</li>
            <li class="opacne">Slovensko</li>
            <li class="opacne">Česko</li>
            <li class="opacne">Japonsko</li>
            <li class="opacne">USA</li>
        </ul>
    </div>

    <div class="col-6 col-s-8">
        <div class="main">
            <h1>Športovci</h1>

            <br>
            <?php if(isset($_SESSION['name'])) { ?>
                <?php if($_SESSION['name'] == "admin@admin") { ?>
                    <form method="post" enctype="multipart/form-data">
                        <input type="file" name="file"><br><br>
                        <input type="submit" value="Vloz obrazok">
                    </form>
                <?php } ?>
            <?php } ?>
            <?php $url = $_SERVER['REQUEST_URI'] ?>
            <?php $array = explode('=', $url);
            $end = end($array); ?>
            <?php foreach ($app->getAllPosts() as $post) { ?>
                <div class="lave" style="width: 18rem; margin: 0.2rem; margin-top: 1rem">
                    <img src="files/<?=$post->getImage()?>" class="obr vlavo" height="160">
                    <?php if($post->getMeno() == "") { ?>
                        <?php if(isset($_SESSION['name'])) { ?>
                            <?php if($_SESSION['name'] == "admin@admin") { ?>
                                <form method="post">
                                    <input type="hidden" name="id" value="<?= $post->getId()?>">
                                    <input type="text" name="text" size="19" placeholder="Vloz meno ...">
                                    <input type="submit" value="Posli" name="meno">
                                </form>
                            <?php } ?>
                        <?php } ?>
                    <?php } else { ?>
                        <p><?=$post->getmeno()?></p>
                    <?php } ?>
                    <?php if($post->getPriezvisko() == "") { ?>
                        <?php if(isset($_SESSION['name'])) { ?>
                            <?php if($_SESSION['name'] == "admin@admin") { ?>
                                <form method="post">
                                    <input type="hidden" name="id" value="<?= $post->getId()?>">
                                    <input type="text" name="text" size="19" placeholder="Vloz priezvisko ...">
                                    <input type="submit" value="Posli" name="priezvisko">
                                </form>
                            <?php } ?>
                        <?php } ?>
                    <?php } else { ?>
                        <p><?=$post->getPriezvisko()?></p>
                    <?php } ?>
                    <a href="?like=<?=$post->getId()?>" class="lajky">
                        <?= $post->getLikes();?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
                            <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/>
                        </svg>
                    </a>
                    <?php if(!Auth::isLogged()) { ?>
<!--                        vytiahol som si poslednu cast urlka do end-->
                        <?php if(isset($_GET['like']) && $post->getId() == $end) { ?>
                            <p class="cervena">Na lajkovanie sa musis prihlasit</p>
                        <?php } ?>
                    <?php } ?>
                    <?php if(isset($_SESSION['name'])) { ?>
                        <?php if($_SESSION['name'] == "admin@admin") { ?>
                            <a href="?delete=<?=$post->getId()?>" class="dilit">
                                Zmaž príspevok
                            </a>
                        <?php } ?>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="col-22 col-s-4 aside">
        <?php if(Auth::isLogged()) { ?>
            <div class="login">
                <h2>Ste prihlaseny</h2>
                <form method="post">
                    <input type="submit" name="logout" value="Odhlasit">
                </form>
            </div>
        <?php } else { ?>
            <div class="login">
                <h2>Login</h2>
                <?php if(Auth::isBadLoggin()) { ?>
                    <p class="cervena">Zadali ste zly login</p>
                    <?php unset($_SESSION['bad']); ?>
                <?php } ?>
                <form method="post">
                    <label for="controle">Email</label>
                    <input type="email" name="login">
                    <label for="controle">Heslo</label>
                    <input type="password" name="password">
                    <input type="submit" value="Prihlasit">
                </form>
            </div>
        <?php } ?>
        <br>
        <div class="right">
            <img src="../pravy.png" class="obr">
            <h2>Japonsko</h2>
            <p>Japonsko (jap. 日本 – Nippon alebo Nihon; formálne: jap. 日本国 – Nippon-koku alebo Nihon-koku) je štát ležiaci na východnom okraji ázijského kontinentu, na východ od Číny a Kórey. Rozkladá sa od Ochotského mora na severe, po Východočínske more na juhovýchode. Zo západu ho obklopuje Japonské more a z východu a juhu Tichý oceán.</p>
        </div>
    </div>
    <div class="col-1 col-s-0">

    </div>
</div>

</div>

<div>
    <div class="col-3">

    </div>
    <div class="col-6">
        <div class="footer">
            <p>Autor stránky - Daniel Závodský.</p>
        </div>
    </div>
    <div class="col-3">

    </div>
</div>
</body>
</html>
