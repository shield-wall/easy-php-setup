# Easy php steup

It is a project for you have a quickly enverioment running.

### Requiriments

Run the code bellow to make sure you have [docker][docker_link] and [git][git_link] installed.

> **Note**
>
> Make sure that you are able to run docker [non root][docker_non_root_link]

```sh
git --version
docker compose version
```

### Get started

Open a terminal into the folder that you save your projects.
then copy and past the command bellow.

```sh
git clone https://github.com/shield-wall/easy-php-setup.git \
&& cd easy-php-setup \
&& docker compose up -d --wait \
&& docker compose exec php composer install \
&& mkdir var \
&& mkdir var/cache \
&& chmod 777 var/cache \
&& sleep 10 \
&& docker compose exec -T db sh -c 'exec mysql --defaults-extra-file=.docker/mysql/config.cnf' < .docker/mysql/dump.sql
```

> **Note**
>
> In case you face this error:
>
> ```
> ERROR 2002 (HY000): Can't connect to local MySQL server through socket '/var/run/mysqld/mysqld.sock' (2)
> ```
> Then you need to wait the database container be `up`, you can check running `docker compose ps db`.
> Once it is up run the command bellow 👇 (it will restore the database).
>
> `docker compose exec -T db sh -c 'exec mysql --defaults-extra-file=.docker/mysql/config.cnf' < .docker/mysql/dump.sql` 

After the command finish You should be able to open:
- App: http://localhost:8000
- Database: http://localhost:8001 (user: root, password: 123456)

Enjoy!

### Commands

| Command                                       | Description                                                   |
| --------------------------------------------- | ------------------------------------------------------------- |
| `docker compose up -d`                        | Start the containers                                          |
| `docker compose down`                         | Stop containers                                               |
| `docker compose exec php composer install`    | Execute some php command that you need, or composer command.  |

[git_link]: https://git-scm.com/book/en/v2/Getting-Started-Installing-Git
[docker_non_root_link]: https://docs.docker.com/engine/install/linux-postinstall/#manage-docker-as-a-non-root-user
[docker_link]: https://docs.docker.com/engine/install/ubuntu/#install-using-the-repository

### Minimal structure

I have added a small php structure just to be easier you play with php.
I tried to keep this really simple! Then if you are new I strong recommend you investidate what each thing is doing.

### Others Frameworks

In case you want to work with others Frameworks such as Laravel or Symfony.

Just remove all files except In case you want to work with others Frameworks such as Laravel or Symfony.

Just remove all files except `.docker` and `docker-compose.yml`.
After you have added your framework here just run the commands above.
