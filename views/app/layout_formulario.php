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
    <link rel="stylesheet" href="<?= url("/views/assets/styles_cadastro.css"); ?>">
    <?= $this->section('style')?>
</head>
<body class="bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 flex flex-col min-h-screen font-sans transition-colors duration-200 pb-16 sm:pb-0">

<div class="ajax_response absolute top-0 left-0 w-full z-50 rounded"></div>

<!-- Primeiro Header com Logo e Botão Voltar -->
<header class="h-16 border-b border-gray-200 dark:border-gray-600 px-4 sm:px-6 flex items-center justify-between sticky top-0 bg-white dark:bg-gray-800 z-10">
    <div class="flex items-center space-x-4">
        <a href="<?=$this->e($url)?>" class="p-1 rounded-full hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
        </a>
        <div class="flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
            <h1 class="text-xl font-semibold">OrçaFácil</h1>
        </div>
    </div>
    
    <button id="theme-toggle" class="p-2 rounded-full hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors">
        <svg id="theme-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path id="theme-path" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
        </svg>
    </button>
</header>

<main class="flex-grow w-full max-w-3xl mx-auto px-4 sm:px-6 py-6">
        <nav class="flex mb-6" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2">
                <li class="inline-flex items-center">
                    <a href="<?= url("/ini"); ?>" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-primary-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        Início
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 dark:text-gray-400 md:ml-2"><?=$this->e($tituloFormulario)?></span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Título do Formulário -->
        <?php if($dados): ?>
            <div class="mb-6">
                <h2 class="text-2xl font-semibold"><?=$this->e($tituloFormulario) ?></h2>
                <p class="text-gray-500 dark:text-gray-400 mt-1">Editar os dados do <?= $this->e($tituloFormulario) ?></p>
            </div>
        <?php else: ?>
            <div class="mb-6">
                <h2 class="text-2xl font-semibold"><?=$this->e($tituloFormulario) ?></h2>
                <p class="text-gray-500 dark:text-gray-400 mt-1">Preencha os dados abaixo para cadastrar um novo <?= $this->e($tituloFormulario) ?></p>
            </div>
        <?php endif ?>

    <?= $this->section("content"); ?>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
<script src="<?= themes("/assets/script.js"); ?>"></script>
<script src="<?= themes("/assets/jquery.form.js"); ?>"></script>
</body>
</html>