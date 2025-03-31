<!-- Conteúdo da página Materiais -->
<div id="materiais-content" class="content-section hidden">
    <div id="materiais-header" class="space-y-6">
        <div class="flex justify-between items-center">
            <h2 class="section-title">Materiais</h2>
            <button class="btn btn-primary" id="btn-novo-material">
                Novo Material
            </button>
        </div>
        
        <!-- Barra de pesquisa e filtros -->
        <div class="search-filter-bar">
            <div class="relative flex-1">
                <input type="text" placeholder="Pesquisar materiais..." class="w-full pl-12 pr-4 py-3 form-input rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                <i class="fas fa-search absolute left-4 top-3.5 text-gray-500 text-lg"></i>
            </div>
            <div class="flex gap-3">
                <select class="form-input rounded-lg text-base focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option>Filtrar por estoque</option>
                    <option>Estoque baixo</option>
                    <option>Em estoque</option>
                </select>
                <select class="form-input rounded-lg text-base focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option>Ordenar por</option>
                    <option>Nome (A-Z)</option>
                    <option>Nome (Z-A)</option>
                    <option>Quantidade</option>
                </select>
            </div>
        </div>
        
        <!-- Tabela de Materiais -->
        <div id="materiais-tabela">
            <div class="bg-white rounded-lg card overflow-hidden shadow-sm">
                <div class="overflow-x-auto">
                    <table class="responsive-table min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Nome</th>
                                <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Quantidade</th>
                                <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Valor Unitário</th>
                                <th scope="col" class="relative px-6 py-3"><span class="sr-only">Ações</span></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-base font-semibold text-gray-900" data-label="Nome">Cimento CP II</td>
                                <td class="px-6 py-4 whitespace-nowrap text-base text-gray-700" data-label="Quantidade">150 sacos</td>
                                <td class="px-6 py-4 whitespace-nowrap text-base text-gray-700" data-label="Valor Unitário">R$ 32,90</td>
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
    
    <!-- Formulário de Material -->
    <div id="materiais-form" class="hidden max-w-5xl mx-auto px-4">
        <div class="bg-white rounded-lg card p-6 shadow-sm">
            <h3 class="text-xl font-bold mb-6 text-gray-800">Cadastrar Novo Material</h3>
            
            <form class="space-y-5">
                <div>
                    <label for="nome-material" class="form-label">Nome do Material</label>
                    <input type="text" id="nome-material" name="nome-material" class="mt-2 form-input w-full rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
                </div>
                
                <div>
                    <label for="quantidade" class="form-label">Quantidade</label>
                    <input type="number" id="quantidade" name="quantidade" class="mt-2 form-input w-full rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
                </div>
                
                <div>
                    <label for="valor" class="form-label">Valor Unitário</label>
                    <input type="text" id="valor" name="valor" class="mt-2 form-input w-full rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
                </div>
                
                <div>
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea id="descricao" name="descricao" rows="4" class="mt-2 form-input w-full rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none"></textarea>
                </div>
                
                <div class="flex justify-end space-x-4 pt-6">
                    <button type="button" id="btn-cancelar-material" class="btn border-2 border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
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