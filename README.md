# Projeto Imobiliária

##  Tecnologias Utilizadas

* Laravel 8
* PHP 7.4
* SQL
* Javascript / Jquery 3.3.1
* HTML5
* CSS3
* Apache 2.4
* MariaDB 10.4
* Bootstrap 4.0

# Instalação

1. para iniciar o projeto basta clonar o repositorio e utilizar o branch ```master```

2. para baixar o repositório rode o comando no terminal :

```git clone https://github.com/rodridev77/imobiliaria.git```

3. clone o arquivo .env.example renomeando a cópia para .env, e altere os dados de acesso ao banco de dados para o seu localhost MariaDB.

4. rode o comando ```php artisan generate:key``` para configurar a chave da aplicação.

5. rode o comando ```composer update``` para atualizar as dependências do projeto.

6. rode o comando ```npm install``` para atualizar as dependências do projeto.

7. instale o dumb do banco que está no arquivo **imobiliaria.sql** na raiz do repositório.

* caso não for possível utilizar o dump dp banco, comentar o trecho de código em ```App\Providers\AuthServiceProvider```, isso permite a geração das migrations(tables do banco) e em seguida rode o comando ```php artisan migrate``` para gerar as tabela do banco.

```
$permissions = Permission::with('roles')->get();
      
foreach($permissions as $permission) {
    Gate::define($permission->name, function(User $user) use ($permission) {
        return $user->hasPermission($permission);
    });
}

```

# Usuários de acesso inseridos no dump
Todos utilizam a senha ```password```

- **admin@mail.com**
**Admin** será responsável pelo cadastro de usuário do sistema e imóveis.
- **commercial@mail.com**
**Commercial** será responsável pelo cadastro de clientes e vendas.
- **financial@mail.com**
**Financial** será responsável pela aprovação da venda.
- **ceo@mail.com**
**Ceo** terá permissão da área de Ceo.

