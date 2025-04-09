<?php $this->layout('layout_pagina', ['title' => $title, 'beneficiario' => $beneficiario]) ?>

<!-- Conteúdo Principal -->
<main class="flex-grow w-full max-w-6xl mx-auto px-4 sm:px-6 py-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold">Beneficiário/Obras</h2>
        <a href="<?= url("/cad"); ?>">
            <button class="px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white rounded-md text-sm font-medium transition-colors flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Novo Benficiário
            </button>
        </a>
    </div>

    <!-- Tabela Responsiva -->
    <div class="overflow-hidden rounded-lg md:border md:border-gray-200 md:dark:border-gray-600">
    <table class="responsive-table min-w-full divide-y divide-gray-200 dark:divide-gray-600">
        <thead class="bg-gray-50 dark:bg-gray-700">
            <tr>
                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nome</th>
                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Email</th>
                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Telefone</th>
                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Ações</th>
            </tr>
        </thead>
        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-600">
            <?php foreach($beneficiario as $beneficio): ?>
                <tr>
                    <td data-label="Nome" class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100"><?= $beneficio->nome_beneficiario_obra ?></td>
                    <td data-label="Email" class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300"><?= $beneficio->email ?></td>
                    <td data-label="Telefone" class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300"><?= $beneficio->contato ?></td>
                    <td data-label="Ações" class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                        <button class="text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-300 mr-3">
                            <a href="<?= url("/cad/{$beneficio->id_obra_beneficiario}"); ?>" rel="noopener noreferrer">Editar</a>
                        </button>
                        <button class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300">Excluir</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>