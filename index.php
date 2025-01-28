<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-50 to-blue-100 flex items-center justify-center h-screen">
    <div class="bg-white p-10 rounded-lg shadow-lg max-w-md w-full">
        <h1 class="text-3xl font-extrabold mb-6 text-center text-gray-800">Bienvenido</h1>
        <p class="text-center text-gray-600 mb-8">Por favor, elige una opción para continuar</p>
        <div class="grid grid-rows-2 gap-4">
            <a href="login.php" class="bg-blue-600 text-white py-3 rounded-lg text-center font-semibold hover:bg-blue-700 transition">Iniciar Sesión</a>
            <a href="register.php" class="bg-green-600 text-white py-3 rounded-lg text-center font-semibold hover:bg-green-700 transition">Registrarse</a>
        </div>
    </div>
</body>
</html>
