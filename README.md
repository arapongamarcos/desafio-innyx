## Instalação

Para instalar o projeto, certifique-se de ter o Docker e o Docker Compose instalados. Em seguida, execute o seguinte comando:

```bash
docker-compose up -d
docker-compose exec api php artisan migrate
docker-compose exec api php artisan db:seed
```

Para rodar os testes automatizados do backend:

```bash
docker-compose exec api php artisan test
```

## Acessando a aplicacão
Após subir os containers docker, o frontend da aplicação pode ser acessado no endereço: <b>http://localhost:9000.</b>

No keycloak que são gerenciados os usuários e papéis da aplicação. As rotas estão protegidas tanto no backend, quanto no front. Para demonstração básica do controle de permissões (ACL), foram criados 2 usuários: <b>innyx</b> e <b>user</b> com papéis distintos.

Usuário: <b>innyx</b> (Acessa o gerenciamento de categorias e produtos)

Senha: <b>123456</b>


Usuário: <b>user</b> (Acessa somente o gerenciamento de produtos.)

Senha: <b>123456</b>

## API Laravel
O backend, após subir os containers estará rodando no endereço <b>http://localhost:8000.</b>

