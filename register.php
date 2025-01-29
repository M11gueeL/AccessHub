<?php
session_start();
require_once 'includes/config.php';
require_once 'includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (isEmailTaken($pdo, $email)) {
        $error = "El email ya está registrado.";
    } elseif (isUsernameTaken($pdo, $username)) {
        $error = "El nombre de usuario ya está en uso.";
    } else {
        if (registerUser($pdo, $fullname, $username, $email, $password)) {
            $_SESSION['success'] = "Registro exitoso. Por favor, inicia sesión.";
            header("Location: login.php");
            exit();
        } else {
            $error = "Error al registrar el usuario.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Registro</title>
    <style>
        .fade-out {
            animation: fadeOut 3s forwards;
        }
        @keyframes fadeOut {
            from { opacity: 1; }
            to { opacity: 0; }
        }
    </style>
</head>
<body class="bg-gradient-to-r from-blue-50 to-blue-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-96">
        <h1 class="text-3xl font-bold mb-4">Registro</h1>
        <?php if (isset($error)): ?>
            <div id="error-message" class="text-white bg-red-600 border border-red-400 px-4 py-3 rounded relative mb-4">
                <span class="block sm:inline"><?php echo $error; ?></span>
            </div>
        <?php endif; ?>
        <form action="" method="POST">
            <div class="mb-4">
                <label for="fullname" class="block mb-2">Nombre completo</label>
                <input type="text" id="fullname" name="fullname" required class="w-full px-3 py-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="username" class="block mb-2">Nombre de usuario</label>
                <input type="text" id="username" name="username" required class="w-full px-3 py-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="email" class="block mb-2">Email</label>
                <input type="email" id="email" name="email" required class="w-full px-3 py-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="password" class="block mb-2">Contraseña</label>
                <input type="password" id="password" name="password" required class="w-full px-3 py-2 border rounded">
            </div>
            <button type="submit" class="bg-green-600 w-full text-white py-3 rounded-lg text-center font-semibold hover:bg-green-700 transition">Registrarse</button>
        </form>
        <p class="mt-4">¿Ya tienes una cuenta? <a href="login.php" class="text-blue-500">Inicia sesión</a></p>
    </div>
    <script>
        setTimeout(function() {
            var errorMessage = document.getElementById('error-message');
            if (errorMessage) {
                errorMessage.classList.add('fade-out');
                setTimeout(function() {
                    errorMessage.style.display = 'none';
                }, 3000);
            }
        }, 5000); // Desaparece después de 5 segundos
    </script>
</body>
</html>
