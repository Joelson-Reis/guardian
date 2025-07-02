<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardian</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="/css/style.css">
   
</head>
<body class="flex flex-col min-h-screen from-green-900 via-green-700 to-green-500 text-white">
    
   <header class="bg-green-800 text-white p-4 flex justify-between items-center shadow-md">
   
        <h1 class="text-xl font-bold">   Guardian</h1>
        <nav class="flex gap-4">
            <a href="painel.php" class="flex items-center gap-2 px-4 py-2 hover:underline">
                <i data-lucide="log-in"></i> Painel
            </a>
            
        </nav>
    </header>
    
    <main class="flex flex-grow items-center justify-center">
        <div id="splash" class="text-center p-10 bg-opacity-90 backdrop-blur-md bg-green-700 rounded-2xl shadow-2xl border border-green-300 w-96 neon-border">
            <h1 class="text-3xl font-extrabold mb-5 flex items-center justify-center gap-3">
                <i class="fa-solid fa-lock"></i> Bem-vindo!
            </h1>
            <p class="mb-5 text-lg">Escolha uma opção para continuar</p>
            <button onclick="selectOption('discente')" class="flex items-center justify-center w-full bg-green-900 text-white px-5 py-3 rounded-lg mb-3 shadow-lg hover:bg-green-600 transition gap-3">
                <i class="fa-solid fa-user-graduate"></i> Senha Discente
            </button>
            <button onclick="selectOption('docente')" class="flex items-center justify-center w-full bg-green-900 text-white px-5 py-3 rounded-lg shadow-lg hover:bg-green-600 transition gap-3">
                <i class="fa-solid fa-chalkboard-teacher"></i> Senha Docente
            </button>
        </div>
    </main>
    
  

 
    
  

    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();
    </script>

      <script>
        function selectOption(option) {
            const splash = document.getElementById('splash');
            splash.classList.add('fade-out');
            setTimeout(() => {
                
                if (option === 'discente') {
                    window.location.href = 'solicitacao.php?tipo=discente'; 
                } else {
                    window.location.href = 'solicitacao.php?tipo=doscente'; 
                }
            }, 500);
        }
    </script>

      <footer class="bg-green-800 text-white text-center p-4 mt-auto">
        <p>&copy; <?php echo date("Y"); ?>
            <a href="https://www.instagram.com/joelsoncreis" class="font-bold underline" target="_blank" rel="noopener noreferrer">
                Joelson Reis
            </a>. Todos os direitos reservados.
        </p>
    </footer>
</body>
</html>
