<?php $this->layout('layout', ['title' => $title, "totais" => $totais]) ?>

<!-- Breadcrumb Header (hidden by default) -->
<div class="breadcrumb-header" id="breadcrumb-header">
    <div class="max-w-5xl mx-auto px-4">
        <div class="breadcrumb-content">
            <button class="breadcrumb-button" id="breadcrumb-back-button">
                <i class="fas fa-chevron-left"></i>
                <span>Voltar</span>
            </button>
            <div class="breadcrumb-text" id="breadcrumb-text"></div>
        </div>
    </div>
</div>

<!-- Conteúdo da página Início -->
<div id="inicio-content" class="content-section">
    <div class="space-y-6">
        <h2 class="section-title">Visão geral</h2>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-8">
            <!-- Card Beneficiários -->
            <div class="bg-white p-6 rounded-lg card shadow-sm">
                <div class="flex flex-col">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="card-title">Beneficiários</p>
                            <h3 class="card-value mt-3"><?= $totais["totBeneficio"]; ?></h3>
                        </div>
                        <div class="p-3 rounded-full bg-blue-50 text-primary">
                            <i class="fas fa-user-friends text-2xl"></i>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t-2 border-gray-200">
                        <p class="card-footer">+<?= $totais["porcentagem"]; ?> em relação ao mês anterior</p>
                    </div>
                </div>
            </div>
            
            <!-- Card Obras -->
            <div class="bg-white p-6 rounded-lg card shadow-sm">
                <div class="flex flex-col">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="card-title">Obras</p>
                            <h3 class="card-value mt-3"><?= $totais["totObras"]; ?></h3>
                        </div>
                        <div class="p-3 rounded-full bg-blue-50 text-primary">
                            <i class="fas fa-building text-2xl"></i>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t-2 border-gray-200">
                        <p class="card-footer">+<?= $totais["obraNovasMes"]; ?> novas este mês</p>
                    </div>
                </div>
            </div>
            
            <!-- Card Materiais -->
            <div class="bg-white p-6 rounded-lg card shadow-sm">
                <div class="flex flex-col">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="card-title">Materiais</p>
                            <h3 class="card-value mt-3"><?= $totais["totMateriais"]; ?></h3>
                        </div>
                        <div class="p-3 rounded-full bg-blue-50 text-primary">
                            <i class="fas fa-box-open text-2xl"></i>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t-2 border-gray-200">
                        <p class="card-footer"><?= $totais["materialEstoqueBaixo"]; ?> materiais com estoque baixo</p>
                    </div>
                </div>
            </div>
            
            <!-- Card Total -->
            <div class="bg-white p-6 rounded-lg card shadow-sm">
                <div class="flex flex-col">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="card-title">Total Geral</p>
                            <h3 class="card-value mt-3"><?= $totais["totGeral"]; ?></h3>
                        </div>
                        <div class="p-3 rounded-full bg-blue-50 text-primary">
                            <i class="fas fa-chart-line text-2xl"></i>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t-2 border-gray-200">
                        <p class="card-footer">Visão geral do sistema</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>