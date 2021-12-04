Para Iniciar os containers do serviços web e de banco de dados, entre na pasta do repositório e digite o comando:
	docker-compose up
Aguarde até que os containers sejam iniciados, e digite o comando, para executar o shell dentro do container do serviço web
	docker exec -it dicas /bin/sh
	onde "dicas" é o nome do container conforme definido no Dockerfile
Após entrar entre na pasta do projeto
	cd dicas/
Instale as dependências
	composer install
Crie o arvuivo de configurações .env (As configurações de acesso ao Banco devem ser inseridas conforme foram definidas no docker-compose.yml)
	cp .env.example .env
Limpe o cache da aplicação
	php artisan cache:clear
É preciso gerar uma chave par que a aplicação funcione corretamente,
	php artisan key:generate
Também é necessário dar acesso a pasta storage para que o servidor web possa realizar operações de leitura e escrita em arquivos de cache
	chmod -R 777 storage/
Para criar a estrutura do banco de dados utilize o comando abaixo:
	php artisan migrate
Em caso de teste da aplicação, utilize o comando abaixo para popular o banco de dados.
	php artisan db:seed
