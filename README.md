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

- ✅ **Autenticação completa**: Login, registro e recuperação de senha com Laravel Breeze
- ✅ **Sistema de Roles**: Três níveis de acesso (Cliente, Gerente, Administrador)
- ✅ **Dashboards personalizados**: Interfaces diferentes para cada tipo de usuário
  - **Dashboard Cliente**: Landing page com apresentação da barbearia, cardápio de serviços, equipe profissional e depoimentos
  - **Dashboard Gerente**: Estrutura preparada para gerenciamento operacional
  - **Dashboard Administrador**: Estrutura preparada para controle do sistema
- ✅ **Middleware de proteção**: Controle de acesso por role com `CheckRole` e `CheckAdmin`
- ✅ **Tema escuro**: Suporte nativo a dark mode com persistência local
- ✅ **Área de perfil**: Edição de dados pessoais e exclusão de conta
- ✅ **Design responsivo**: Interface mobile-first com Tailwind CSS
- ✅ **Frontend moderno**: Blade + Vite + Tailwind CSS + Alpine.js

## Technologies

- **Backend**: PHP 8.2, Laravel 12, Laravel Breeze
- **Frontend**: Vite, Tailwind CSS, Alpine.js, Blade
- **Database**: MySQL / SQLite
- **Styling**: Tailwind CSS (Dark Mode compatível)
- **Icons**: Tabler Icons
- **Fonts**: Google Fonts (Anton, IBM Plex Mono, Work Sans)

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

Em Recursos do Dashboard Cliente

O dashboard do cliente (Alameda Barbearia) inclui:

- 🏢 **Apresentação da barbearia** - Branding profissional desde 2016
- 👨‍💼 **Equipe profissional** - Perfis dos barbeiros com especialidades (navalha, degradê, barba, platinado)
- 💇 **Cardápio de serviços** - 8 serviços com preços (R$ 35 a R$ 120)
- 📝 **Depoimentos de clientes** - Seção de avaliações e comentários
- 🌙 **Tema escuro** - Suporte total com cores customizadas (tons brass/ouro)
- 📱 **Design responsivo** - Navegação mobile-friendly com menu hamburguês
 - **Limpeza recente**: removido código comentado não utilizado em `database/seeders/DatabaseSeeder.php`.

## Estrutura do Projeto

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── DashboardController.php    (Roteamento por role)
│   │   ├── ProfileController.php       (Gerenciamento de perfil)
│   │   └── Auth/                       (Controllers de autenticação)
│   └── Middleware/
│       ├── CheckRole.php               (Validação de role)
│       └── CheckAdmin.php              (Validação admin)
├── Models/
│   └── User.php                        (Modelo com role field)
└── Providers/

resources/
├── views/
│   ├── dashboards/
│   │   ├── client.blade.php            (Dashboard cliente)
│   │   ├── manager.blade.php           (Dashboard gerente)
│   │   └── admin.blade.php             (Dashboard admin)
│   ├── auth/                           (Views de autenticação)
│   ├── profile/                        (Views de perfil)
│   └── layouts/                        (Layouts principais)
└── css/
    └── app.css                         (Estilos globais)

routes/
├── web.php                             (Rotas principais)
└── auth.php                            (Rotas de autenticação)

database/
├── migrations/                         (Schema do banco)
└── seeders/                            (Seeds iniciais)
```

## Notes

- Se quiser usar o script de setup automático, execute `composer setup`
- Caso use SQLite, atualize `DB_CONNECTION=sqlite` e defina `DB_DATABASE=` com o caminho para `database/database.sqlite`
- O tema escuro é salvo nas preferências do navegador (localStorage)
- Para adicionar novos serviços ou equipe, edite diretamente o arquivo `resources/views/dashboards/client.blade.php`
```

## Estrutura de Roles e Dashboards

O sistema implementa um controle de acesso baseado em três roles:

| Role | Descrição | Rota |
|------|-----------|------|
| **client** | Cliente da barbearia | `/dashboard/client` |
| **manager** | Gerente de operações | `/dashboard/manager` |
| **admin** | Administrador do sistema | `/dashboard/admin` |

### Como usar

1. **Registre um novo usuário** - Todos os usuários novos são criados com role `client` por padrão
2. **Para atribuir outros roles** - Use o banco de dados diretamente ou implemente um painel admin:

```sql
UPDATE users SET role = 'manager' WHERE id = 2;
UPDATE users SET role = 'admin' WHERE id = 3;
```

3. **Login** - Após fazer login, você será redirecionado automaticamente para o dashboard correto baseado no seu role

### Middleware de Proteção

As rotas são protegidas por middleware customizado:

- `auth` - Requer estar autenticado
- `role:client` - Requer role específico (substituir com o role desejado)
- `admin` - Requer ser administrador

Exemplo de uso em rotas:

```php
Route::middleware(['auth', 'role:manager'])->group(function () {
    // Rotas exclusivas para gerentes
});
```

## Notes

- Se quiser usar o script de setup automático, execute `composer setup`.
- Caso use SQLite, atualize `DB_CONNECTION=sqlite` e defina `DB_DATABASE=` com o caminho para `database/database.sqlite`.

## License

Este projeto está licenciado sob a licença MIT.

---

Made with ❤️
