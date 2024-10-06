function getDatos() {
    var nombre = window.prompt("Nombre: ", "");
    var edad = prompt("Edad: ", "");

    var div1 = document.getElementById('nombre');
    div1.innerHTML = '<h3> Nombre: ' + nombre + '</h3>';

    var div2 = document.getElementById('edad');
    div2.innerHTML = '<h3> Edad: ' + edad + '</h3>';
}

function Funcion1() {
    var div3 = document.getElementById('HolaMundo');
    div3.innerHTML = '<h4>Hola Mundo</h4>';
}

function Funcion2() {
    var nombre = 'Dulce';
    var edad = 21;
    var altura = 1.50;
    var casado = false;

    var datos = document.getElementById('MostrarDatos');
    datos.innerHTML = 'Nombre: ' + nombre + '<br>';
    datos.innerHTML += 'Edad: ' + edad + '<br>';
    datos.innerHTML += 'Altura: ' + altura + '<br>';
    datos.innerHTML += 'Casada: ' + casado + '<br>';
}

function Funcion3(){
    var nombre = window.prompt("Ingresa tu nombre: ", "");
    var edad = window.prompt("Ingresa tu edad: ", "");

    var div4 = document.getElementById('nombre');
    div4.innerHTML = 'Hola ' + nombre + '</br>';
    var div5 = document.getElementById('edad');
    div5.innerHTML = 'Así que tienes ' + edad + 'años.</br>';
}

function Funcion4() {
    var valor1 = prompt('Introducir primer número:', '');
    var valor2 = prompt('Introducir segundo número', '');

    var suma = parseInt(valor1) + parseInt(valor2);
    var producto = parseInt(valor1) * parseInt(valor2);

    var resultado = '';
    resultado += 'La suma es ' + suma + '<br>';
    resultado += 'El producto es ' + producto + '<br>';

    document.getElementById('SumayMultiplica').innerHTML = resultado;
}

function Funcion5() {
    var nombre = prompt('Ingresa tu nombre:', '');
    var nota = prompt('Ingresa tu nota:', '');

    if (nota >= 4) {
        document.getElementById('siAprobo').innerHTML = nombre + ' está aprobado con un ' + nota;
    } 
}

function Funcion6() {
    var num1 = prompt('Ingresa el primer número:', '');
    var num2 = prompt('Ingresa el segundo número:', '');
    num1 = parseInt(num1);
    num2 = parseInt(num2);

    var resultado = '';
    if (num1 > num2) {
        resultado = 'El mayor es ' + num1;
    } else {
        resultado = 'El mayor es ' + num2;
    }

    document.getElementById('numMayor').innerHTML = resultado;
}

function Funcion7() {
    var nota1 = prompt('Ingresa 1ra. nota:', '');
    var nota2 = prompt('Ingresa 2da. nota:', '');
    var nota3 = prompt('Ingresa 3ra. nota:', '');

    nota1 = parseInt(nota1);
    nota2 = parseInt(nota2);
    nota3 = parseInt(nota3);

    var pro = (nota1 + nota2 + nota3) / 3;
    var resultado = '';

    if (pro >= 7) {
        resultado = 'aprobado';
    } else if (pro >= 4) {
        resultado = 'regular';
    } else {
        resultado = 'reprobado';
    }

    document.getElementById('ResultadoPromedio').innerHTML = resultado;
}

function Funcion8() {
    var valor = prompt('Ingresa un valor entre 1 y 5:', '');
    valor = parseInt(valor);
    var resultado = '';
    switch (valor) {
        case 1: 
            resultado = 'uno';
            break;
        case 2: 
            resultado = 'dos';
            break;
        case 3: 
            resultado = 'tres';
            break;
        case 4: 
            resultado = 'cuatro';
            break;
        case 5: 
            resultado = 'cinco';
            break;
        default:
            resultado = 'debe ingresar un valor comprendido entre 1 y 5.';
            break;
    }

    document.getElementById('MostrarValor').innerHTML = resultado;
}

