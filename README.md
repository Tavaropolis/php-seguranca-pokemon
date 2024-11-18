Aplicação desenvolvida para a disciplina de **Segurança da Informação**, para o sexto semestre do curso do ADS do IFSP - campus Capivari.

A aplicação tinha de consistir em um frontend conectado a um banco de dados e seguindo as seguintes regras: 

- (1) Forneça uma interface para autenticar usuários
- (2) Forneça duas interfaces para acesso exclusivo de usuários autenticados, cada uma acessível por um determinado tipo/categoria/grupo de usuários (ex.: uma interface para usuários "alunos" e outra interface para usuários "professores")
- (3) Forneça uma interface para consultas em um banco de dados (ex.: pesquisa de cursos) que seja acessível para usuários não autenticados. A interface deve exibir o termo/palavra/texto utilizado na pesquisa, bem como o resultado da pesquisa. Utilize o método GET para implementar o formulário de consulta/pesquisa, com possibilidade de manipulação da pesquisa via URL
- (4) Utilize mecanismos criptográficos para o armazenamento das senhas (hash) e dos dados a serem exibidos na interface de consulta ao banco de dados (item 3). Para o armazenamento de senhas, utilize mecanismos que garantam que senhas iguais não tenham o mesmo hash, via salt
- (5) Utilize mecanismos para prevenção contra SQL Injection (SQLi), contra Cross-Site Scripting (XSS) e contra acessos não autorizados em todas as interfaces da aplicação
