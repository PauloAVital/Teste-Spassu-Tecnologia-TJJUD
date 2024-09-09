# Teste-Desenvolvimento-Spassu

# Gostaria de Agradecer a Oportunidade de demonstrar meus conhecimento e pedir perdão por ter tomado a liberdade de realizar outras funcinalidades não solicitados no teste, fiz isso apenas para expor o meu conhecimento em divesas maneiras de programar, visando apenas conseguir a vaga com muita diligência e esforço.
---
## Subindo o Docker para rodar o app
1. **sudo docker-compose build app**
2. **sudo docker-compose up -d**
3. ![Título da imagem](public/img/rodar-docker.png)

---
## Instalar as dependências do composer
4. **sudo docker-compose exec app composer install**
5. ![Título da imagem](public/img/composer_install.png)
6. **sudo docker-compose exec app composer update**
---

## crie uma chave para o artisan
7. **sudo docker-compose exec app php artisan key:generate**
7. **sudo docker-compose exec app php artisan jwt:secret**
8. ![Título da imagem](public/img/key.png)
---

## Obtendo o host do mysql que o Docker gerou caso queira acompanhar no worbench ou outro SGDB

Comando no terminal:

9. **sudo docker ps**

10. ![Título da imagem](public/img/docker_ps.png)


11. **sudo docker inspect _id do mysql_**

12. ![Título da imagem](public/img/docker_inspect.png)

13. Copie o numero do IPAddress 
* Ex:  _192.168.224.4_
* Database: Spassu
* Username: Spassu_user
* Password: Spassu2024

## Gere as Tabelas
14. Rode o Migrate **sudo docker-compose exec app php artisan migrate:refresh --seed**
15. ![Título da imagem](public/img/migrate.png)
---

16. Acesse o **_http://localhost:8000/_**
17. ![Título da imagem](public/img/welcome.png)

---

18. Crie seu usuario e realize o login 
19. ![Título da imagem](public/img/login.png)

## Etapa da API's

20. Segue as Collections das Api's criadas.
21. ![Título da imagem](public/img/collection.png)

22. Todas as Api's são acessadas por atutenticação jwt por esse motivo existe o cadastro de acesso na tela principal
23. ![Título da imagem](public/img/Authentication.png)

24. No Verbo (GET) do Search-Livro ja está implementada a ViewLivro.
25. ![Título da imagem](public/img/search-Livros.png)

26. No Verbo (Post) do Insert-Livros Um Json pode ser enviado incluindo os dados do Livro, Assunto e Autores que ja seram implementados.
27. ![Título da imagem](public/img/insert-livros.png)

28. No Verbo (Put) do Update-Livros Um Json pode ser enviado incluindo os dados do Livro, Assunto e Autores que ja seram implementados.
29. ![Título da imagem](public/img/Update-Livros.png)

## LAYOUT FRONT END

30. Neste passo eu decide tbem fazer uma demostração de insert via web do laravel para mostrar ainda mais o meu conhecimento tanto em API's quanto em desenvolvimento interno utilizando o laravel, javascript, bootstrap entre outros.

30. Tela de Cadastro de Livro junto com o Autor e Assunto que tbem tem telas para cadastrar
 ![Título da imagem](public/img/Cadastro_de_livro.png)
![Título da imagem](public/img/Cadastro_Assunto.png)
![Título da imagem](public/img/Cadastro_autor.png)

31. Decidi por conta propria implementar um datatable com diversas opçoes de exportação dos dados.. conforme imagem abaixo
32. ![Título da imagem](public/img/datatableExport.png)