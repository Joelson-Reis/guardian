<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-gray-100 text-gray-900">
    <header class="bg-green-800 text-white p-4 flex justify-between items-center shadow-md">
        <h1 class="text-xl font-bold">Guardian</h1>
        <nav class="flex gap-4">
            <a href="admin.php" class="flex items-center gap-2 px-4 py-2 hover:underline">
                <i data-lucide="log-in"></i> Painel
            </a>
        </nav>
    </header>

    <main class="container mt-6 p-4">
        <section class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-4">Cadastro de Usuário</h2>
            <?php if (isset($mensagem)): ?>
                <p class="mb-4 <?php echo strpos($mensagem, 'sucesso') !== false ? 'text-green-600' : 'text-red-600'; ?>">
                    <?php echo $mensagem; ?>
                </p>
            <?php endif; ?>
            <form method="POST" class="space-y-4">
                <div>
                    <label for="matricula" class="block text-sm font-medium text-gray-700">Usuário:</label>
                    <input type="text" id="usuario" name="usuario" required class="w-full p-2 border border-gray-300 rounded-lg">
                   
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Senha:</label>
                    <input type="password" name="senha" class="w-full p-2 border border-gray-300 rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Email:</label>
                    <input type="email" name="email" class="w-full p-2 border border-gray-300 rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Matrícula:</label>
                    <input type="text" name="matricula" class="w-full p-2 border border-gray-300 rounded-lg">
                </div>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Cadastrar</button>
            </form>


        </section>
    </main>

    <footer class="bg-green-800 text-white text-center p-4 mt-auto">
        <p>&copy; <?php echo date("Y"); ?>
            <a href="https://www.instagram.com/joelsoncreis" class="font-bold underline" target="_blank" rel="noopener noreferrer">
                Joelson Reis
            </a> Todos os direitos reservados.
        </p>
    </footer>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();
    </script>
</body>

</html>