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
    <title>Atletika</title>

    <script src="triedenie.js"></script>
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
            <h1>Atletika</h1>
            <p>Athletics at the 2020 Summer Olympics were held during the last ten days of the Games. They were due to be held from 31 July – 9 August 2020, at the Olympic Stadium in Tokyo, Japan. Due to the COVID-19 pandemic, the games were postponed to 2021, with the track and field events set for 30 July – 8 August 2021. The sport of athletics at these Games was split into three distinct sets of events: track and field events, remaining in Tokyo, and road running events and racewalking events, moved to Sapporo. A total of 48 events were held, one more than in 2016, with the addition of a mixed relay event.
            </p>
            <p>Usporiadaj tabuľku podľa:</p>
            <p><button onclick="refreshTable()">Pôvodné</button><button onclick="sortTable(0)">Disciplína</button><button onclick="sortTable(1)">Víťaz</button><button onclick="sortTable(2)">Krajina</button></p>
            <table id="mojaTabulka">
                <tr>
                    <th>Disciplína</th>
                    <th>Víťaz</th>
                    <th>Krajina</th>
                </tr>
                <tr>
                    <td>100 metrov</td>
                    <td>Marcel Jacobs</td>
                    <td>Taliansko</td>
                </tr>
                <tr>
                    <td>200 metrov</td>
                    <td>Andre De Grasse</td>
                    <td>Kanada</td>
                </tr>
                <tr>
                    <td>400 metrov</td>
                    <td>Steven Gardiner</td>
                    <td>Bahamy</td>
                </tr>
                <tr>
                    <td>800 metrov</td>
                    <td>Emmanuel Korir</td>
                    <td>Keňa</td>
                </tr>
                <tr>
                    <td>1500 metrov</td>
                    <td>Jakob Ingebrigtsen</td>
                    <td>Nórsko</td>
                </tr>
                <tr>
                    <td>5000 metrov</td>
                    <td>Joshua Cheptegei</td>
                    <td>Uganda</td>
                </tr>
                <tr>
                    <td>10000 metrov</td>
                    <td>Selemon Barega</td>
                    <td>Etiópia</td>
                </tr>
                <tr>
                    <td>110 metrov prekážok</td>
                    <td>Hansle Parchment</td>
                    <td>Jamajka</td>
                </tr>
                <tr>
                    <td>400 metrov prekážok</td>
                    <td>Karsten Warholm</td>
                    <td>Nórsko</td>
                </tr>
                <tr>
                    <td>3000 metrov prekážok</td>
                    <td>Soufiane El Bakkali</td>
                    <td>Maroko</td>
                </tr>
                <tr>
                    <td>Maratón</td>
                    <td>Eliud Kipchoge</td>
                    <td>Keňa</td>
                </tr>
                <tr>
                    <td>20 km chôdza</td>
                    <td>Massimo Stano</td>
                    <td>Taliansko</td>
                </tr>
                <tr>
                    <td>50 km chôdza</td>
                    <td>Dawid Tomala</td>
                    <td>Poľsko</td>
                </tr>
                <tr>
                    <td>Skok do výšky</td>
                    <td>Gianmarco Tamberi <br> Mutaz Essa Barshim</td>
                    <td>Taliansko <br> Katar</td>
                </tr>
                <tr>
                    <td>Skok o tyči</td>
                    <td>Armand Duplantis</td>
                    <td>Švédsko</td>
                </tr>
                <tr>
                    <td>Skok do ďiaľky</td>
                    <td>Miltiadis Tentoglou</td>
                    <td>Grécko</td>
                </tr>
                <tr>
                    <td>Trojskok</td>
                    <td>Pedro Pichardo</td>
                    <td>Portugalsko</td>
                </tr>
                <tr>
                    <td>Vrh guľou</td>
                    <td>Ryan Crouser</td>
                    <td>USA</td>
                </tr>
                <tr>
                    <td>Hod diskom</td>
                    <td>Daniel Ståhl</td>
                    <td>Švédsko</td>
                </tr>
                <tr>
                    <td>Hod kladivom</td>
                    <td>Wojciech Nowicki</td>
                    <td>Poľsko</td>
                </tr>
                <tr>
                    <td>Hod oštepom</td>
                    <td>Neeraj Chopra</td>
                    <td>India</td>
                </tr>
                <tr>
                    <td>Desaťboj</td>
                    <td>Damian Warner</td>
                    <td>Kanada</td>
                </tr>
                <tr>
                    <td>4x100 metrov</td>
                    <td>Lorenzo Patta<br>Marcell Jacobs<br>Fausto Desalu<br>Filippo Tortu</td>
                    <td>Taliansko</td>
                </tr>
                <tr>
                    <td>4x400 metrov</td>
                    <td>Michael Cherry<br>Michael Norman<br>Bryce Deadmon<br>Rai Benjamin</td>
                    <td>USA</td>
                </tr>
            </table>
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
                    <input type="text" name="login">
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
	<div class="col-6">]
		<div class="footer">
  			<p>Autor stránky - Daniel Závodský.</p>
  		</div>
	</div>
	<div class="col-3">

	</div>
</div>
</body>
</html>