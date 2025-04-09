<?php $this->layout('layout_formulario', ['title' => $title, 'tituloFormulario' => $tituloFormulario, 'url' => $url, 'dados' => $dados]) ?>

<?php $this->start('style') ?>
    <link rel="stylesheet" href="<?= url("/views/assets/styles_cadastro.css"); ?>">
<?php $this->stop() ?>

<!-- Formulário -->
<form class="space-y-6" action="<?= url("/uni")?>" method="post">
    <div class="space-y-4">
        <!-- Seção de Dados Pessoais -->
        <div class="border-b border-gray-200 dark:border-gray-600 pb-4">
            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Unidades</h3>
        </div>
        
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div>
                <label for="nome" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Unidade *</label>
                <input type="text" id="unidade" name="unidade" required value="<?= $dados->unidade ?? "" ?>"
                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white">
            </div>
            
            <div>
                <label for="cpf" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Abreviação *</label>
                <input type="text" id="abreviacao" name="abreviacao" required value="<?= $dados->abreviacao ?? "" ?>"
                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white">
            </div>
        </div>

        <!-- Seção de Observações -->
        <div class="border-b border-gray-200 dark:border-gray-600 pt-6 pb-4">
            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Observações</h3>
        </div>
        
        <div>
            <label for="observacoes" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Observações</label>
            <textarea id="observacoes" name="observacoes" rows="3"
                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white"><?= $dados->observacao ?? "" ?>
            </textarea>
        </div>
    </div>

    <!-- Botões de Ação -->
    <div class="flex flex-col-reverse sm:flex-row sm:justify-end gap-3 pt-4">
        <a href="<?= url("/unidade"); ?>" class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 dark:focus:ring-offset-gray-800 inline-flex justify-center items-center transition-colors">
            Cancelar
        </a>
        <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 dark:focus:ring-offset-gray-800 inline-flex justify-center items-center transition-colors">
            Salvar
        </button>
    </div>
</form>