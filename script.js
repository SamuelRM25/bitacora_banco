const sql = require('mssql');
const { Client } = require('pg');

document.getElementById('login-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Evita el envío predeterminado del formulario
    login(); // Llama a la función login() cuando se envía el formulario
});

function login() {
    // Obtener los valores de usuario y contraseña
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    // Realizar comprobación de usuario y contraseña
    if (username === 'Samuel' && password === 'patito248') {
        // Redirigir a la página "hola-mundo.html"
        window.location.href = 'hola-mundo.html';
    } else {
        // Mostrar un mensaje de error
        alert('Credenciales incorrectas');
    }
};

// Función para manejar el evento de envío del formulario de inicio de sesión
document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Evita que el formulario se envíe automáticamente

    // Obtiene los valores de usuario y contraseña ingresados
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    // Aquí puedes agregar la lógica para verificar las credenciales en la base de datos
    if (verificarCredenciales(username, password)) {
        // Si las credenciales son correctas, redirige al usuario a la página "hola-mundo.html"
        window.location.href = "hola-mundo.html";
    } else {
        // Si las credenciales son incorrectas, muestra un mensaje de error o realiza alguna acción adicional
        alert("Usuario o contraseña incorrectos");
    }
});

// Función para verificar las credenciales (ejemplo)
async function verificarCredenciales(username, password) {
        try {
        // Configuración de la conexión a la base de datos PostgreSQL
        const client = new Client({
            user: 'postgres',
            password: 'root',
            host: 'localhost',
            port: 5432,
            database: 'Basededatos'
        });

        // Conectarse a la base de datos
        await client.connect();

        // Verificar las credenciales en la base de datos
        const query = `SELECT * FROM usuarios WHERE username = $1 AND password = $2`;
        const result = await client.query(query, [username, password]);

        // Cerrar la conexión a la base de datos
        await client.end();

        // Devolver true si las credenciales son válidas, false en caso contrario
        return result.rowCount > 0;
    } catch (error) {
    console.error('Error al verificar las credenciales en la base de datos:', error.message);
    return username === "usuario" && password === "contraseña";
    }
};

// Función para enviar informes a la base de datos

async function sendReportToDatabase(report) {
    try {
        // Configuración de la conexión a la base de datos PostgreSQL
        const client = new Client({
            user: 'postgres',
            password: 'root',
            host: 'localhost',
            port: 5432,
            database: 'Basededatos'
        });

        // Conectarse a la base de datos
        await client.connect();

        // Insertar el informe en la base de datos
        const query = `INSERT INTO reports (timestamp, report) VALUES (CURRENT_TIMESTAMP, $1)`;
        await client.query(query, [report]);

        // Cerrar la conexión a la base de datos
        await client.end();
    } catch (error) {
        console.error('Error al enviar el informe a la base de datos:', error.message);
    }
};

document.addEventListener("DOMContentLoaded", function() {
    const loginForm = document.getElementById("loginForm");
    const sessionOptions = document.getElementById("sessionOptions");
    const logoutButton = document.getElementById("logoutButton");
    const accountStatementButton = document.getElementById("accountStatementButton");
    const makeTransactionButton = document.getElementById("makeTransactionButton");
    const simulateTransactionButton = document.getElementById("simulateTransactionButton");
    const reportContainer = document.getElementById("reportContainer");

    let loggedIn = false;
    let username = "";

    loginForm.addEventListener("submit", function(event) {
        event.preventDefault();
            
        
    })
});

logoutButton.addEventListener("click", function() {
    loggedIn = false;
    sessionOptions.style.display = "none";
    loginForm.style.display = "block";
    username = "";
});

accountStatementButton.addEventListener("click", function() {
    // Aquí iría la lógica para solicitar el estado de
    accountStatementButton.addEventListener("click", async function() {
        try {
            // Obtener el estado de cuenta del usuario actual desde la base de datos
            const accountStatement = await getAccountStatement(username);
        
            // Mostrar el estado de cuenta en la página
            displayAccountStatement(accountStatement);
        } catch (error) {
            console.error('Error al solicitar el estado de cuenta:', error.message);
        }
    });
    // Aquí iría el código para obtener el estado de cuenta del usuario actual
    // y mostrarlo en la página
    function displayAccountStatement(accountStatement) {
        const accountStatementElement = document.getElementById('accountStatement');
        
        // Limpiar el contenido existente
        accountStatementElement.innerHTML = '';
        
        // Crear una tabla para mostrar el estado de cuenta
        const table = document.createElement('table');
        
        // Crear encabezados de tabla
        const headerRow = document.createElement('tr');
        const headers = ['Fecha', 'Descripción', 'Cantidad'];
        headers.forEach(headerText => {
            const header = document.createElement('th');
            header.textContent = headerText;
            headerRow.appendChild(header);
        });
        table.appendChild(headerRow);
        
        // Agregar filas de datos al estado de cuenta
        accountStatement.forEach(entry => {
            const row = document.createElement('tr');
        
            // Agregar celdas de datos
            const dateCell = document.createElement('td');
            dateCell.textContent = entry.date;
            row.appendChild(dateCell);
        
            const descriptionCell = document.createElement('td');
            descriptionCell.textContent = entry.description;
            row.appendChild(descriptionCell);
        
            const amountCell = document.createElement('td');
            amountCell.textContent = entry.amount;
            row.appendChild(amountCell);
        
            table.appendChild(row);
        });
        
        // Agregar la tabla al elemento del estado de cuenta en la página
        accountStatementElement.appendChild(table);
    }
    // Aquí iría el código para obtener el estado de cuenta del usuario desde la base de datos
    const { Client } = require('pg');

    async function getAccountStatement(username) {
        try {
            // Configuración de la conexión a la base de datos PostgreSQL
            const client = new Client({
                user: 'postgres',
                password: 'root',
                host: 'localhost',
                port: 5432,
                database: 'Basededatos'
            });

            // Conectarse a la base de datos
            await client.connect();

            // Obtener el estado de cuenta del usuario desde la base de datos
            const query = `SELECT * FROM account_statement WHERE username = $1`;
            const result = await client.query(query, [username]);

            // Cerrar la conexión a la base de datos
            await client.end();

            // Devolver el resultado de la consulta
            return result.rows;
        } catch (error) {
            console.error('Error al obtener el estado de cuenta desde la base de datos:', error.message);
            return [];
        }
    }
});


