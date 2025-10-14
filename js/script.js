// Navegação suave
document.addEventListener('DOMContentLoaded', function() {
    // Smooth scrolling para links internos
    const links = document.querySelectorAll('a[href^="#"]');
    
    links.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            
            if (targetElement) {
                const headerHeight = document.querySelector('.header').offsetHeight;
                const targetPosition = targetElement.offsetTop - headerHeight - 20;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
});

// Menu Mobile
function toggleMobileMenu() {
    const mobileMenu = document.getElementById('mobileMenu');
    const menuBtn = document.querySelector('.mobile-menu-btn i');
    
    mobileMenu.classList.toggle('active');
    
    // Trocar ícone
    if (mobileMenu.classList.contains('active')) {
        menuBtn.className = 'fas fa-times';
    } else {
        menuBtn.className = 'fas fa-bars';
    }
}

function closeMobileMenu() {
    const mobileMenu = document.getElementById('mobileMenu');
    const menuBtn = document.querySelector('.mobile-menu-btn i');
    
    mobileMenu.classList.remove('active');
    menuBtn.className = 'fas fa-bars';
}

// Fechar menu mobile ao clicar fora
document.addEventListener('click', function(e) {
    const mobileMenu = document.getElementById('mobileMenu');
    const menuBtn = document.querySelector('.mobile-menu-btn');
    
    if (!menuBtn.contains(e.target) && !mobileMenu.contains(e.target)) {
        closeMobileMenu();
    }
});

// Formulário de contato (versão PHP - sem redirecionamento automático para WhatsApp)
document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contactForm');
    
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            // Validação básica no frontend
            const nome = document.getElementById('nome').value.trim();
            const email = document.getElementById('email').value.trim();
            const telefone = document.getElementById('telefone').value.trim();
            const mensagem = document.getElementById('mensagem').value.trim();
            
            // Verificar campos obrigatórios
            if (!nome || !email || !telefone || !mensagem) {
                e.preventDefault();
                alert('Por favor, preencha todos os campos obrigatórios.');
                return false;
            }
            
            // Validação de email
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                e.preventDefault();
                alert('Por favor, insira um e-mail válido.');
                return false;
            }
            
            // Validação de telefone (básica)
            const phoneRegex = /^[\d\s\(\)\-\+]{10,}$/;
            if (!phoneRegex.test(telefone)) {
                e.preventDefault();
                alert('Por favor, insira um telefone válido.');
                return false;
            }
            
            // Se chegou até aqui, o formulário será enviado normalmente
            // O PHP processará e redirecionará para WhatsApp se necessário
        });
    }
});

// Efeito de scroll no header
window.addEventListener('scroll', function() {
    const header = document.querySelector('.header');
    
    if (window.scrollY > 100) {
        header.style.background = 'rgba(255, 255, 255, 0.98)';
        header.style.boxShadow = '0 2px 20px rgba(0, 0, 0, 0.1)';
    } else {
        header.style.background = 'rgba(255, 255, 255, 0.95)';
        header.style.boxShadow = 'none';
    }
});

// Animação de entrada dos elementos
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver(function(entries) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

// Observar elementos para animação
document.addEventListener('DOMContentLoaded', function() {
    const animatedElements = document.querySelectorAll('.card, .area-card, .contact-card');
    
    animatedElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(el);
    });
});

// Validação de telefone com máscara
document.addEventListener('DOMContentLoaded', function() {
    const telefoneInput = document.getElementById('telefone');
    
    if (telefoneInput) {
        telefoneInput.addEventListener('input', function(e) {
            let value = e.target.value;
            
            // Remove tudo que não é número
            value = value.replace(/\D/g, '');
            
            // Aplica máscara (XX) XXXXX-XXXX
            if (value.length >= 11) {
                value = value.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
            } else if (value.length >= 7) {
                value = value.replace(/(\d{2})(\d{4})(\d{0,4})/, '($1) $2-$3');
            } else if (value.length >= 3) {
                value = value.replace(/(\d{2})(\d{0,5})/, '($1) $2');
            }
            
            e.target.value = value;
        });
    }
});

// Validação visual dos campos
document.addEventListener('DOMContentLoaded', function() {
    const requiredFields = document.querySelectorAll('input[required], textarea[required]');
    
    requiredFields.forEach(field => {
        field.addEventListener('blur', function() {
            if (!this.value.trim()) {
                this.style.borderColor = '#e74c3c';
            } else {
                this.style.borderColor = '#e1e5e9';
            }
        });
        
        field.addEventListener('input', function() {
            if (this.value.trim()) {
                this.style.borderColor = '#27ae60';
            }
        });
    });
});

// Função para expandir/contrair áreas de atuação (opcional)
function toggleAreaServices(cardElement) {
    const servicesDiv = cardElement.querySelector('.area-services');
    if (servicesDiv) {
        if (servicesDiv.style.display === 'none' || !servicesDiv.style.display) {
            servicesDiv.style.display = 'block';
            cardElement.querySelector('h3').innerHTML += ' <i class="fas fa-chevron-up"></i>';
        } else {
            servicesDiv.style.display = 'none';
            const title = cardElement.querySelector('h3');
            title.innerHTML = title.innerHTML.replace(' <i class="fas fa-chevron-up"></i>', '');
        }
    }
}

