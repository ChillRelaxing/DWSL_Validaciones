<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios</title>
    <style>
        .error {
            color: red;
        }
        .success {
            color: green;
        }
    </style>
</head>

<body>
    <form id="evaluacionForm">
        <label for="nombre">Digite un nombre y evalúe si inicia con M, O, P ó S:</label><br>
        <input type="text" id="nombre" required><br>
        <span id="resultadoNombre" class="error"></span>
        <hr>

        <label for="direccion">Digite una dirección e identifique si existe la palabra casa o apartamento al inicio de la cadena:</label><br>
        <input type="text" id="direccion" required><br>
        <span id="resultadoDireccion" class="error"></span>
        <hr>

        <label for="correo">Identifique al final de la cadena si el correo escrito es gmail.com:</label><br>
        <input type="email" id="correo" required><br>
        <span id="resultadoCorreo" class="error"></span>
        <hr>

        <label for="texto">Escriba un texto cualquiera e identifique cuántas palabras finalizan con "as":</label><br>
        <input type="text" id="texto" required><br>
        <span id="resultadoTexto" class="error"></span>
        <hr>

        <label for="telefono">Identificar si el número de teléfono es de casa (iniciando con 2) o celular (iniciando con 7):</label><br>
        <input type="text" id="telefono" required><br>
        <span id="resultadoTelefono" class="error"></span>
        <hr>

        <label for="compania">Identificar la compañía de celular (79 o 72 es Tigo, 77 o 75 es Movistar y 71 o 73 es Digicel):</label><br>
        <input type="text" id="compania" required><br>
        <span id="resultadoCompania" class="error"></span>
        <hr>

        <label for="genero">Identificar el patrón de género digitado en mayúsculas o minúsculas (masculino=1, femenino=2):</label><br>
        <input type="text" id="genero" required><br>
        <span id="resultadoGenero" class="error"></span>
        <hr>

        <input type="submit" value="Evaluar">
    </form>

    <script>
        document.getElementById('evaluacionForm').addEventListener('submit', function (e) {
            e.preventDefault(); // Evita el envío del formulario

            // Validación del nombre
            const nombre = document.getElementById('nombre').value;
            const resultadoNombre = document.getElementById('resultadoNombre');
            if (/^[MOPS]/i.test(nombre)) {
                resultadoNombre.textContent = "El nombre inicia con M, O, P o S.";
                resultadoNombre.className = 'success';
            } else {
                resultadoNombre.textContent = "El nombre NO inicia con M, O, P o S.";
                resultadoNombre.className = 'error';
            }

            // Validación de la dirección
            const direccion = document.getElementById('direccion').value;
            const resultadoDireccion = document.getElementById('resultadoDireccion');
            if (/^(casa|apartamento)/i.test(direccion)) {
                resultadoDireccion.textContent = "La dirección inicia con 'casa' o 'apartamento'.";
                resultadoDireccion.className = 'success';
            } else {
                resultadoDireccion.textContent = "La dirección NO inicia con 'casa' ni 'apartamento'.";
                resultadoDireccion.className = 'error';
            }

            // Validación del correo
            const correo = document.getElementById('correo').value;
            const resultadoCorreo = document.getElementById('resultadoCorreo');
            if (correo.endsWith('gmail.com')) {
                resultadoCorreo.textContent = "El correo es de Gmail.";
                resultadoCorreo.className = 'success';
            } else {
                resultadoCorreo.textContent = "El correo NO es de Gmail.";
                resultadoCorreo.className = 'error';
            }

            // Validación de palabras que terminan con "as"
            const texto = document.getElementById('texto').value;
            const resultadoTexto = document.getElementById('resultadoTexto');
            const palabras = texto.split(/\s+/);
            const countAs = palabras.filter(palabra => palabra.endsWith('as')).length;
            resultadoTexto.textContent = `El texto tiene ${countAs} palabras que terminan con "as".`;
            resultadoTexto.className = countAs > 0 ? 'success' : 'error';

            // Validación del teléfono
            const telefono = document.getElementById('telefono').value;
            const resultadoTelefono = document.getElementById('resultadoTelefono');
            if (/^2/.test(telefono)) {
                resultadoTelefono.textContent = "El número es un teléfono de casa.";
                resultadoTelefono.className = 'success';
            } else if (/^7/.test(telefono)) {
                resultadoTelefono.textContent = "El número es un celular.";
                resultadoTelefono.className = 'success';
            } else {
                resultadoTelefono.textContent = "El número NO es de casa ni celular.";
                resultadoTelefono.className = 'error';
            }

            // Validación de la compañía
            const compania = document.getElementById('compania').value;
            const resultadoCompania = document.getElementById('resultadoCompania');
            const prefijo = compania.slice(0, 2);
            if (prefijo === '79' || prefijo === '72') {
                resultadoCompania.textContent = "La compañía es Tigo.";
                resultadoCompania.className = 'success';
            } else if (prefijo === '77' || prefijo === '75') {
                resultadoCompania.textContent = "La compañía es Movistar.";
                resultadoCompania.className = 'success';
            } else if (prefijo === '71' || prefijo === '73') {
                resultadoCompania.textContent = "La compañía es Digicel.";
                resultadoCompania.className = 'success';
            } else {
                resultadoCompania.textContent = "La compañía es desconocida.";
                resultadoCompania.className = 'error';
            }

            // Validación del género
            const genero = document.getElementById('genero').value;
            const resultadoGenero = document.getElementById('resultadoGenero');
            if (genero === '1' || genero.toLowerCase() === 'masculino') {
                resultadoGenero.textContent = "El género es masculino.";
                resultadoGenero.className = 'success';
            } else if (genero === '2' || genero.toLowerCase() === 'femenino') {
                resultadoGenero.textContent = "El género es femenino.";
                resultadoGenero.className = 'success';
            } else {
                resultadoGenero.textContent = "El género no es válido.";
                resultadoGenero.className = 'error';
            }
        });
    </script>
</body>

</html>
