/*
Bekommt den File mit welcher JSON Datei er verbunden werden soll.
Öffnet die übergebene Datei, asynchron mit GET ohne Parameter Übergabe
 */
function Load(jfile) {
    json = JSON.parse(loadPage(jfile));
    function loadPage(jsonfile) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", jsonfile, false);
        xmlhttp.send();
        return xmlhttp.response;
    }

    erstelleTabelle();
}

//Erstellt die Tabelle innerhalb des div containers "Tabelle"
function erstelleTabelle() {

    var Div = document.getElementById("Tabelle");
    document.getElementById("Tabelle").innerHTML="";
    var Spalten = Object.keys(json["favoriten"][0]);

    var Zeilen = Object.keys(json["favoriten"]);

    var dummyTable = document.createElement('table');
    dummyTable.id = "TableId";
    var dummyThead = document.createElement('thead');
    dummyThead.id = 'theadId';
    dummyThead.className = 'tabellenTd';
    dummyTable.appendChild(dummyThead);
    //Überschrift
    for (var ueberschrift = 0; ueberschrift < Spalten.length; ueberschrift++) {
        dummyThead.appendChild(document.createElement('th'));
    }

    for (var zeilenStelle = 0; zeilenStelle < Zeilen.length; zeilenStelle++) {
        var dummyTr = document.createElement('tr');
        dummyTr.id = 'tr' + zeilenStelle;
        for (var spaltenStelle = 0; spaltenStelle < Spalten.length; spaltenStelle++) {
            var dummyTd = document.createElement('td');
            dummyTd.id = 'td' + spaltenStelle;
            dummyTd.className = 'tabellenTd';
            dummyTr.appendChild(dummyTd);
        }
        dummyTable.appendChild(dummyTr);
    }
    Div.appendChild(dummyTable);

    /*
    Füllt die Tabelle mit den Daten von der JSON Datei
    Der Vorgang wird solange wiederholt bis alle Daten ausgelesen wurden
     */
    function fuelleDaten() {

        for (var ueberschrift = 0; ueberschrift < Spalten.length; ueberschrift++) {
            dummyThead.children[ueberschrift].innerHTML = Spalten[ueberschrift];
        }
        var x="";
        var y=0;
        for (var datenZeile = 0; datenZeile < Zeilen.length; datenZeile++) {
            var dummyTr = document.getElementById('tr' + datenZeile);
                for (x in json["favoriten"][datenZeile]) {
                    dummyTr.children[y].innerHTML = json["favoriten"][datenZeile][x];
                    y++;
                }
            y=0;
        }

        }



    fuelleDaten();

}
/*
Verwaltet die Hintergrundfarbe während des Wechseln der Button, sowie den Aufruf der Load funktion
 */
function button(id2){

    id2.style.backgroundColor="rgb(0,162,232)";

    if(id2.id=="musicfavorite") {
        Load('C:\xampp\htdocs\WAW\trunk\Meilenstein5\php\getFavorites.php');

        window.document.getElementById("moviefavorite").style.background = "";
    }
    else{
        Load('C:\xampp\htdocs\WAW\trunk\Meilenstein5\php\getFavorites.php');
    window.document.getElementById("musicfavorite").style.background="";
    }
}

function onload(){
    window.document.getElementById("moviefavorite").style.backgroundColor="rgb(0,162,232)";
    Load('Javascript/film.json');

}