<div align="center" id="top">
  <h1>Barbearia</h1>
  <p>Aplicação web de gerenciamento para barbearia com autenticação, painel de controle e perfis de usuário.</p>
</div>

<p align="center">
  <a href="#about">About</a> &#xa0; | &#xa0;
  <a href="#features">Features</a> &#xa0; | &#xa0;
  <a href="#technologies">Technologies</a> &#xa0; | &#xa0;
  <a href="#requirements">Requirements</a> &#xa0; | &#xa0;
  <a href="#getting-started">Getting Started</a> &#xa0; | &#xa0;
  <a href="#license">License</a>
</p>

## About

Projeto Laravel para controle de barbearia com páginas de login, cadastro, perfil e dashboards diferenciados por função (cliente, gerente e administrador).

O sistema usa Laravel 12, autenticação Breeze e frontend com Vite, Tailwind CSS e Alpine.js.

## Features

- Autenticação de usuários com login, registro e recuperação de senha.
- Dashboard protegido por middleware de autenticação.
- Área de perfil do usuário para edição de dados e exclusão de conta.
- Rotas separadas por função: cliente, gerente e administrador.
- Frontend baseado em Blade + Tailwind + Alpine.js.

## Technologies

- PHP 8.2
- Laravel 12
- Laravel Breeze
- Vite
- Tailwind CSS
- Alpine.js
- MySQL / SQLite

## Requirements

Antes de começar, instale:

- PHP 8.2 ou superior
- Composer
- Node.js 18+ (ou compatível)
- Git

## Getting Started

```bash
# 1. Clone o repositório
git clone https://github.com/KreatorLima/barbearia.git
cd barbearia

# 2. Instale as dependências PHP
composer install

# 3. Copie o arquivo de ambiente
copy .env.example .env

# 4. Gere a chave da aplicação
php artisan key:generate

# 5. Ajuste as variáveis de ambiente em .env
# Exemplo: DB_CONNECTION=mysql, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD

# 6. Execute as migrations
php artisan migrate

# 7. Instale as dependências Node
npm install

# 8. Compile os assets
npm run build

# 9. Inicie o servidor
php artisan serve
```

Acesse a aplicação em: http://localhost:8000

### Desenvolvimento

Para rodar em modo de desenvolvimento com recarga de assets do Vite:

```bash
npm run dev
```

## Notes

- Se quiser usar o script de setup automático, execute `composer setup`.
- Caso use SQLite, atualize `DB_CONNECTION=sqlite` e defina `DB_DATABASE=` com o caminho para `database/database.sqlite`.

## License

Este projeto está licenciado sob a licença MIT.

---

Made with ❤️
