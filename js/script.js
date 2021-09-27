function kszerkesztes() {
    var elements = document.querySelectorAll("#kilista");
    var elements_classname = document.getElementById("kilista").className;
    if(elements_classname === 'hide')
    {
        for(let i = 0; i < elements.length; i++)
        {
            elements[i].classList.remove('hide');
        }
    }
    else {
        for(let i = 0; i < elements.length; i++)
        {
            elements[i].classList.add('hide');
        }
    }
}

function bszerkesztes() {
    var elements = document.querySelectorAll("#belista");
    var elements_classname = document.getElementById("belista").className;
    if(elements_classname === 'hide')
    {
        for(let i = 0; i < elements.length; i++)
        {
            elements[i].classList.remove('hide');
        }
    }
    else {
        for(let i = 0; i < elements.length; i++)
        {
            elements[i].classList.add('hide');
        }
    }
}

function bevetelSzerk() {
    var input = document.getElementById("belista").value;

    var tipus = document.getElementById("tipus" + input);
    var megnevezes = document.getElementById("megnevezes" + input);
    var ar = document.getElementById("ar" + input);
    var datum = document.getElementById("datum" + input);

    console.log("Szerkesztett adatok: \nTípus: "+tipus.innerHTML+"\nMegnevezés: "+megnevezes.innerHTML+"\nÁr: "+ar.innerHTML+"\nDátum: "+datum.innerHTML);
    /*
    console.log(tipus.innerHTML)
    console.log(megnevezes.innerHTML)
    console.log(ar.innerHTML)
    console.log(datum.innerHTML)
    */

    var elements = document.querySelectorAll("#input"+input);

    if(elements[0].className === 'hide')
    {
        for(let i = 0; i < elements.length; i++)
        {
            elements[i].classList.remove('hide');
            tipus.classList.add('hide');
            megnevezes.classList.add('hide');
            ar.classList.add('hide');
            datum.classList.add('hide');
        }
    } else {
        for(let i = 0; i < elements.length; i++)
        {
            elements[i].classList.add('hide');
            tipus.classList.remove('hide');
            megnevezes.classList.remove('hide');
            ar.classList.remove('hide');
            datum.classList.remove('hide');
        }
    }
}

function bementes() {
    var input = document.getElementById("belista").value;

    var elements = document.querySelectorAll("#adat"+input);

    console.log("tipus: " + elements[0].value);
    console.log("megnevezes: " + elements[1].value);
    console.log("ar: " + elements[2].value);
    console.log("datum: " + elements[3].value);

    var tipus = elements[0].toString();
    var megnevezes = elements[1].toString();
    var ar = elements[2].toString();
    var datum = elements[3].toString();

    //sendPHP(elements[0].toString(), elements[1], elements[2], elements[3], "1000", "kuki");
    sendPHP(tipus, megnevezes, ar, datum, "1000", "kuki");
}

function sendPHP(tipus, megnevezes, ar, datum, days, name) {
    var expires = "";      
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    var value = tipus+","+megnevezes+","+ar+","+datum;      
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}