// Adicionar funcionalidade de expandir áreas (opcional)
document.addEventListener('DOMContentLoaded', function() {
    const areaCards = document.querySelectorAll('.area-card');
    
    areaCards.forEach(card => {
        const servicesDiv = card.querySelector('.area-services');
        if (servicesDiv) {
            card.style.cursor = 'pointer';
            card.addEventListener('click', function() {
                toggleAreaServices(this);
            });
        }
    });
});

// Função para copiar texto (útil para telefone)
function copyToClipboard(text) {
    if (navigator.clipboard) {
        navigator.clipboard.writeText(text).then(function() {
            // Criar notificação temporária
            const notification = document.createElement('div');
            notification.textContent = 'Telefone copiado!';
            notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background: #27ae60;
                color: white;
                padding: 10px 20px;
                border-radius: 5px;
                z-index: 9999;
                font-size: 14px;
            `;
            document.body.appendChild(notification);
            
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 2000);
        });
    }
}

// Adicionar funcionalidade de copiar telefone
document.addEventListener('DOMContentLoaded', function() {
    const phoneLinks = document.querySelectorAll('a[href^="tel:"]');
    
    phoneLinks.forEach(link => {
        link.addEventListener('contextmenu', function(e) {
            e.preventDefault();
            const phoneNumber = this.textContent;
            copyToClipboard(phoneNumber);
        });
        
        // Adicionar título para indicar que pode copiar
        link.title = 'Clique para ligar ou clique com botão direito para copiar';
    });
});

// Função para detectar dispositivo móvel
function isMobile() {
    return window.innerWidth <= 768;
}

// Ajustar comportamento do WhatsApp float em mobile
document.addEventListener('DOMContentLoaded', function() {
    const whatsappFloat = document.querySelector('.whatsapp-float');
    
    if (whatsappFloat && isMobile()) {
        whatsappFloat.style.bottom = '20px';
        whatsappFloat.style.right = '20px';
        whatsappFloat.style.width = '50px';
        whatsappFloat.style.height = '50px';
        whatsappFloat.style.fontSize = '1.5rem';
    }
});

// Redimensionar elementos ao mudar orientação
window.addEventListener('orientationchange', function() {
    setTimeout(() => {
        // Reajustar elementos se necessário
        const header = document.querySelector('.header');
        if (header) {
            header.style.background = 'rgba(255, 255, 255, 0.95)';
        }
    }, 500);
});

// Função para melhorar performance em dispositivos móveis
if (isMobile()) {
    // Desabilitar hover effects em mobile
    const style = document.createElement('style');
    style.textContent = `
        @media (hover: none) {
            .card:hover,
            .area-card:hover,
            .contact-card:hover,
            .value-item:hover {
                transform: none;
                box-shadow: inherit;
            }
        }
    `;
    document.head.appendChild(style);
}

// Função para mostrar/ocultar mensagens de formulário
document.addEventListener('DOMContentLoaded', function() {
    const formMessage = document.querySelector('.form-message');
    
    if (formMessage) {
        // Auto-ocultar mensagem de sucesso após 5 segundos
        if (formMessage.classList.contains('success')) {
            setTimeout(() => {
                formMessage.style.opacity = '0';
                setTimeout(() => {
                    formMessage.style.display = 'none';
                }, 300);
            }, 5000);
        }
    }
});

// Debug: Log para verificar se o script está carregando
console.log('Site Macedo & Nagel (PHP) carregado com sucesso!');
console.log('Todas as funcionalidades estão ativas.');

// Função para mostrar informações do site no console
console.log(`
🏛️ MACEDO & NAGEL ADVOCACIA (PHP Version)
📞 WhatsApp: (47) 99727-6540
📍 Pouso Redondo/SC
⚖️ Direito Trabalhista | Previdenciário | Família | Cível
🔧 Tecnologia: PHP + HTML + CSS + JavaScript
`);

// Easter egg - Konami Code
let konamiCode = [];
const konamiSequence = [
    'ArrowUp', 'ArrowUp', 'ArrowDown', 'ArrowDown',
    'ArrowLeft', 'ArrowRight', 'ArrowLeft', 'ArrowRight',
    'KeyB', 'KeyA'
];

document.addEventListener('keydown', function(e) {
    konamiCode.push(e.code);
    
    if (konamiCode.length > konamiSequence.length) {
        konamiCode.shift();
    }
    
    if (konamiCode.join('') === konamiSequence.join('')) {
        // Easter egg ativado
        document.body.style.filter = 'hue-rotate(180deg)';
        setTimeout(() => {
            document.body.style.filter = 'none';
        }, 3000);
        
        console.log('🎉 Easter egg ativado! Site PHP desenvolvido com ❤️ pela equipe Manus AI');
        konamiCode = [];
    }
});
