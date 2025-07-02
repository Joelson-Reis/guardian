<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Solicitações</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-gray-100 text-gray-900">
    <header class="bg-green-800 text-white p-4 flex justify-between items-center shadow-md">
        <h1 class="text-xl font-bold">Guardian</h1>
        <nav class="flex gap-4">
            <a href="painel.php" class="flex items-center gap-2 px-4 py-2 hover:underline">
                <i data-lucide="log-in"></i> Painel
            </a>
            <a href="admin.php?action=cadastro_usuario" class="flex items-center gap-2 px-4 py-2 hover:underline">
                <i data-lucide="user-plus"></i> Cadastrar Usuário
            </a>
        </nav>
    </header>

    <main class="container mt-6 p-4">
        <section class="bg-white shadow-lg rounded-lg p-6 mt-6 mb-6">
            <h2 class="text-2xl font-bold mb-4">Solicitações</h2>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700">
                            <th class="p-2 border">ID</th>
                            <th class="p-2 border">Matrícula</th>
                            <th class="p-2 border">Email</th>
                            <th class="p-2 border">Data</th>
                            <th class="p-2 border">Status</th>
                            <th class="p-2 border">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($solicitacoes as $row): ?>
                            <tr class="border">
                                <td class="p-2 border"><?php echo $row['id']; ?></td>
                                <td class="p-2 border"><?php echo $row['matricula']; ?></td>
                                <td class="p-2 border"><?php echo $row['email']; ?></td>
                                <td class="p-2 border"><?php echo $row['data_solicitacao']; ?></td>
                                <td class="p-2 border"><?php echo $row['status']; ?></td>
                                <td class="p-2 border">
                                    <form method="POST" class="flex items-center gap-2">
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                        <select name="status" class="border p-1 rounded">
                                            <option value="Pendente" <?php if ($row['status'] == 'Pendente') echo 'selected'; ?>>Pendente</option>
                                            <option value="Atendida" <?php if ($row['status'] == 'Atendida') echo 'selected'; ?>>Atendida</option>
                                        </select>
                                        <button type="submit" class="bg-blue-500 text-white px-4 py-1 rounded">Atualizar</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>

        <section class="bg-white shadow-lg rounded-lg p-6 mb-6">
            <h2 class="text-2xl font-bold mb-4">Scripts Gerados</h2>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700">
                            <th class="p-2 border">Matrícula</th>
                            <th class="p-2 border">Script</th>
                            <th class="p-2 border">Data de Geração</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($scripts as $scriptRow): ?> <tr class="border">
                                <td class="p-2 border"><?php echo $scriptRow['matricula']; ?></td>
                                <td class="p-2 border"><?php echo $scriptRow['script']; ?></td>
                                <td class="p-2 border"><?php echo $scriptRow['data_geracao']; ?></td>
                            </tr>
                        <?php endforeach; ?> </tbody>
                </table>
            </div>
        </section>
    </main>

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