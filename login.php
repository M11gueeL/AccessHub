<?php
session_start();
require_once 'includes/config.php';
require_once 'includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = loginUser($pdo, $username, $password);
    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-50 to-blue-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-96">
        <h1 class="text-3xl font-bold mb-4">Iniciar Sesión</h1>
        <?php if (isset($error)): ?>
            <p class="text-red-500 mb-4"><?php echo $error; ?></p>
        <?php endif; ?>
        <?php if (isset($_SESSION['success'])): ?>
            <p class="text-green-500 mb-4"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></p>
        <?php endif; ?>
        <form action="" method="POST">
            <div class="mb-4">
                <label for="username" class="block mb-2">Nombre de usuario</label>
                <input type="text" id="username" name="username" required class="w-full px-3 py-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="password" class="block mb-2">Contraseña</label>
                <input type="password" id="password" name="password" required class="w-full px-3 py-2 border rounded">
            </div>
            <button type="submit" class="bg-blue-600 w-full text-white py-3 rounded-lg text-center font-semibold hover:bg-blue-700 transition">Iniciar Sesión</button>
        </form>
        <p class="mt-4">¿No tienes una cuenta? <a href="register.php" class="text-blue-500">Regístrate</a></p>
    </div>
</body>
</html>
