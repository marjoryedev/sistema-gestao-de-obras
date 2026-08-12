<?php
require_once __DIR__ . '/auth.php';
iniciar_sessao();
if (!empty($_SESSION['usuario_id'])) { header('Location: index.php'); exit; }
$csrf = token_csrf();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login — Gestão de Obras</title>
<style>
@import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600&display=swap');
*{box-sizing:border-box;margin:0;padding:0}body{font-family:'IBM Plex Sans',Arial,sans-serif;background:#3d5a6c;min-height:100vh;display:flex;align-items:center;justify-content:center;padding:20px}.card{background:#fff;border-radius:16px;padding:40px 36px;width:100%;max-width:400px;box-shadow:0 8px 40px rgba(0,0,0,.2)}.logo{text-align:center;margin-bottom:28px}.logo .icone{font-size:40px;display:block;margin-bottom:10px}.logo h1{font-size:18px;font-weight:600;color:#1a2530}.logo p{font-size:13px;color:#5a6a75;margin-top:4px}hr{border:0;border-top:1px solid #e0e6ea;margin-bottom:24px}.campo{margin-bottom:16px}.campo label{display:block;font-size:11.5px;font-weight:600;color:#5a6a75;text-transform:uppercase;letter-spacing:.05em;margin-bottom:5px}.campo input{width:100%;padding:11px 14px;border:1px solid #d4dde3;border-radius:10px;font-size:14px;font-family:inherit;color:#1a2530;background:#fafbfc}.campo input:focus{outline:none;border-color:#3d5a6c;box-shadow:0 0 0 3px rgba(61,90,108,.12);background:#fff}.btn{width:100%;margin-top:8px;padding:13px;background:#3d5a6c;color:#fff;border:0;border-radius:10px;font-size:15px;font-family:inherit;font-weight:600;cursor:pointer}.btn:hover{background:#2c4255}.btn:disabled{background:#a0b0bb;cursor:not-allowed}.msg{margin-top:14px;padding:10px 14px;border-radius:10px;font-size:13px;font-weight:500;display:none;background:#fdeaea;color:#a32d2d;border:1px solid #f5b7b1}.rodape{text-align:center;margin-top:20px;font-size:12px;color:#a0b0bb}
</style>
</head>
<body>
<div class="card">
<div class="logo"><span class="icone">🏗️</span><h1>Plataforma de Construção Civil</h1><p>Faça login para acessar o sistema</p></div>
<hr>
<form id="login-form">
<input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf, ENT_QUOTES, 'UTF-8') ?>">
<div class="campo"><label for="usuario">Usuário</label><input id="usuario" name="usuario" type="text" placeholder="Digite seu usuário" autocomplete="username" maxlength="100" required></div>
<div class="campo"><label for="senha">Senha</label><input id="senha" name="senha" type="password" placeholder="Digite sua senha" autocomplete="current-password" maxlength="255" required></div>
<button class="btn" id="btn" type="submit">🔐 Entrar</button>
</form>
<div class="msg" id="msg"></div><p class="rodape">Plataforma de Gestão de Obras</p>
</div>
<script>
const form=document.getElementById('login-form'),btn=document.getElementById('btn'),msg=document.getElementById('msg');
form.addEventListener('submit',async e=>{e.preventDefault();msg.style.display='none';btn.disabled=true;btn.textContent='Entrando...';try{const r=await fetch('processar_login.php',{method:'POST',body:new FormData(form)});const j=await r.json();if(!r.ok)throw new Error(j.erro||'Não foi possível entrar.');location.href='index.php';}catch(err){msg.textContent='❌ '+err.message;msg.style.display='block';btn.disabled=false;btn.textContent='🔐 Entrar';}});
</script>
</body>
</html>
