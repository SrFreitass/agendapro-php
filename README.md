# 📅 Agenda Pro

![Badge](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white) ![Badge](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white) ![Badge](https://img.shields.io/badge/XAMPP-FB7A24?style=for-the-badge&logo=xampp&logoColor=white)

## 💻 Sobre o Projeto

O **Agenda Pro** é um sistema web desenvolvido para agenda e gerenciamento de alugueis

Este projeto foi desenvolvido como **avaliação da Unidade Curricular (UC) de Desenvolvimento Web** no **Senac Hub Academy**. O objetivo foi aplicar os conceitos fundamentais de desenvolvimento web, integração com banco de dados e lógica de programação no lado do servidor.

## ⚙️ Funcionalidades

- [x] Cadastro de novos alugueis.
- [x] Listagem de agendamentos.
- [x] Edição de informações.
- [x] Exclusão de registros.
- [x] Conexão com banco de dados MySQL.
- [X] Hash de senha de usuários com Bcrypt
- [X] Autenticação via $_SESSION

## 🛠 Tecnologias Utilizadas

- **Front-end:** HTML5, CSS3.
- **Back-end:** PHP.
- **Banco de Dados:** MySQL (via MariaDB).
- **Ambiente de Desenvolvimento:** XAMPP (Apache server).

## 🚀 Como rodar este projeto

Para rodar o projeto localmente, você precisará ter o [XAMPP](https://www.apachefriends.org/pt_br/index.html) instalado.

### 1. Preparando os Arquivos

1. Clone este repositório ou baixe o arquivo `.zip`.
2. Mova a pasta do projeto para dentro do diretório do XAMPP:
   - Geralmente localizado em: `C:\xampp\htdocs\`
   - O caminho final deve ficar algo como: `C:\xampp\htdocs\agenda-pro`

### 2. Configurando o Banco de Dados

1. Inicie o **Apache** e o **MySQL** no painel de controle do XAMPP.
2. Acesse `http://localhost/phpmyadmin` no seu navegador.
3. Crie um novo banco de dados com o nome: `agendapro_db` (ou o nome que estiver no seu arquivo de conexão).
4. Importe o arquivo SQL:
   - Clique na aba **Importar**.
   - Selecione o arquivo `schema.sql` que está na pasta `infra/db` deste projeto.
   - Execute a importação.

### 3. Rodando a Aplicação

1. Abra seu navegador.
2. Acesse: `http://localhost/agenda.pro` (ou o nome da pasta que você colocou no htdocs).

---

## 📝 Licença

Este projeto foi desenvolvido para fins educacionais.
