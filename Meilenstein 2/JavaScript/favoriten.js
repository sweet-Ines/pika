var jsonfilm;
var jsonMusik;




function erstellefilmTabelle() {

    var filmDiv = document.getElementById("messeTabelle");
    var filmSpalten = jsonfilm.header.length;
    var filmZeilen = jsonfilm.data.messe.length

    var dummyTable = document.createElement('table');
    dummyTable.id = "messeTableId";
    var dummyThead = document.createElement('thead');
    dummyThead.id = 'theadId';
    dummyThead.className = 'tabellenTd';
    dummyTable.appendChild(dummyThead);

    for (var ueberschrift = 0; ueberschrift < messeSpalten; ueberschrift++) {
        dummyThead.appendChild(document.createElement('th'));
    }

    for (var zeilenStelle = 0; zeilenStelle < filmZeilen; zeilenStelle++) {
        var dummyTr = document.createElement('tr');
        dummyTr.id = 'tr' + zeilenStelle;
        for (var spaltenStelle = 0; spaltenStelle < messeSpalten; spaltenStelle++) {
            var dummyTd = document.createElement('td');
            dummyTd.id = 'td' + spaltenStelle;
            dummyTd.className = 'tabellenTd';
            dummyTr.appendChild(dummyTd);
        }
        dummyTable.appendChild(dummyTr);
    }
    filmDiv.appendChild(dummyTable);

    function fuellefilmDaten() {

        for (var ueberschrift = 0; ueberschrift < jsonfilm.header.length; ueberschrift++) {
            dummyThead.children[ueberschrift].innerHTML = jsonfilm.header[ueberschrift];
        }
        var temp=0;
        for (var datenZeile = 0; datenZeile < jsonfilm.data.messe.length; datenZeile++) {
            var dummyTr = document.getElementById('tr' + datenZeile);
            for (var datenSpalte = 0; datenSpalte < dummyTr.children.length; datenSpalte++) {
                dummyTr.children[datenSpalte].innerHTML = jsonfilm.data[Object.keys(jsonfilm.data)[datenSpalte]][temp];

            }
            temp++;
            if (temp == dummyTr.children.length+1) {
                temp = 0;
            }
        }

    }

    fuellefilmDaten();

}


function onLoad() {
    jsonfilm = JSON.parse(loadPage("/../pika/Meilenstein 2/JavaScript/film.json"));
    jsonMusik = JSON.parse(loadPage("/../Meilenstein 2/JavaScript/musik.json"));
    function loadPage(url) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", url, false);
        xmlhttp.send();
        return xmlhttp.response;
    }

    erstellefilmTabelle();
}

function erstelleTabellenRahmen(tabelle, spalten, zeilen) {
    if (document.getElementById('nt')) {
        document.getElementById('nt').remove();
    }
    var dummyThead = document.createElement('thead');
    dummyThead.id = 'theadId';
    dummyThead.className = 'tabellenTd';
    tabelle.appendChild(dummyThead);

    //Setze PlaceHolder für Überschriftrn
    for (var ueberschrift = 0; ueberschrift < spalten; ueberschrift++) {
        dummyThead.appendChild(document.createElement('th'));
    }

    for (var zeilenStelle = 0; zeilenStelle < zeilen; zeilenStelle++) {
        var dummyTr = document.createElement('tr');
        dummyTr.id = 'tr' + zeilenStelle;
        for (var spaltenStelle = 0; spaltenStelle < spalten; spaltenStelle++) {
            var dummyTd = document.createElement('td');
            dummyTd.id = 'td' + spaltenStelle;
            dummyTd.className = 'tabellenTd';
            dummyTr.appendChild(dummyTd);
        }
        tabelle.appendChild(dummyTr);
    }

}

function fülleDaten(newTable, data) {
    var daten = jsonMusik[data];
    var tabellenHead = document.getElementById('theadId');
    //Fülle Kopf der Tabelle.
    for (var headerZeile = 0; headerZeile < tabellenHead.children.length; headerZeile++) {
        //alert(daten.header[headerZeile]); //DEBUG-OUTPUT
        tabellenHead.children[headerZeile].innerHTML = daten.header[headerZeile];
    }
    //Fülle Daten der Tabelle
    var temp = 0;
    for (var datenZeile = 0; datenZeile < daten.data.name.length; datenZeile++) {
        var dummyTr = document.getElementById('tr' + datenZeile);
        for (var datenSpalte = 0; datenSpalte < dummyTr.children.length; datenSpalte++) {
            dummyTr.children[datenSpalte].innerHTML = daten.data[Object.keys(daten.data)[datenSpalte]][temp];

        }
        temp++;
        if (temp == dummyTr.children.length) {
            temp = 0;
        }
    }

}


function tabellenOperation(hauptDiv, clickedElement) {

    var newTable = löscheUndErzeugeTabelle();
    var defaultString = 'cebit';
    if (clickedElement) {
        defaultString = clickedElement;
    }
    erstelleTabellenRahmen(newTable, Object.keys(jsonMusik[defaultString].data).length,
        jsonMusik[defaultString].data.name.length);
    hauptDiv.appendChild(newTable);
    fülleDaten(newTable, defaultString);

    function löscheUndErzeugeTabelle() {
        if(document.getElementById('filmTableId')){
            document.getElementById('filmTableId').remove();
        }
        if (document.getElementById('nt')) {
            document.getElementById('nt').remove();
        }
        var newTable = document.createElement('table');
        newTable.className = 'filmTableId';

        newTable.id = 'nt';
        return newTable;
    }
}
function onClickmusik() {
    var musikTH = document.getElementById("musik");
    var filmTH = document.getElementById("film");
    if (musikTH.className == "hintergrundDunkelBlau") {
        // mache nichts
    } else {
        musikTH.setAttribute("class", "hintergrundDunkelBlau");
        filmTH.setAttribute("class", "");

        //film Tabelle auf unsichtbar stellen
        var filmTabelle = document.getElementById("filmTabelle");
        filmTabelle.setAttribute("class", "filmTabelleInvisible");

        // kleine Navi einbleden
        var kleineNaviId = document.getElementById("kleineNavigation");
        kleineNaviId.setAttribute("class", "kleineNavigationVisible");

        var hauptDiv = document.getElementById('kleineNavigation');
        tabellenOperation(hauptDiv, null);
    }
}


function onClickfilm() {
    var filmTH = document.getElementById("film");
    var musikTH = document.getElementById("musik");

    if (filmTH.className == "hintergrundDunkelBlau") {
        // mache nichts
    } else {
        filmTH.setAttribute("class", "hintergrundDunkelBlau");
        musikTH.setAttribute("class", "");

        //kleinen Navi ausblenden
        var kleineNaviId = document.getElementById("kleineNavigation");
        kleineNaviId.setAttribute("class", "kleineNavigationInvisible");

        // film Tabelle einblenden
        var filmTabelle = document.getElementById("filmTabelle");
        filmTabelle.setAttribute("class", "filmTabelleVisible");
        erstellefilmTabelle();
    }





}
