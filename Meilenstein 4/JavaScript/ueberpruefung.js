/*
Geht alle Felder in form durch und überprüft ob was drinnen steht.
Steht etwas in dem Feld drinnen wird die funktion zum überprüfen der Eingabe aufgerufen
 */
function validateForm() {
    var arrayLength = document.forms["form"].length,formvalid = true,fieldvalid=true;
    for (var i = 0; i < arrayLength; i++) {
        var field= document.forms["form"][i];
        if (field.nodeName !== "INPUT" && field.nodeName !== "TEXTAREA" ) continue;
        fieldvalid = checkfield(field);
        console.log("field validity: "+fieldvalid);
        if (fieldvalid) {
            field.style.border="0px solid";
        }
        else {
            field.focus();
            field.style.border="red 1px solid";
            formvalid = false;
        }



    }

    if(!formvalid)alert("Einige Eingaben sind fehlerhaft. Bitte überprüfen Sie ihre Eingaben");
    console.log("formvalid: "+formvalid);
    return formvalid;
}

/*
Funktion zu überprüfung der Eingabe durch Pattern und zur Überprüfung der minimalen und maximalen Länge
 */
function checkfield(field) {
    var
        valid="true",
        pattern = field.getAttribute("pattern"),
        name = field.getAttribute("name"),
        type=field.getAttribute("type"),
        chkbox = (type === "checkbox" || type === "radio"),
        required = field.getAttribute("required"),
        minlength = field.getAttribute("minlength"),
        maxlength = field.getAttribute("maxlength"),
        val = field.value;
    valid = valid && (!required ||
    (chkbox && field.checked) ||
    (!chkbox && val !== "")
    );
    valid = valid && (chkbox || (
    (!minlength || val.length >= minlength) &&
    (!maxlength || val.length <= maxlength)
    ));

    //Überprüfen der RegEx
    if (valid && pattern) {
        pattern = new RegExp(pattern);
        valid = pattern.test(val);
        console.log(pattern.test(val));
    }
    //Überprüfung des Jahres
    if(valid&&(name=="musicerscheinungsjahr" || name=="filmerscheinungsjahr")){
        if(val>2014){
            valid=false;}
    }
    console.log("name: "+name+" valid:"+valid)
    return valid;
}