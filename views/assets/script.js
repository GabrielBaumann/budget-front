document.addEventListener('DOMContentLoaded', function() {
    // Elementos do breadcrumb
    const breadcrumbHeader = document.getElementById('breadcrumb-header');
    const breadcrumbText = document.getElementById('breadcrumb-text');
    const breadcrumbBackButton = document.getElementById('breadcrumb-back-button');
    
    // Navegação principal
    const navButtons = document.querySelectorAll('.nav-button, .bottom-nav-item');
    const contentSections = document.querySelectorAll('.content-section');
    let currentSection = 'inicio-content';
    let startX, moveX;
    
    // Mostrar formulário
    function showForm(section, formName) {
        // Adiciona classe form-active para esconder outros elementos
        document.getElementById(section).classList.add('form-active');
        
        // Mostra breadcrumb
        breadcrumbHeader.style.display = 'block';
        
        // Define texto do breadcrumb
        let sectionName = '';
        switch(section) {
            case 'beneficiarios-content':
                sectionName = 'Beneficiários';
                break;
            case 'obras-content':
                sectionName = 'Obras';
                break;
            case 'materiais-content':
                sectionName = 'Materiais';
                break;
        }
        
        breadcrumbText.textContent = `${sectionName} / ${formName}`;
    }
    
    // Esconder formulário
    function hideForm() {
        // Remove classe form-active de todas as seções
        contentSections.forEach(section => {
            section.classList.remove('form-active');
        });
        
        // Esconde breadcrumb
        breadcrumbHeader.style.display = 'none';
    }
    
    // Mudar seção ativa
    function setActiveSection(target) {
        // Remove classes ativas dos botões
        navButtons.forEach(btn => {
            btn.classList.remove('active', 'text-gray-900');
            btn.classList.add('text-gray-500');
            
            if (btn.classList.contains('bottom-nav-item')) {
                btn.classList.remove('text-gray-800');
            }
        });
        
        // Adiciona classes ativas ao botão clicado
        const activeButtons = document.querySelectorAll(`[data-target="${target}"]`);
        activeButtons.forEach(btn => {
            btn.classList.add('active');
            btn.classList.remove('text-gray-500');
            
            if (btn.classList.contains('bottom-nav-item')) {
                btn.classList.add('text-gray-800');
            } else {
                btn.classList.add('text-gray-900');
            }
        });
        
        // Oculta todos os conteúdos
        contentSections.forEach(section => {
            section.classList.add('hidden');
        });
        
        // Mostra o conteúdo correspondente
        document.getElementById(target).classList.remove('hidden');
        currentSection = target;
        
        // Garante que o formulário está escondido ao mudar de seção
        hideForm();
    }
    
    // Event listeners para navegação
    navButtons.forEach(button => {
        button.addEventListener('click', function() {
            const target = this.getAttribute('data-target');
            setActiveSection(target);
        });
    });
    
    // Botão voltar do breadcrumb
    breadcrumbBackButton.addEventListener('click', hideForm);
    
    // Botões de novo cadastro
    // document.getElementById('btn-novo-beneficiario').addEventListener('click', function() {
    //     showForm('beneficiarios-content', 'Novo Beneficiário');

    // });
    
    // document.getElementById('btn-cancelar-beneficiario').addEventListener('click', hideForm);
    
    // document.getElementById('btn-nova-obra').addEventListener('click', function() {
    //     showForm('obras-content', 'Nova Obra');
    //     alert("teste");
    // });
    
    // document.getElementById('btn-cancelar-obra').addEventListener('click', hideForm);
    
    // document.getElementById('btn-novo-material').addEventListener('click', function() {
    //     showForm('materiais-content', 'Novo Material');
    // });
    
    // document.getElementById('btn-cancelar-material').addEventListener('click', hideForm);

    document.body.addEventListener('click', function(event) {
        if (event.target.id === 'btn-novo-beneficiario') {
            showForm('beneficiarios-content', 'Novo Beneficiário');
        } else if (event.target.id === 'btn-cancelar-beneficiario') {
            hideForm();
        } else if (event.target.id === 'btn-nova-obra') {
            showForm('obras-content', 'Nova Obra');
        } else if (event.target.id === 'btn-cancelar-obra') {
            hideForm();
        } else if (event.target.id === 'btn-novo-material') {
            showForm('materiais-content', 'Novo Material');
        } else if (event.target.id === 'btn-cancelar-material') {
            hideForm();
        }
    });

});