<?php $this->layout('layout', ['title' => $title]) ?>

<!-- Conteúdo da página Beneficiários -->
<div id="beneficiarios-content" class="content-section hidden">
    <div id="beneficiarios-header" class="space-y-6">
        <div class="flex justify-between items-center">
            <h2 class="section-title">Beneficiários</h2>
            <button class="btn btn-primary" id="btn-novo-beneficiario">
                Cadastrar Novo
            </button>
        </div>
        
        <!-- Barra de pesquisa e filtros -->
        <div class="search-filter-bar">
            <div class="relative flex-1">
                <input type="text" placeholder="Pesquisar beneficiários..." class="w-full pl-12 pr-4 py-3 form-input rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                <i class="fas fa-search absolute left-4 top-3.5 text-gray-500 text-lg"></i>
            </div>
            <div class="flex gap-3">
                <select class="form-input rounded-lg text-base focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option>Filtrar por status</option>
                    <option>Ativos</option>
                    <option>Inativos</option>
                </select>
                <select class="form-input rounded-lg text-base focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option>Ordenar por</option>
                    <option>Nome (A-Z)</option>
                    <option>Nome (Z-A)</option>
                </select>
            </div>
        </div>
        
        <!-- Tabela de Beneficiários -->
        <div id="beneficiarios-tabela">
            <div class="bg-white rounded-lg card overflow-hidden shadow-sm">
                <div class="overflow-x-auto">
                    <table class="responsive-table min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Nome</th>
                                <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">CPF</th>
                                <th scope="col" class="relative px-6 py-3"><span class="sr-only">Ações</span></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-base font-semibold text-gray-900" data-label="Nome">João Silva</td>
                                <td class="px-6 py-4 whitespace-nowrap text-base text-gray-700" data-label="CPF">123.456.789-00</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-base font-medium" data-label="Ações">
                                    <a href="#" class="text-primary hover:text-blue-700 mr-4"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="text-red-600 hover:text-red-800"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-base font-semibold text-gray-900" data-label="Nome">Maria Oliveira</td>
                                <td class="px-6 py-4 whitespace-nowrap text-base text-gray-700" data-label="CPF">987.654.321-00</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-base font-medium" data-label="Ações">
                                    <a href="#" class="text-primary hover:text-blue-700 mr-4"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="text-red-600 hover:text-red-800"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Formulário de Beneficiário -->
    <div id="beneficiarios-form" class="hidden max-w-5xl mx-auto px-4">
        <div class="bg-white rounded-lg card p-6 shadow-sm">
            <h3 class="text-xl font-bold mb-6 text-gray-800">Cadastrar Novo Beneficiário</h3>
            
            <form class="space-y-5">
                <div>
                    <label for="nome" class="form-label">Nome Completo</label>
                    <input type="text" id="nome" name="nome" class="mt-2 form-input w-full rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
                </div>
                
                <div>
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" id="cpf" name="cpf" class="mt-2 form-input w-full rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
                </div>
                
                <div>
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" id="email" name="email" class="mt-2 form-input w-full rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
                </div>
                
                <div>
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="tel" id="telefone" name="telefone" class="mt-2 form-input w-full rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
                </div>
                
                <div class="flex justify-end space-x-4 pt-6">
                    <button type="button" id="btn-cancelar-beneficiario" class="btn border-2 border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
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