function Funcion9() {
    var col = prompt('Ingresa el color con que quieras pintar el fondo de la ventana (rojo, verde, azul):', '');
    var colorHex = '';

    switch (col.toLowerCase()) {
        case 'rojo':
            colorHex = '#ff0000';
            break;
        case 'verde':
            colorHex = '#00ff00';
            break;
        case 'azul':
            colorHex = '#0000ff';
            break;
        default:
            colorHex = '';
            break;
    }

    if (colorHex) {
        document.body.style.backgroundColor = colorHex;
    } else {
        document.getElementById('ColorFondo').innerHTML = 'Color no válido. Ingresa rojo, verde o azul.';
    }
}

function Funcion10() {
    var x = 1;
    var resultado = '';

    while (x <= 100) {
        resultado += x + '<br>';
        x = x + 1;
    }

    document.getElementById('ImprimirNum1_100').innerHTML = resultado;
}

function Funcion11() {
    var x = 1;
    var suma = 0;
    var valor;

    while (x <= 5) {
        valor = prompt('Ingresa el valor:', '');
        valor = parseInt(valor);
        if (!isNaN(valor)) {
            suma = suma + valor;
            x = x + 1;
        } else {
            alert('Por favor, ingresa un número válido.');
        }
    }

    document.getElementById('Suma5val').innerHTML = "La suma de los valores es " + suma + "<br>";
}

function Funcion12() {
    var valor;
    var resultado = '';

    do {
        valor = prompt('Ingresa un valor entre 0 y 999:', '');
        valor = parseInt(valor);

        if (!isNaN(valor) && valor >= 0 && valor <= 999) {
            resultado += 'El valor ' + valor + ' tiene ';
            if (valor < 10) {
                resultado += '1 dígito';
            } else if (valor < 100) {
                resultado += '2 dígitos';
            } else {
                resultado += '3 dígitos';
            }
            resultado += '<br>';
        } else {
            alert('Por favor, ingresa un valor válido entre 0 y 999.');
        }

    } while (valor !== 0);

    document.getElementById('numDigitos').innerHTML = resultado;
}

function Funcion13() {
    var f;
    var resultado = '';

    for (f = 1; f <= 10; f++) {
        resultado += f + " ";
    }

    document.getElementById('num1_10').innerHTML = resultado;
}

function Funcion14() {

    const mensaje = 'Cuidado<br>Ingresa tu documento correctamente<br>';
    const contenedor = document.getElementById('Mostrar3Msj'); 

    contenedor.innerHTML += mensaje; 
    contenedor.innerHTML += mensaje; 
    contenedor.innerHTML += mensaje; 
}

function mostrarMensaje() {
    var mensaje = "Cuidado<br>Ingresa tu documento correctamente<br>";
    document.getElementById('MostrarMsjconFunc').innerHTML += mensaje; 
}

function Funcion15() {
    mostrarMensaje();
    mostrarMensaje();
    mostrarMensaje();
}

function Funcion16(x1, x2) {
    var inicio;
    var resultado = '';
    for (inicio = x1; inicio <= x2; inicio++) {
        resultado += inicio + ' '; 
    }
    document.getElementById('ObtenerRango').innerHTML = resultado;
}

function obtenerValores() {
    var valor1 = parseInt(prompt('Ingresa el valor inferior:', ''));
    var valor2 = parseInt(prompt('Ingresa el valor superior:', ''));
    Funcion16(valor1, valor2);
}

function Funcion17(x) {
    if (x == 1) return "uno";
    else if (x == 2) return "dos";
    else if (x == 3) return "tres";
    else if (x == 4) return "cuatro";
    else if (x == 5) return "cinco";
    else return "valor incorrecto";
}

function obtenerValor1() {
    var valor = parseInt(prompt("Ingresa un valor entre 1 y 5", ""));
    if (isNaN(valor)) {
        document.getElementById('ConvertirCastellanoAnidado').innerHTML = "Por favor ingresa un número válido.";
        return;
    }
    var r = Funcion17(valor);
    document.getElementById('ConvertirCastellanoAnidado').innerHTML = r; 
}

function Funcion18(x) {
    switch (x) {
        case 1: return "uno";
        case 2: return "dos";
        case 3: return "tres";
        case 4: return "cuatro";
        case 5: return "cinco";
        default: return "valor incorrecto";
    }
}

function obtenerValor2() {
    var valor = parseInt(prompt("Ingresa un valor entre 1 y 5", ""));
    var resultado = Funcion18(valor);
    document.getElementById('ConvertirCastellanoSwitch').innerHTML = resultado;
}
