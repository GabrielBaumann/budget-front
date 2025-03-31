<?php $this->layout('layout', ['title' => $title]) ?>

<!-- Conteúdo da página Obras -->
<div id="obras-content" class="content-section">
    <div id="obras-header" class="space-y-6">
        <div class="flex justify-between items-center">
            <h2 class="section-title">Obras</h2>
            <button class="btn btn-primary" id="btn-nova-obra">
                Nova Obra
            </button>
        </div>
        
        <!-- Barra de pesquisa e filtros -->
        <div class="search-filter-bar">
            <div class="relative flex-1">
                <input type="text" placeholder="Pesquisar obras..." class="w-full pl-12 pr-4 py-3 form-input rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                <i class="fas fa-search absolute left-4 top-3.5 text-gray-500 text-lg"></i>
            </div>
            <div class="flex gap-3">
                <select class="form-input rounded-lg text-base focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option>Filtrar por status</option>
                    <option>Planejamento</option>
                    <option>Em andamento</option>
                    <option>Concluído</option>
                </select>
                <select class="form-input rounded-lg text-base focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option>Ordenar por</option>
                    <option>Nome (A-Z)</option>
                    <option>Nome (Z-A)</option>
                    <option>Data de início</option>
                </select>
            </div>
        </div>
        
        <!-- Tabela de Obras -->
        <div id="obras-tabela">
            <div class="bg-white rounded-lg card overflow-hidden shadow-sm">
                <div class="overflow-x-auto">
                    <table class="responsive-table min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Nome da Obra</th>
                                <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Status</th>
                                <th scope="col" class="relative px-6 py-3"><span class="sr-only">Ações</span></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php if(empty($listObra)): ?>
                                <tr>
                                    <td colspan = "2">Nenuma obra cadastrada...</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach($listObra as $obra): ?>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-base font-semibold text-gray-900" data-label="Nome da Obra"><?= $obra["nomeObra"]; ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap" data-label="Status">
                                            <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-blue-100 text-primary"><?= $obra["status"]; ?></span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-base font-medium" data-label="Ações">
                                            <a href="#" class="text-primary hover:text-blue-700 mr-4"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="text-red-600 hover:text-red-800"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Formulário de Obra -->
    <div id="obras-form" class="hidden max-w-5xl mx-auto px-4">
        <div class="bg-white rounded-lg card p-6 shadow-sm">
            <h3 class="text-xl font-bold mb-6 text-gray-800">Cadastrar Nova Obra</h3>
            
            <form class="space-y-5">
                <div>
                    <label for="nome-obra" class="form-label">Nome da Obra</label>
                    <input type="text" id="nome-obra" name="nome-obra" class="mt-2 form-input w-full rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
                </div>
                
                <div>
                    <label for="endereco" class="form-label">Endereço</label>
                    <input type="text" id="endereco" name="endereco" class="mt-2 form-input w-full rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
                </div>
                
                <div>
                    <label for="status" class="form-label">Status</label>
                    <select id="status" name="status" class="mt-2 form-input w-full rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
                        <option value="planejamento">Planejamento</option>
                        <option value="andamento">Em andamento</option>
                        <option value="pausado">Pausado</option>
                        <option value="concluido">Concluído</option>
                    </select>
                </div>
                
                <div class="flex justify-end space-x-4 pt-6">
                    <button type="button" id="btn-cancelar-obra" class="btn border-2 border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                        Cancelar
                    </button>
                    <button type="submit" class="btn btn-primary rounded-lg">
                        Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>