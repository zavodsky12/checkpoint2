function sortTable(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("mojaTabulka");
    switching = true;
    //ascending = vzostupne
    dir = "asc";
    //kym menime, pokracujeme v cykle
    while (switching) {
        //zatial ziadna zmena
        switching = false;
        rows = table.rows;
        //prejdem kazdy stlpec, kym nenajdeme opacne stlpce
        for (i = 1; i < (rows.length - 1); i++) {
            //zatial nic
            shouldSwitch = false;
            //porovname dva po sebe iduce riadky
            x = rows[i].getElementsByTagName("TD")[n];
            y = rows[i + 1].getElementsByTagName("TD")[n];
            //console.log(x);
            //console.log(y);
            //tu skontrulujem, ci idem menit
            switch (n) {
                case 0:
                    shouldSwitch = klasicky(x, y, dir);
                    break;
                case 1:
                    shouldSwitch = podlaDruheeho(x, y, dir);
                    break;
                case 2:
                    shouldSwitch = klasicky(x, y, dir);
                    break;
            }
            if (shouldSwitch) {
                break;
            }
        }
        if (shouldSwitch) {
            //ak sme po skonceni cyklu nieco menili, treba ho prejst znova
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            //pocet vymen celkovo
            switchcount ++;
        } else {
            //ak sme presli celu tabulku a ta je krasne zoradena BEZ JEDINEJ VYMENY, znamena to, ze uz sme ju raz zoradovali a treba zoradovat opacne
            if (switchcount == 0 && dir == "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
}
function refreshTable() {
    // refreshes the table
    /*var table = document.getElementById ("mojaTabulka");
    var rows = table.rows;
    for (var i = 1; i < (rows.length - 1); i++) {
        rows[i] = window.riadky[i];
    }*/
    location.reload();
}
function klasicky(x, y, dir) {
    if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
            //ak menim, prerus cyklus
            return true;
        }
    } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
            //ak menim, prerus cyklus
            return true;
        }
    }
    return false;
}
function podlaDruheeho(x, y, dir) {
    var xx = x.innerHTML.toString().split(" ");
    var yy = y.innerHTML.toString().split(" ");
    if (dir == "asc") {
        if (xx[1].localeCompare(yy[1]) == 1) {
            //ak menim, prerus cyklus
            return true;
        }
    } else if (dir == "desc") {
        if (xx[1].localeCompare(yy[1]) == -1) {
            //ak menim, prerus cyklus
            return true;
        }
    }
    return false;
}