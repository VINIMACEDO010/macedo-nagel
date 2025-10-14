<?php
/**
 * Site Macedo & Nagel Advocacia
 * Página Principal
 */

require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- SEO Meta Tags -->
    <title><?php echo $seo['title']; ?></title>
    <meta name="description" content="<?php echo $seo['description']; ?>">
    <meta name="keywords" content="<?php echo $seo['keywords']; ?>">
    <meta name="author" content="<?php echo $seo['author']; ?>">
    <meta name="robots" content="<?php echo $seo['robots']; ?>">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="<?php echo $seo['title']; ?>">
    <meta property="og:description" content="<?php echo $seo['description']; ?>">
    <meta property="og:type" content="<?php echo $seo['og_type']; ?>">
    <meta property="og:image" content="<?php echo $seo['og_image']; ?>">
    <meta property="og:url" content="<?php echo 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo $seo['title']; ?>">
    <meta name="twitter:description" content="<?php echo $seo['description']; ?>">
    <meta name="twitter:image" content="<?php echo $seo['og_image']; ?>">
    
    <!-- Favicon -->
    <link rel="icon" type="image/jpeg" href="assets/Logo.jpeg">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- CSS -->
    <link rel="stylesheet" href="css/styles.css?v=<?php echo SITE_VERSION; ?>">
    
    <?php if (GOOGLE_ANALYTICS_ID): ?>
    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo GOOGLE_ANALYTICS_ID; ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '<?php echo GOOGLE_ANALYTICS_ID; ?>');
    </script>
    <?php endif; ?>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="nav-wrapper">
                <div class="logo">
                    <img src="assets/Logo.jpeg" alt="<?php echo SITE_NAME; ?> Logo">
                </div>
                
                <!-- Desktop Menu -->
                <nav class="nav-desktop">
                    <a href="#inicio" class="nav-link">Início</a>
                    <a href="#sobre" class="nav-link">Sobre Nós</a>
                    <a href="#areas" class="nav-link">Áreas de Atuação</a>
                    <a href="#contato" class="nav-link">Contato</a>
                    <a href="<?php echo getWhatsAppURL(); ?>" target="_blank" class="btn-whatsapp">
                        Contate via WhatsApp
                    </a>
                </nav>

                <!-- Mobile Menu Button -->
                <button class="mobile-menu-btn" onclick="toggleMobileMenu()">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

            <!-- Mobile Menu -->
            <nav class="nav-mobile" id="mobileMenu">
                <a href="#inicio" class="nav-link" onclick="closeMobileMenu()">Início</a>
                <a href="#sobre" class="nav-link" onclick="closeMobileMenu()">Sobre Nós</a>
                <a href="#areas" class="nav-link" onclick="closeMobileMenu()">Áreas de Atuação</a>
                <a href="#contato" class="nav-link" onclick="closeMobileMenu()">Contato</a>
                <a href="<?php echo getWhatsAppURL(); ?>" target="_blank" class="btn-whatsapp">
                    Contate via WhatsApp
                </a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="inicio" class="hero" style="background-image: url('<?php echo $hero['imagem_fundo']; ?>');">
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title"><?php echo $hero['titulo']; ?></h1>
                <p class="hero-subtitle"><?php echo $hero['subtitulo']; ?></p>
                <div class="hero-buttons">
                    <a href="#contato" class="btn btn-primary">
                        Agende sua Consulta
                        <i class="fas fa-arrow-right"></i>
                    </a>
                    <a href="#areas" class="btn btn-secondary">
                        Nossas Especialidades
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="sobre" class="about">
        <div class="container">
            <div class="section-header">
                <h2>Conheça a <span class="text-gold"><?php echo SITE_NAME; ?></span></h2>
            </div>

            <div class="about-grid">
                <!-- Nossa Missão -->
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-bullseye text-gold"></i>
                        <h3>Nossa Missão</h3>
                    </div>
                    <div class="card-content">
                        <p><?php echo $missao; ?></p>
                    </div>
                </div>

                <!-- Nossa Equipe -->
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-users text-gold"></i>
                        <h3>Nossa Equipe</h3>
                    </div>
                    <div class="card-content">
                        <?php foreach ($advogadas as $advogada): ?>
                        <div class="team-member">
                            <img src="<?php echo $advogada['foto_portrait']; ?>" alt="<?php echo $advogada['nome']; ?>" class="team-photo">
                            <div class="team-info">
                                <h4><?php echo $advogada['nome']; ?></h4>
                                <p class="oab"><?php echo $advogada['oab']; ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Valores e Diferenciais -->
            <div class="values-grid">
                <div class="values-section">
                    <h3>Nossos <span class="text-gold">Valores</span></h3>
                    <div class="values-list">
                        <?php foreach ($valores as $valor): ?>
                        <div class="value-item">
                            <i class="<?php echo $valor['icone']; ?>"></i>
                            <span><?php echo $valor['titulo']; ?></span>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="values-section">
                    <h3>Nossos <span class="text-gold">Diferenciais</span></h3>
                    <div class="values-list">
                        <?php foreach ($diferenciais as $diferencial): ?>
                        <div class="value-item">
                            <i class="<?php echo $diferencial['icone']; ?>"></i>
                            <span><?php echo $diferencial['titulo']; ?></span>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Areas de Atuação -->
    <section id="areas" class="areas">
        <div class="container">
            <div class="section-header">
                <h2>Nossas <span class="text-gold">Áreas de Atuação</span></h2>
                <p>Atuamos com foco em Santa Catarina, oferecendo assessoria jurídica completa e especializada para garantir a defesa dos seus direitos.</p>
            </div>

            <div class="areas-grid">
                <?php foreach ($areas_atuacao as $area): ?>
                <div class="area-card">
                    <div class="area-icon">
                        <i class="<?php echo $area['icone']; ?>"></i>
                    </div>
                    <h3><?php echo $area['titulo']; ?></h3>
                    <p><?php echo $area['descricao']; ?></p>
                    
                    <!-- Serviços (opcional - pode ser expandido com JavaScript) -->
                    <div class="area-services" style="display: none;">
                        <h4>Serviços incluídos:</h4>
                        <ul>
                            <?php foreach ($area['servicos'] as $servico): ?>
                            <li><?php echo $servico; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contato" class="contact">
        <div class="container">
            <div class="section-header">
                <h2>Entre em <span class="text-gold">Contato Conosco</span></h2>
            </div>

            <div class="contact-grid">
                <!-- Formulário -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-gold">Envie sua Mensagem</h3>
                        <p>Preencha o formulário abaixo e entraremos em contato o mais breve possível.</p>
                    </div>
                    <div class="card-content">
                        <?php
                        // Verificar se o formulário foi enviado
                        $form_message = '';
                        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_form'])) {
                            include 'process_contact.php';
                        }
                        ?>
                        
                        <?php if ($form_message): ?>
                        <div class="form-message <?php echo strpos($form_message, 'Erro') !== false ? 'error' : 'success'; ?>">
                            <?php echo $form_message; ?>
                        </div>
                        <?php endif; ?>
                        
                        <form id="contactForm" class="contact-form" method="POST">
                            <input type="hidden" name="contact_form" value="1">
                            
                            <div class="form-group">
                                <label for="nome">Nome Completo *</label>
                                <input type="text" id="nome" name="nome" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="email">E-mail *</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="telefone">Telefone/WhatsApp *</label>
                                <input type="tel" id="telefone" name="telefone" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="mensagem">Mensagem *</label>
                                <textarea id="mensagem" name="mensagem" rows="4" required></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">
                                Enviar Mensagem
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Informações de Contato -->
                <div class="contact-info">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fab fa-whatsapp"></i>
                        </div>
                        <div class="contact-details">
                            <h4>WhatsApp</h4>
                            <a href="tel:+<?php echo WHATSAPP; ?>"><?php echo PHONE; ?></a>
                        </div>
                    </div>

                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Endereço</h4>
                            <p><?php echo ADDRESS; ?><br><?php echo CITY; ?></p>
                        </div>
                    </div>

                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Horário de Funcionamento</h4>
                            <p><?php echo BUSINESS_HOURS; ?><br><span class="text-gold"><?php echo EMERGENCY_NOTE; ?></span></p>
                        </div>
                    </div>

                    <?php if ($redes_sociais['instagram']['ativo']): ?>
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fab fa-instagram"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Redes Sociais</h4>
                            <a href="<?php echo $redes_sociais['instagram']['url']; ?>" target="_blank"><?php echo $redes_sociais['instagram']['usuario']; ?></a>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- Google Maps -->
                    <div class="map-container">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3537.8234567890123!2d<?php echo $maps_config['longitude']; ?>!3d<?php echo $maps_config['latitude']; ?>!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2z<?php echo urlencode($maps_config['latitude'] . ',' . $maps_config['longitude']); ?>!5e0!3m2!1spt-BR!2sbr!4v1234567890123!5m2!1spt-BR!2sbr"
                            width="100%"
                            height="200"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-section">
                    <img src="assets/Logo.jpeg" alt="<?php echo SITE_NAME; ?> Logo" class="footer-logo">
                    <p><?php echo SITE_TAGLINE; ?> especializada em Santa Catarina.</p>
                </div>
                
                <div class="footer-section">
                    <h4>Contato</h4>
                    <div class="footer-contact">
                        <p><i class="fas fa-phone"></i> <?php echo PHONE; ?></p>
                        <p><i class="fas fa-map-marker-alt"></i> <?php echo ADDRESS; ?> - <?php echo CITY; ?></p>
                    </div>
                </div>
                
                <div class="footer-section">
                    <h4>Áreas de Atuação</h4>
                    <ul class="footer-areas">
                        <?php foreach (array_slice($areas_atuacao, 0, 4) as $area): ?>
                        <li><?php echo $area['titulo']; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> <?php echo SITE_NAME; ?>. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp Button -->
    <a href="<?php echo getWhatsAppURL(); ?>" 
       target="_blank" 
       class="whatsapp-float"
       aria-label="Contato via WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- JavaScript -->
    <script src="js/script.js?v=<?php echo SITE_VERSION; ?>"></script>

    <!-- Structured Data -->
    <script type="application/ld+json">
    <?php echo getStructuredData(); ?>
    </script>
</body>
</html>
