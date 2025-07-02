<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitação de Senha</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../public/css/style.css">
</head>

<body class="bg-gray-100 text-gray-900 min-h-screen flex flex-col">
    <header class="bg-green-800 text-white p-4 flex justify-between items-center shadow-md">
   
        <h1 class="text-xl font-bold">   Guardian</h1>
        <nav class="flex gap-4">
            <a href="painel.php" class="flex items-center gap-2 px-4 py-2 hover:underline">
                <i data-lucide="log-in"></i> Painel
            </a>
           
        </nav>
    </header>

    <div class="flex-grow flex items-center justify-center">
        <div class="max-w-lg w-full p-6 bg-white shadow-lg rounded-lg">
            <h2 class="text-2xl font-bold mb-4 text-center">Solicitação de Senha</h2>
            <p class="text-gray-600 text-center mb-4">Esqueceu sua senha? Preencha o formulário abaixo para recuperar o acesso.</p>

            <?php if (isset($mensagem)) { ?>
                <div class="p-3 mb-4 rounded <?php echo strpos($mensagem, 'sucesso') !== false ? 'bg-green-200 text-green-700' : 'bg-red-200 text-red-700'; ?>">
                    <?php echo $mensagem; ?>
                </div>
            <?php } ?>

            <form action="solicitacao.php" method="POST" class="space-y-4">
                <div>
                    <label for="matricula" class="block text-sm font-medium text-gray-700">Usuário:</label>
                    <input type="text" id="matricula" name="matricula" required class="w-full p-2 border border-gray-300 rounded-lg">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                    <input type="email" id="email" name="email" required class="w-full p-2 border border-gray-300 rounded-lg">
                </div>
                <button type="submit" class="w-full bg-green-900 text-white py-2 rounded-lg hover:bg-green-500 text-white">Solicitar</button>
            </form>
        </div>
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