<div align="center" id="top">
  <h1>Barbearia</h1>
  <p>Aplicação web de gestão para barbearia com autenticação, controle de acesso por função e dashboards personalizados.</p>
</div>

<p align="center">
  <a href="#sobre">Sobre</a> &#xa0; | &#xa0;
  <a href="#recursos">Recursos</a> &#xa0; | &#xa0;
  <a href="#tecnologias">Tecnologias</a> &#xa0; | &#xa0;
  <a href="#requisitos">Requisitos</a> &#xa0; | &#xa0;
  <a href="#instalacao">Instalação</a> &#xa0; | &#xa0;
  <a href="#licenca">Licença</a>
</p>

## Sobre

Projeto Laravel para gerenciamento de barbearia com login, cadastro, perfil de usuário e painéis diferenciados por função: cliente, gerente e administrador.

A aplicação usa Laravel 12, Laravel Breeze e frontend com Vite, Tailwind CSS, Blade e Alpine.js.

## Recursos

- Autenticação com registro, login e recuperação de senha
- Controle de acesso por roles: `client`, `manager` e `admin`
- Dashboards personalizados para cada tipo de usuário
- Área de perfil para edição de dados e exclusão de conta
- Middleware customizado para proteção de rotas
- Tema escuro com persistência local
- Layout responsivo para desktop e mobile

## Tecnologias

- PHP 8.2+
- Laravel 12
- Laravel Breeze
- Vite
- Tailwind CSS
- Alpine.js
- Blade
- MySQL / SQLite

## Requisitos

Antes de começar, instale:

- PHP 8.2 ou superior
- Composer
- Node.js 18+ ou compatível
- Git

## Instalação

```bash
# 1. Clone o repositório
git clone https://github.com/KreatorLima/barbearia.git
cd barbearia

# 2. Instale dependências PHP
composer install

# 3. Copie o arquivo de ambiente
copy .env.example .env

# 4. Gere a chave da aplicação
php artisan key:generate

# 5. Ajuste as variáveis de ambiente em .env
# Exemplo: DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD

# 6. Execute as migrations
php artisan migrate

# 7. Instale dependências Node
npm install

# 8. Compile os assets
npm run build

# 9. Inicie o servidor
php artisan serve
```

A aplicação estará disponível em: http://localhost:8000

### Desenvolvimento

```bash
npm run dev
```

## Estrutura do Projeto

- `app/Http/Controllers/` - controladores de autenticação, dashboard e perfil
- `app/Http/Middleware/` - middleware para validação de roles e permissões
- `app/Models/User.php` - modelo de usuário com campo `role`
- `resources/views/` - views Blade para dashboards, autenticação e perfil
- `routes/web.php` - rotas principais
- `routes/auth.php` - rotas de autenticação
- `database/migrations/` - migrations do banco de dados
- `database/seeders/` - seeders iniciais

## Páginas do Projeto

- `GET /` — Página inicial pública com apresentação da barbearia, seções de serviços, equipe e depoimentos, além de navegação para agendar horário.
- `GET /login` — Tela de acesso ao sistema para clientes, gerentes e administradores. Possui campos de e-mail e senha, links para recuperação de senha e registro.
- `GET /register` — Página de cadastro de novo usuário com criação de conta e validação de dados.
- `GET /forgot-password` e `GET /reset-password/{token}` — Fluxo de recuperação de senha oferecido pelo Laravel Breeze.
- `GET /profile` — Página de perfil do usuário autenticado onde é possível atualizar informações pessoais, alterar senha e excluir a conta.
- `GET /agendamento` — Formulário de agendamento de horário com seleção de serviço, profissional e data/hora, mais resumo de valores e campos de contato.
- `GET /client/dashboard` — Dashboard do cliente com exibição de informações personalizadas e acesso às funcionalidades de cliente.
- `GET /manager/dashboard` — Dashboard do gerente com visão operacional, estatísticas e lista de agendamentos do dia.
- `GET /admin/dashboard` — Dashboard do administrador para controle de sistema e administração geral.

## Roles e Dashboards

A aplicação define três roles principais:

- `client` — dashboard de cliente
- `manager` — dashboard de gerente
- `admin` — dashboard de administrador

Usuários novos são criados como `client` por padrão. Para alterar a role de um usuário, atualize o registro diretamente no banco de dados.

## Arquivos importantes

- `app/Http/Middleware/CheckRole.php`
- `app/Http/Middleware/CheckAdmin.php`
- `resources/views/dashboards/client.blade.php`
- `resources/views/dashboards/manager.blade.php`
- `resources/views/dashboards/admin.blade.php`

## Licença

Este projeto está licenciado sob a licença MIT.
