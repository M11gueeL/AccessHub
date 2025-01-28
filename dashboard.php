<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-50 to-blue-100 min-h-screen flex items-center justify-center">
    <div class="container mx-auto p-8 bg-white rounded-lg shadow-lg max-w-2xl">
        <h1 class="text-3xl font-extrabold mb-6 text-gray-800 text-center">¡Bienvenido, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        <p class="text-center text-gray-600 mb-8">Esta es tu página de dashboard. En el futuro, aquí podrás gestionar todas tus tareas y configuraciones.</p>
        <div class="flex justify-center">
            <a href="logout.php" class="bg-red-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-red-700 transition">Cerrar Sesión</a>
        </div>
    </div>
</body>
</html>
