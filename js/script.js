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

function kiadasSzerk() {
    var input = document.getElementById("kilista").value;

    var tipus = document.getElementById("ktipus" + input);
    var megnevezes = document.getElementById("kmegnevezes" + input);
    var ar = document.getElementById("kar" + input);
    var datum = document.getElementById("kdatum" + input);

    console.log("Szerkesztett adatok: \nTípus: "+tipus.innerHTML+"\nMegnevezés: "+megnevezes.innerHTML+"\nÁr: "+ar.innerHTML+"\nDátum: "+datum.innerHTML);

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

function kimentes() {
    var input = document.getElementById("kilista").value;

    var elements = document.querySelectorAll("#adat"+input);

    console.log("tipus: " + elements[0].value);
    console.log("megnevezes: " + elements[1].value);
    console.log("ar: " + elements[2].value);
    console.log("datum: " + elements[3].value);

    var tipus = elements[0].value;
    var megnevezes = elements[1].value;
    var ar = elements[2].value;
    var datum = elements[3].value;

    var value = tipus+","+megnevezes+","+ar+","+datum+","+input; 

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            sendPHP(value, "1000", "keditKuki");
        }
    };
    xmlhttp.open("POST", "/includes/kedit.inc.php?");
    xmlhttp.send();

    window.location.reload();
}

function kidelete() {
    var input = document.getElementById("kilista").value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        console.log(`A ${input} id-val rendelkező sor törölve lett!`)
        sendPHP(input, "1000", "kdeleteKuki")
    };
    xmlhttp.open("POST", "/includes/kdelete.inc.php?");
    xmlhttp.send();

    window.location.reload();
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

    var tipus = elements[0].value;
    var megnevezes = elements[1].value;
    var ar = elements[2].value;
    var datum = elements[3].value;

    var value = tipus+","+megnevezes+","+ar+","+datum+","+input; 

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            sendPHP(value, "1000", "beditKuki");
        }
    };
    xmlhttp.open("POST", "/includes/bedit.inc.php?");
    xmlhttp.send();

    window.location.reload();
}

function bdelete() {
    var input = document.getElementById("belista").value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        console.log(`A ${input} id-val rendelkező sor törölve lett!`)
        sendPHP(input, "1000", "bdeleteKuki")
    };
    xmlhttp.open("POST", "/includes/bdelete.inc.php?");
    xmlhttp.send();

    window.location.reload();
}

function sendPHP(value, days, name) { 
    var expires = "";      
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
         
    document.cookie = name + "=" + (value || "")  + expires + "; path=/"
}