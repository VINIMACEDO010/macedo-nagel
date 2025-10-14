<?php
/**
 * Configurações do Site Macedo & Nagel Advocacia
 * 
 * Este arquivo contém todas as configurações e informações
 * que podem ser facilmente modificadas sem alterar o código principal.
 */

// Configurações gerais do site
define('SITE_NAME', 'Macedo & Nagel Advocacia');
define('SITE_TAGLINE', 'Advocacia e Consultoria Jurídica');
define('SITE_DESCRIPTION', 'Advocacia especializada em Direito Trabalhista, Previdenciário, Família e Cível em Santa Catarina');

// Informações de contato
define('PHONE', '(47) 99727-6540');
define('WHATSAPP', '5547997276540');
define('EMAIL', 'contato@macedonagel.adv.br');
define('ADDRESS', 'Avenida Ari Verdi, nº 997');
define('CITY', 'Centro – Pouso Redondo/SC');
define('CEP', '89172-000');
define('INSTAGRAM', '@macedonagel.advocacia');

// Horário de funcionamento
define('BUSINESS_HOURS', 'Segunda a sexta, das 8:30 às 17:30');
define('EMERGENCY_NOTE', 'Plantão disponível para emergências');

// Informações das advogadas
$advogadas = [
    [
        'nome' => 'Leticia Policarpo Macedo Fronza',
        'oab' => 'OAB/SC 70.491',
        'foto_portrait' => 'assets/leticia-portrait.jpeg',
        'foto_business' => 'assets/leticia-business.jpeg',
        'foto_office' => 'assets/leticia-office.jpeg',
        'foto_oab' => 'assets/leticia-oab.jpeg'
    ],
    [
        'nome' => 'Raquel Nagel Dolzan',
        'oab' => 'OAB/SC 64.503',
        'foto_portrait' => 'assets/raquel-casual.jpeg',
        'foto_oab' => 'assets/raquel-oab.jpeg'
    ]
];

// Áreas de atuação
$areas_atuacao = [
    [
        'titulo' => 'Direito Trabalhista',
        'descricao' => 'Defesa dos direitos dos trabalhadores e assessoria empresarial em questões trabalhistas.',
        'servicos' => [
            'Rescisões contratuais',
            'Horas extras e adicional noturno',
            'Insalubridade e periculosidade',
            'Assédio moral e discriminação',
            'Acidentes de trabalho'
        ],
        'icone' => 'fas fa-briefcase'
    ],
    [
        'titulo' => 'Direito Previdenciário',
        'descricao' => 'Aposentadorias, pensões, auxílios e revisões de benefícios previdenciários.',
        'servicos' => [
            'Aposentadoria por tempo de contribuição',
            'Aposentadoria por idade',
            'Auxílio-doença e auxílio-acidente',
            'Pensão por morte',
            'Revisão de benefícios'
        ],
        'icone' => 'fas fa-shield-alt'
    ],
    [
        'titulo' => 'Direito Cível',
        'descricao' => 'Contratos, responsabilidade civil, direitos reais e questões patrimoniais.',
        'servicos' => [
            'Elaboração e revisão de contratos',
            'Ações de cobrança',
            'Indenizações por danos',
            'Questões condominiais',
            'Direitos do consumidor'
        ],
        'icone' => 'fas fa-balance-scale'
    ],
    [
        'titulo' => 'Direito de Família',
        'descricao' => 'Divórcio, guarda, pensão alimentícia, inventário e questões familiares.',
        'servicos' => [
            'Divórcio consensual e litigioso',
            'Guarda compartilhada',
            'Pensão alimentícia',
            'Inventário e partilha',
            'União estável'
        ],
        'icone' => 'fas fa-home'
    ],
    [
        'titulo' => 'Cobranças Extrajudiciais e Judiciais',
        'descricao' => 'Recuperação de créditos e negociação de dívidas de forma eficiente.',
        'servicos' => [
            'Notificações extrajudiciais',
            'Execução de títulos',
            'Acordos de parcelamento',
            'Protestos de títulos',
            'Negociação de dívidas'
        ],
        'icone' => 'fas fa-dollar-sign'
    ],
    [
        'titulo' => 'Direito Criminal',
        'descricao' => 'Defesa criminal e assessoria em processos penais com expertise e dedicação.',
        'servicos' => [
            'Defesa em inquéritos policiais',
            'Acompanhamento processual',
            'Recursos criminais',
            'Habeas corpus',
            'Liberdade provisória'
        ],
        'icone' => 'fas fa-gavel'
    ]
];

// Valores do escritório
$valores = [
    ['icone' => 'fas fa-balance-scale', 'titulo' => 'Ética'],
    ['icone' => 'fas fa-heart', 'titulo' => 'Comprometimento'],
    ['icone' => 'fas fa-users', 'titulo' => 'Empatia'],
    ['icone' => 'fas fa-handshake', 'titulo' => 'Respeito à Diversidade'],
    ['icone' => 'fas fa-shield-alt', 'titulo' => 'Sigilo Profissional'],
    ['icone' => 'fas fa-check-circle', 'titulo' => 'Responsabilidade Social']
];

