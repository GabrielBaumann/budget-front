<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$this->e($title)?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                fontFamily: {
                    sans: ['Poppins', 'sans-serif'],
                },
                extend: {
                    colors: {
                        primary: {
                            600: '#2563eb',
                            700: '#1d4ed8',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    </style>
    <?= $this->section('style')?>
</head>
<body class="bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 flex flex-col min-h-screen font-sans transition-colors duration-200 pb-16 sm:pb-0">

<!-- Primeiro Header com Logo -->
<header class="h-16 border-b border-gray-200 dark:border-gray-600 px-4 sm:px-6 flex items-center justify-between sticky top-0 bg-white dark:bg-gray-800 z-10">
    <div class="flex items-center space-x-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
        </svg>
        <h1 class="text-xl font-semibold">OrçaFácil</h1>
    </div>
    
    <button id="theme-toggle" class="p-2 rounded-full hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors">
        <svg id="theme-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path id="theme-path" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
        </svg>
    </button>
</header>

<!-- Segundo Header com Abas de Navegação (apenas desktop) -->
<header class="h-14 border-b border-gray-200 dark:border-gray-600 hidden sm:flex items-stretch relative">
    <nav class="flex items-stretch w-full">
        <a href="<?= url("/"); ?>" class="flex items-center justify-center px-4 sm:px-6 relative active-tab">
            <span class="text-sm sm:text-base">Beneficiários e Obras</span>
        </a>
        <a href="<?= url("/unidade")?>" class="flex items-center justify-center px-4 sm:px-6 relative hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
            <span class="text-sm sm:text-base">Unidades de medidas</span>
        </a>
        <a href="orcamentos.html" class="flex items-center justify-center px-4 sm:px-6 relative hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
            <span class="text-sm sm:text-base">Categoria de Materiais</span>
        </a>
        <a href="relatorios.html" class="flex items-center justify-center px-4 sm:px-6 relative hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
            <span class="text-sm sm:text-base">Relatórios</span>
        </a>
    </nav>
</header>

    <?= $this->section("content"); ?>

<!-- Paginação -->
    <div class="flex items-center justify-between mt-4 px-2">
        <div class="text-sm text-gray-500 dark:text-gray-400">
            Mostrando <span class="font-medium">1</span> a <span class="font-medium">3</span> de <span class="font-medium">10</span> resultados
        </div>
        <div class="flex space-x-2">
            <button class="px-3 py-1 rounded-md border border-gray-300 dark:border-gray-600 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700">Anterior</button>
            <button class="px-3 py-1 rounded-md border border-gray-300 dark:border-gray-600 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700">Próxima</button>
        </div>
    </div>
</main>

<!-- Mobile Bottom Navigation -->
<nav class="fixed bottom-0 left-0 right-0 bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-600 flex sm:hidden z-20">
    <a href="index.html" class="flex flex-col items-center justify-center py-2 px-4 flex-grow text-primary-600 dark:text-blue-400">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>
        <span class="text-xs mt-1">Clientes</span>
    </a>
    <a href="produtos.html" class="flex flex-col items-center justify-center py-2 px-4 flex-grow text-gray-500 dark:text-gray-400 hover:text-primary-600 dark:hover:text-blue-400">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
        </svg>
        <span class="text-xs mt-1">Produtos</span>
    </a>
    <a href="orcamentos.html" class="flex flex-col items-center justify-center py-2 px-4 flex-grow text-gray-500 dark:text-gray-400 hover:text-primary-600 dark:hover:text-blue-400">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
        </svg>
        <span class="text-xs mt-1">Orçamentos</span>
    </a>
    <a href="relatorios.html" class="flex flex-col items-center justify-center py-2 px-4 flex-grow text-gray-500 dark:text-gray-400 hover:text-primary-600 dark:hover:text-blue-400">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
        </svg>
        <span class="text-xs mt-1">Relatórios</span>
    </a>
</nav>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
<script src="<?= themes("/assets/script.js"); ?>"></script>
<script src="<?= themes("/assets/jquery.form.js"); ?>"></script>
</body>
</html>