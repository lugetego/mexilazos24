let elm = document.getElementById('registro_status');

document.getElementById("div_otro").hidden = true;

document.getElementById("registro_status").addEventListener(
    "change",
    (event) => {
//        console.log(event.target.value);  // Mostrar el valor seleccionado en la consola

        if (event.target.value === "Otro") {
            document.getElementById("div_otro").hidden = false;
        } else {
            document.getElementById("div_otro").hidden = true;
        }
    },
    false
);





/*
document.getElementById("div_registro_vegetariano").hidden = true;
document.getElementById("div2_registro_vegetariano").hidden = false;

document.getElementById("registro_vegetariano").addEventListener(
    "click",
    () => {
        if ( elm.checked ) {
            document.getElementById("div_registro_vegetariano").hidden = false;
            document.getElementById("div2_registro_vegetariano").hidden = true;
        }
        else {
            document.getElementById("div_registro_vegetariano").hidden = true;
            document.getElementById("div2_registro_vegetariano").hidden = false;
        }
    },
    false
);*/



