<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-gray-100 text-gray-900 flex items-center justify-center h-screen">
<header class="bg-green-800 text-white p-4 flex justify-between items-center shadow-md">
        <h1 class="text-xl font-bold">Guardian</h1>
        <nav class="flex gap-4">
            <a href="painel.php" class="flex items-center gap-2 px-4 py-2 hover:underline">
                <i data-lucide="log-in"></i> Painel
            </a>
           
        </nav>
    </header>

    <div class="max-w-md w-full p-6 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-bold mb-4 text-center">Painel</h2>

        <?php if (isset($_GET['error'])) { ?>
            <div class="p-3 mb-4 rounded bg-red-200 text-red-700 text-center">
                Usuário ou senha inválidos!
            </div>
        <?php } ?>

        <form action="painel.php" method="POST" class="space-y-4">
            <div>
                <label for="usuario" class="block text-sm font-medium text-gray-700">Usuário:</label>
                <input type="text" id="usuario" name="usuario" required class="w-full p-2 border border-gray-300 rounded-lg">
            </div>
            <div>
                <label for="senha" class="block text-sm font-medium text-gray-700">Senha:</label>
                <input type="password" id="senha" name="senha" required class="w-full p-2 border border-gray-300 rounded-lg">
            </div>
            <button type="submit" class="w-full bg-green-900 text-white py-2 rounded-lg hover:bg-green-500">Entrar</button>
        </form>
    </div>
   
    <footer class="bg-green-800 text-white text-center p-4 mt-auto">
        <p>&copy; <?php echo date("Y"); ?>
            <a href="https://www.instagram.com/joelsoncreis" class="font-bold underline" target="_blank" rel="noopener noreferrer">
                Joelson Reis
            </a>. Todos os direitos reservados.
        </p>
    </footer>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();
    </script>
    

</body>
</html>