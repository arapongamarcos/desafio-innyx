## Instalação

Execute o seguinte comando:

```bash
docker-compose up -d
docker-compose exec api php artisan migrate
docker-compose exec api php artisan db:seed
```


## Acessando a aplicacão
Após subir os containers docker, o frontend da aplicação pode ser acessado no endereço: <b>http://localhost:9000.</b>

Usuários para teste:

Role Admin: possui todas as permissoes do sistema
Usuário: <b>admin@admin.com</b>
Senha: <b>admin</b>

Role Moderador: permissão apenas para visualizar registros
Usuário: <b>moderator@moderator.com</b>
Senha: <b>moderator</b>


## API Laravel
O backend, após subir os containers estará rodando no endereço <b>http://localhost:8000.</b>

