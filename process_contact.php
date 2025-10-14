<?php
/**
 * Processamento do Formulário de Contato
 * Macedo & Nagel Advocacia
 */

// Verificar se o formulário foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['contact_form'])) {
    header('Location: index.php');
    exit;
}

// Função para limpar dados de entrada
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Função para validar email
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Função para validar telefone (formato brasileiro)
function validatePhone($phone) {
    $phone = preg_replace('/[^0-9]/', '', $phone);
    return strlen($phone) >= 10 && strlen($phone) <= 11;
}

// Capturar e sanitizar dados do formulário
$nome = sanitizeInput($_POST['nome'] ?? '');
$email = sanitizeInput($_POST['email'] ?? '');
$telefone = sanitizeInput($_POST['telefone'] ?? '');
$mensagem = sanitizeInput($_POST['mensagem'] ?? '');

// Array para armazenar erros
$errors = [];

// Validações
if (empty($nome)) {
    $errors[] = 'Nome é obrigatório';
} elseif (strlen($nome) < 2) {
    $errors[] = 'Nome deve ter pelo menos 2 caracteres';
}

if (empty($email)) {
    $errors[] = 'E-mail é obrigatório';
} elseif (!validateEmail($email)) {
    $errors[] = 'E-mail inválido';
}

if (empty($telefone)) {
    $errors[] = 'Telefone é obrigatório';
} elseif (!validatePhone($telefone)) {
    $errors[] = 'Telefone inválido';
}

if (empty($mensagem)) {
    $errors[] = 'Mensagem é obrigatória';
} elseif (strlen($mensagem) < 10) {
    $errors[] = 'Mensagem deve ter pelo menos 10 caracteres';
}

// Se houver erros, exibir mensagem de erro
if (!empty($errors)) {
    $form_message = 'Erro: ' . implode(', ', $errors);
    return;
}

// Preparar dados para envio
$data_envio = date('d/m/Y H:i:s');
$ip_cliente = $_SERVER['REMOTE_ADDR'] ?? 'Desconhecido';
$user_agent = $_SERVER['HTTP_USER_AGENT'] ?? 'Desconhecido';

// Opção 1: Redirecionar para WhatsApp (Método Principal)
$whatsapp_message = "🏛️ *NOVO CONTATO - SITE ADVOCACIA*\n\n";
$whatsapp_message .= "👤 *Nome:* {$nome}\n";
$whatsapp_message .= "📧 *E-mail:* {$email}\n";
$whatsapp_message .= "📱 *Telefone:* {$telefone}\n";
$whatsapp_message .= "💬 *Mensagem:* {$mensagem}\n\n";
$whatsapp_message .= "📅 *Data:* {$data_envio}\n";
$whatsapp_message .= "🌐 *Origem:* Site Oficial";

$whatsapp_url = getWhatsAppURL($whatsapp_message);

// Opção 2: Salvar em arquivo (Backup)
$log_entry = [
    'data' => $data_envio,
    'nome' => $nome,
    'email' => $email,
    'telefone' => $telefone,
    'mensagem' => $mensagem,
    'ip' => $ip_cliente,
    'user_agent' => $user_agent
];

// Criar diretório de logs se não existir
if (!file_exists('logs')) {
    mkdir('logs', 0755, true);
}

// Salvar em arquivo de log
$log_file = 'logs/contatos_' . date('Y-m') . '.json';
$existing_logs = [];

if (file_exists($log_file)) {
    $existing_logs = json_decode(file_get_contents($log_file), true) ?: [];
}

$existing_logs[] = $log_entry;
file_put_contents($log_file, json_encode($existing_logs, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

// Opção 3: Enviar por email (se configurado)
if (!empty($email_config['smtp_username']) && function_exists('mail')) {
    $subject = "Novo contato do site - {$nome}";
    $email_body = "
    <html>
    <head>
        <title>Novo Contato - {$nome}</title>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
            .header { background: #d4af37; color: white; padding: 20px; text-align: center; }
            .content { padding: 20px; }
            .info-table { width: 100%; border-collapse: collapse; margin: 20px 0; }
            .info-table th, .info-table td { border: 1px solid #ddd; padding: 12px; text-align: left; }
            .info-table th { background-color: #f2f2f2; }
            .message-box { background: #f9f9f9; padding: 15px; border-left: 4px solid #d4af37; margin: 20px 0; }
        </style>
    </head>
    <body>
        <div class='header'>
            <h2>Novo Contato do Site</h2>
            <p>Macedo & Nagel Advocacia</p>
        </div>
        <div class='content'>
            <h3>Informações do Contato:</h3>
            <table class='info-table'>
                <tr><th>Nome</th><td>{$nome}</td></tr>
                <tr><th>E-mail</th><td>{$email}</td></tr>
                <tr><th>Telefone</th><td>{$telefone}</td></tr>
                <tr><th>Data/Hora</th><td>{$data_envio}</td></tr>
                <tr><th>IP</th><td>{$ip_cliente}</td></tr>
            </table>
            
            <h3>Mensagem:</h3>
            <div class='message-box'>
                " . nl2br(htmlspecialchars($mensagem)) . "
            </div>
            
            <p><strong>Ação recomendada:</strong> Entre em contato com o cliente o mais breve possível.</p>
        </div>
    </body>
    </html>
    ";
    
    $headers = [
        'MIME-Version: 1.0',
        'Content-type: text/html; charset=UTF-8',
        'From: ' . $email_config['from_name'] . ' <' . $email_config['from_email'] . '>',
        'Reply-To: ' . $email . '',
        'X-Mailer: PHP/' . phpversion()
    ];
    
    // Tentar enviar email
    $email_sent = mail($email_config['to_email'], $subject, $email_body, implode("\r\n", $headers));
}

// Definir mensagem de sucesso
$form_message = "Mensagem enviada com sucesso! Redirecionando para o WhatsApp...";

// JavaScript para redirecionar para WhatsApp após 2 segundos
echo "<script>
    setTimeout(function() {
        window.open('{$whatsapp_url}', '_blank');
    }, 2000);
</script>";

// Opcional: Redirecionar automaticamente
// header("Location: {$whatsapp_url}");
// exit;
?>