// Diferenciais do escritório
$diferenciais = [
    ['icone' => 'fas fa-user-check', 'titulo' => 'Atendimento Personalizado'],
    ['icone' => 'fas fa-comments', 'titulo' => 'Linguagem Acessível'],
    ['icone' => 'fas fa-bolt', 'titulo' => 'Atualização Constante'],
    ['icone' => 'fas fa-comment-dots', 'titulo' => 'Agilidade na Comunicação'],
    ['icone' => 'fas fa-target', 'titulo' => 'Foco em Soluções Práticas']
];

// Missão do escritório
$missao = "Nossa missão é oferecer um atendimento jurídico ético, humanizado e eficiente, atuando com excelência na defesa dos direitos de nossos clientes. Buscamos soluções legais assertivas, prezando sempre pela confiança, transparência e resultados concretos.";

// Hero section
$hero = [
    'titulo' => 'Unimos força, conhecimento e profissionalismo',
    'subtitulo' => 'Para, juntas, entregar toda a dedicação e comprometimento que nossos clientes merecem.',
    'imagem_fundo' => 'assets/FotoJuntas.jpeg'
];

// SEO e Meta Tags
$seo = [
    'title' => SITE_NAME . ' - ' . SITE_TAGLINE . ' em Santa Catarina',
    'description' => SITE_DESCRIPTION,
    'keywords' => 'Advocacia em Pouso Redondo, Advogada em Santa Catarina, Direito Trabalhista SC, Direito Previdenciário SC, Direito de Família SC, Escritório de advocacia Pouso Redondo, Advogada trabalhista Santa Catarina, Consultoria jurídica SC',
    'author' => SITE_NAME,
    'robots' => 'index, follow',
    'og_image' => 'assets/Logo.jpeg',
    'og_type' => 'website'
];

// Configurações de email (para formulário de contato)
$email_config = [
    'smtp_host' => 'smtp.gmail.com', // Altere conforme seu provedor
    'smtp_port' => 587,
    'smtp_username' => '', // Adicione seu email
    'smtp_password' => '', // Adicione sua senha
    'from_email' => EMAIL,
    'from_name' => SITE_NAME,
    'to_email' => EMAIL // Email que receberá as mensagens do formulário
];

// Configurações do Google Analytics (opcional)
define('GOOGLE_ANALYTICS_ID', ''); // Adicione seu ID do GA4

// Configurações do Google Maps
$maps_config = [
    'latitude' => '-27.2584',
    'longitude' => '-49.9376',
    'zoom' => 15,
    'api_key' => '' // Adicione sua chave da API do Google Maps se necessário
];

// Redes sociais
$redes_sociais = [
    'instagram' => [
        'url' => 'https://instagram.com/macedonagel.advocacia',
        'usuario' => INSTAGRAM,
        'ativo' => true
    ],
    'facebook' => [
        'url' => '',
        'usuario' => '',
        'ativo' => false
    ],
    'linkedin' => [
        'url' => '',
        'usuario' => '',
        'ativo' => false
    ]
];

// Função para gerar URL do WhatsApp
function getWhatsAppURL($mensagem = '') {
    if (empty($mensagem)) {
        $mensagem = 'Olá! Gostaria de mais informações sobre os serviços jurídicos.';
    }
    return 'https://wa.me/' . WHATSAPP . '?text=' . urlencode($mensagem);
}

// Função para formatar telefone
function formatPhone($phone) {
    return $phone;
}

// Função para gerar structured data (Schema.org)
function getStructuredData() {
    global $advogadas, $areas_atuacao;
    
    $structured_data = [
        '@context' => 'https://schema.org',
        '@type' => 'LegalService',
        'name' => SITE_NAME,
        'description' => SITE_DESCRIPTION,
        'telephone' => '+55-47-99727-6540',
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => ADDRESS,
            'addressLocality' => 'Pouso Redondo',
            'addressRegion' => 'SC',
            'postalCode' => CEP,
            'addressCountry' => 'BR'
        ],
        'geo' => [
            '@type' => 'GeoCoordinates',
            'latitude' => '-27.2584',
            'longitude' => '-49.9376'
        ],
        'openingHours' => 'Mo-Fr 08:30-17:30',
        'areaServed' => [
            '@type' => 'State',
            'name' => 'Santa Catarina'
        ],
        'serviceType' => array_column($areas_atuacao, 'titulo'),
        'founder' => []
    ];
    
    foreach ($advogadas as $advogada) {
        $structured_data['founder'][] = [
            '@type' => 'Person',
            'name' => $advogada['nome'],
            'jobTitle' => 'Advogada',
            'memberOf' => [
                '@type' => 'Organization',
                'name' => 'OAB/SC',
                'identifier' => str_replace('OAB/SC ', '', $advogada['oab'])
            ]
        ];
    }
    
    return json_encode($structured_data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}

// Configurações de desenvolvimento
define('DEBUG_MODE', false); // Mude para true durante desenvolvimento
define('CACHE_ENABLED', true); // Cache de arquivos CSS/JS

// Versão do site (para cache busting)
define('SITE_VERSION', '1.0.0');
?>
