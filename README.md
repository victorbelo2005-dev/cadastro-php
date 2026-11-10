# Cadastro de Pessoa com PHP e MySQL

Projeto de estudo: um sistema de cadastro e login que grava os dados direto em um banco MySQL.

## Funcionalidades

- Cadastro de pessoa (nome, e-mail, CPF, data de nascimento e senha)
- Aviso de **e-mail já cadastrado** e **CPF já cadastrado**
- Login com sessão e painel protegido
- Logout
- Tema escuro responsivo

## Segurança aplicada

- Senhas guardadas com `password_hash()` e conferidas com `password_verify()`
- *Prepared statements* contra SQL injection
- `htmlspecialchars()` ao exibir dados na tela
- Formulários enviados por POST
- Dados de conexão fora do repositório (`conexao.php` no `.gitignore`)

## Tecnologias

HTML, CSS, PHP 8+ e MySQL (XAMPP + phpMyAdmin)

## Como rodar

1. Instale o [XAMPP](https://www.apachefriends.org/) e inicie o **Apache** e o **MySQL**.
2. Clone o projeto dentro da pasta `htdocs`:
   ```bash
   git clone https://github.com/victorbelo2005-dev/cadastro-php.git cadastro
   ```
3. No phpMyAdmin, crie um banco de dados e importe o arquivo `banco.sql`.
4. Copie `conexao.exemplo.php` para `conexao.php` e preencha com o seu usuário, senha e o nome do banco que você criou.
5. Acesse `http://localhost/cadastro/cadastro.html`.

## Estrutura

```
cadastro/
├── cadastro.html
├── login.html
├── estilo.css
├── salvar.php
├── login.php
├── painel.php
├── logout.php
├── conexao.exemplo.php
└── banco.sql
```

## Melhorias futuras

- Validação dos dados também no servidor (CPF e formato do e-mail)
- Redefinição de senha por e-mail
- Proteção do CPF com criptografia
- Botão para mostrar/ocultar a senha

## Autor

Victor, estudante de Análise e Desenvolvimento de Sistemas.
[GitHub](https://github.com/victorbelo2005-dev)
