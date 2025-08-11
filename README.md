| Comando                                                           | Descrição                                                                                                               |
|-------------------------------------------------------------------|-------------------------------------------------------------------------------------------------------------------------|
| `docker ps`                                                       | Listar os containers existentes                                                                                         |
| `docker ps -a`                                                    | Exibir todos os containers utilizados, com comando, containerId e há quanto tempo foi utilizado                         |
| `docker run -P CONTAINER_NAME`                                    | Roda o container e atribui ele a uma porta aleatória da máquina hospedeira                                              |
| `docker run -pPORTA_HOSPEDEIRA:PORTA_CONTAINER CONTAINER_NAME`    | Mapear a porta da máquina para a porta do container, e.g., `docker run -p80:8080 CONTAINER_NAME`                        |
| `docker exec -iti CONTAINER_ID bash`                              | Entra no terminal do container correspondente                                                                           |
| `docker stop CONTAINER_ID`                                        | Para todos os processos executando dentro do Container                                                                  |
| `docker build -t NOME_IMAGEM .`                                   | Gera a imagem a partir do Dockerfile com nome definido. Lembre-se de estar no mesmo diretório que o Dockerfile          |
| **COMANDOS DOCKER-COMPOSE**                                       | **Descrição**                                                                                                           |
| `docker-compose up -d`                                            | Sobe os containers configurados no docker-compose.yml e os mantém em segundo plano                                      |
| `docker-compose down`                                             | Desliga os containers configurados e upados com o comando `up`                                                          |
| `docker-compose exec CONTAINER_NAME COMANDO`                      | Executa um comando dentro de um container configurado no docker-compose                                                 |
