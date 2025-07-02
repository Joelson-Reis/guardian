document.addEventListener('DOMContentLoaded', function() {
    const formLinks = document.querySelectorAll('.form-link');
    const formContainer = document.getElementById('form-container');
    const senhaForm = document.getElementById('senha-form');

    formLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const formType = this.getAttribute('data-form');
            loadForm(formType);
        });
    });

    function loadForm(formType) {
        senhaForm.classList.add('hidden');
        formContainer.classList.add('hidden');

        switch (formType) {
            case 'senha':
                senhaForm.classList.remove('hidden');
                formContainer.classList.remove('hidden');
                break;
            case 'wifi':
                formContainer.innerHTML = `<h2>Formulário de Solicitação de Wi-Fi</h2><p>Formulário para solicitação de acesso Wi-Fi.</p>`;
                formContainer.classList.remove('hidden');
                break;
            case 'contato':
                formContainer.innerHTML = `<h2>Formulário de Contato</h2><p>Formulário para entrar em contato com o suporte.</p>`;
                formContainer.classList.remove('hidden');
                break;
            case 'chamado':
                formContainer.innerHTML = `<h2>Formulário de Abertura de Chamado</h2><p>Formulário para abrir um chamado de suporte.</p>`;
                formContainer.classList.remove('hidden');
                break;
            default:
                formContainer.innerHTML = '<p>Selecione uma opção para carregar o formulário.</p>';
        }
    }

    // Menu Mobile
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    if (menuToggle && mobileMenu) {
        menuToggle.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
    } else {
        console.error("Menu toggle or mobile menu not found.");
    }

   
});