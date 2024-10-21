# Projeto de Sistema de Vendas

Este projeto é um sistema simples de vendas construído em Laravel. Ele permite o gerenciamento de produtos, clientes e vendas, incluindo a aplicação de cupons de desconto em vendas.

## Tecnologias Utilizadas

- **Laragon**: 6.0
- **PHP**: 8.0
- **Laravel**: 10.x (verificar se está usando a versão mais recente da série 10)
- **PostgreSQL**: 15


## Requisitos

Antes de começar, certifique-se de ter as seguintes ferramentas instaladas:

- [Laragon 6.0](https://laragon.org/download/)
- [Composer](https://getcomposer.org/) (Laragon já o inclui)
- [PostgreSQL 15](https://www.postgresql.org/download/)
- [Node.js](https://nodejs.org/) e [NPM](https://www.npmjs.com/) (opcional para compilação de assets)

## Preparando o Ambiente

1. **Clone o Repositório**

   Clone este repositório para a sua máquina local onde seu servidor possa executa-lo:

   ```bash
   git clone https://github.com/seu-usuario/seu-repositorio.git
   cd seu-repositorio

2. **Edite as variáveis de ambiente do banco de dados**

   O arquivo .env-exemple diz o modelo de configuração que deve ser seguinda

    DB_CONNECTION=pgsql
    DB_HOST=127.0.0.1
    DB_PORT=5432
    DB_DATABASE=nome_do_banco
    DB_USERNAME=seu_usuario
    DB_PASSWORD=sua_senha

3. **Instale as dependencias do Laravel e do Node com os comandos**

    $ npm install 
    $ composer install 

4. **Gere a chave de aplicação Laravel**

    $ php artisan key:generate

5. **Execute as migrates para criar o banco de dados**

    $ php artisan migrate

6. **Inicie o servidor**
    
    $ php artisan server
   
   