<div align="center" id="top">
  <h1>Barbearia</h1>
  <p>Aplicação web para agendamento de serviços e gestão de uma barbearia, com áreas para clientes, barbeiros e administradores.</p>
</div>

<p align="center">
  <a href="#sobre">Sobre</a> &#xa0; | &#xa0;
  <a href="#recursos">Recursos</a> &#xa0; | &#xa0;
  <a href="#tecnologias">Tecnologias</a> &#xa0; | &#xa0;
  <a href="#instalacao">Instalação</a> &#xa0; | &#xa0;
  <a href="#rotas">Rotas</a> &#xa0; | &#xa0;
  <a href="#licenca">Licença</a>
</p>

## Sobre

Projeto desenvolvido com Laravel para apresentar a barbearia, permitir agendamentos online e oferecer painéis de gestão conforme o perfil de acesso. O sistema possui três funções: `client` (cliente), `manager` (barbeiro/equipe) e `admin` (administrador).

## Recursos

- Cadastro, login, logout, verificação de e-mail e recuperação de senha
- Controle de acesso às áreas de cliente, gerente e administrador por função
- Página pública com apresentação da barbearia, serviços e equipe
- Agendamento com escolha de serviço, barbeiro, data e horário
- Exibição de horários ocupados e validação de conflitos no envio
- Registro de contato do cliente e observações do agendamento
- Preços associados aos serviços no momento do agendamento
- Painel do barbeiro com os atendimentos do próprio profissional no dia
- Conclusão de atendimentos pelo painel da equipe
- Painel administrativo com indicadores, faturamento semanal e ranking de barbeiros
- Configuração da meta mensal e cadastro de perfis de barbeiro pelo painel administrativo
- Perfil de usuário com atualização de dados e senha e opção de exclusão da conta
- Alternância entre tema claro e escuro e interfaces responsivas para desktop e celular

## Tecnologias

- PHP 8.2 ou superior
- Laravel 12 e Laravel Breeze
- Blade
- Vite
- Tailwind CSS
- Alpine.js
- MySQL ou SQLite (conforme a configuração do ambiente)

## Requisitos

- PHP 8.2 ou superior e extensões exigidas pelo Laravel
- Composer
- Node.js e npm compatíveis com as dependências do projeto
- Git
- Um banco de dados configurado, como MySQL ou SQLite

## Instalação

Os comandos abaixo consideram um terminal Bash. No PowerShell, use `Copy-Item .env.example .env` no lugar de `cp`.

```bash
# Clone o repositório
git clone https://github.com/KreatorLima/barbearia.git
cd barbearia

# Instale as dependências PHP
composer install

# Crie o arquivo de ambiente e configure o banco em .env
cp .env.example .env

# Gere a chave da aplicação
php artisan key:generate

# Crie/atualize as tabelas do banco
php artisan migrate

# Instale as dependências do frontend e compile os arquivos
npm install
npm run build

# Inicie o servidor local
php artisan serve
```

A aplicação ficará disponível em <http://localhost:8000>.

Para desenvolvimento com recompilação dos arquivos do frontend, execute em outro terminal:

```bash
npm run dev
```

## Rotas

| Método | Rota | Acesso | Descrição |
| --- | --- | --- | --- |
| `GET` | `/` | Público | Página inicial da barbearia |
| `GET` | `/agendamento` | Público | Formulário e horários disponíveis para agendamento |
| `POST` | `/agendamento` | Público | Valida e registra um agendamento |
| `GET` | `/login` | Público | Acesso à conta |
| `GET` / `POST` | `/register` | Público | Cadastro de cliente |
| `GET` | `/forgot-password` | Público | Solicitação de redefinição de senha |
| `GET` | `/reset-password/{token}` | Público | Redefinição de senha |
| `GET` | `/dashboard` | Autenticado e verificado | Redireciona à área correspondente à função do usuário |
| `GET` | `/profile` | Autenticado | Visualização e edição do perfil |
| `GET` | `/client/dashboard` | Cliente | Painel do cliente |
| `GET` | `/manager/dashboard` | Gerente/barbeiro | Agenda dos atendimentos do dia atribuídos ao profissional |
| `POST` | `/agendamentos/{id}/status` | Público (sem middleware de autenticação declarado) | Atualização do status do agendamento |
| `GET` | `/admin/dashboard` | Administrador | Indicadores, faturamento, ranking e gestão da equipe |
| `POST` | `/admin/meta` | Administrador | Atualização da meta mensal |
| `POST` | `/admin/barbeiros` | Administrador | Cadastro de barbeiro e perfil de equipe |

As rotas de autenticação adicionais, incluindo logout, confirmação de senha e verificação de e-mail, são definidas em `routes/auth.php`.

## Funções de usuário

- `client` — acesso ao painel de cliente
- `manager` — função usada para barbeiros; acesso à agenda do profissional
- `admin` — acesso ao painel administrativo e às ações de gestão

Novas contas são cadastradas como clientes. O cadastro de barbeiros pelo painel administrativo também cria um usuário com a função `manager` e seu perfil de barbeiro associado.

## Estrutura principal

- `app/Http/Controllers/` — lógica de autenticação, perfil, dashboards e agendamentos
- `app/Http/Middleware/CheckRole.php` — validação de função para rotas protegidas
- `app/Http/Middleware/UpdateLastActivity.php` — atualização da atividade recente do usuário
- `app/Models/` — modelos de usuário, barbeiro, agendamento e configurações
- `resources/views/` — páginas Blade, dashboards e formulários
- `routes/web.php` — rotas da aplicação
- `routes/auth.php` — rotas de autenticação
- `database/migrations/` — estrutura do banco de dados
- `database/seeders/` — dados iniciais para desenvolvimento

## Observações

- O modo claro/escuro pode ser alternado nas telas que oferecem o controle de tema. A preferência não é persistida entre visitas.
- Os preços dos serviços são definidos em `app/Http/Controllers/SchedulingController.php`.
- O envio de e-mail para recuperação de senha depende da configuração de e-mail no arquivo `.env`.
- O projeto inclui testes automatizados em `tests/`; execute-os com `php artisan test` quando desejar verificar a aplicação.

## Licença

Este projeto está licenciado sob a licença MIT.
