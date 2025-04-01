<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$this->e($title)?></title>
    <link rel="stylesheet" href="<?= themes("/assets/styles.css"); ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-white text-gray-900">
    <div class="flex flex-col min-h-screen">

        <!-- Header Principal -->
        <header class="bg-gray-50 p-4 border-b-2 border-gray-200 flex justify-left md:justify-center" id="main-header">
            <h1 class="text-2xl font-bold text-gray-800">OrçaFácil</h1>
        </header>

        <!-- Header de Navegação (Desktop) -->
        <nav class="bg-gray-50 border-b-2 border-gray-200" id="secondary-header">
            <div class="max-w-5xl mx-auto px-4">
                <div class="flex justify-center">
                    <div class="flex">
                    <a href="<?= url("/"); ?>"><button class="nav-button text-base font-medium" data-target="inicio-content">
                       Início    
                        </button></a>
                        <a href="<?= url("/ben"); ?>"><button class="nav-button text-base font-medium" data-target="beneficiarios-content">
                        Beneficiários
                        </button></a>
                        <a href="<?= url("/ob"); ?>"><button class="nav-button text-base font-medium" data-target="obras-content">
                            Obras
                        </button></a>
                        <a href="<?= url("/mat"); ?>"><button class="nav-button text-base font-medium" data-target="materiais-content">
                            Materiais
                        </button></a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Breadcrumb Header (hidden by default) -->
        <div class="breadcrumb-header border-none" id="breadcrumb-header">
            <div class="max-w-5xl mx-auto px-4 mb-0">
                <div class="breadcrumb-content">
                    <button class="breadcrumb-button" id="breadcrumb-back-button">
                        <i class="fas fa-chevron-left"></i>
                        <span>Voltar</span>
                    </button>
                    <div class="breadcrumb-text" id="breadcrumb-text"></div>
                </div>
            </div>
        </div>

        <!-- Conteúdo Principal -->

        <main class="flex-1 content-container bg-white">
            <div class="max-w-5xl mx-auto px-4 py-8">
                <?= $this->section("content"); ?>
            </div>
        </main>

        <!-- Bottom Navigation (Mobile) -->
        <div class="bottom-nav">
            <a href="<?= url("/"); ?>">
                <button class="bottom-nav-item active" data-target="inicio-content">
                    <i class="fas fa-home"></i>
                    <span>Início</span>
                </button>
            </a>
            <a href="<?= url("/ben"); ?>">
                <button class="bottom-nav-item" data-target="beneficiarios-content">
                    <i class="fas fa-user"></i>
                    <span>Beneficiários</span>
                </button>
            </a>
            <a href="<?= url("/ob"); ?>">
                <button class="bottom-nav-item" data-target="obras-content">
                    <i class="fas fa-hammer"></i>
                    <span>Obras</span>
                </button>
            </a>
            <a href="<?= url("/mat"); ?>">
                <button class="bottom-nav-item" data-target="materiais-content">
                    <i class="fas fa-box"></i>
                    <span>Materiais</span>
                </button>
            </a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    <script src="<?= themes("/assets/script.js"); ?>"></script>
    <script src="<?= themes("/assets/jquery.form.js"); ?>"></script>
</body>
</html>