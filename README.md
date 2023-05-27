# Laravel API - Estudos ![Badge](https://img.shields.io/static/v1?label=Laravel&message=Framework&color=red&style=&logo=Laravel)
Essa é uma API desenvolvida em Laravel juntamente da autenticação sanctum para fins de estudos. Está seguindo boas práticas de programação juntamente do padrão MVC e suas respectivas validações.
### Requisitos

- Laravel 9
- PHP ^8
- SQL
- Composer

### Instalação

1. Baixe o projeto (Manualmente ou através do git clone)
2. Configure o banco de dados SQL no arquivo .env
3. Abra o cmd e navegue até o diretório do projeto
4. Instale as dependências através do comando:
```composer
composer install
```
5. Rode as migrations
```laravel
php artisan migrate
```
4. Insira o usuário padrão
```laravel
php artisan db:seed
```
5. Rode o servidor
```laravel
php artisan serve
```

### Uso
> Todas as rotas precisam de um token de acesso para ser usado que pode ser obtido através da seguinte rota:
• POST /api/login
• Deve ser passado através de json os campos email e password

OBS: Ao rodar o db:seed, foi inserido no banco de dados o usuário padrão com o e-mail: admin@gmail.com e a senha: password, os mesmos podem ser inseridos na rota para obter o token, ou você pode inserir um novo usuário no banco de dados manualmente através do tinker:

```laravel
php artisan tinker
```
```laravel
DB::table('users')->insert(['name'=>'Nome usuario','email'=>'email@usuario.com','password'=>Hash::make('senha')])
```

### Rotas
Todas rotas estão também no arquivo "Laravel API - Rotas .postman_collection.json", podendo ser importado no PostMan
> Lembre-se de configurar a autenticação do tipo "Bearer Token" nos endpoints

Rotas de autenticação:
| Caminho | Tipo | Função |
| ---      | ---       | ---
| /api/login | POST | Realizar o login e obter o token do tipo "Bearer" que servirá para ser usado nos outros endpoints |

Rotas dos carros:
| Caminho | Tipo | Função |
| ---      | ---       | ---
| /api/carros | GET | Lista os carros cadastrados |
| /api/carros/{id} | GET | Lista um carro específico pelo ID |
| /api/carros?modelo={string}&marca={string}&ano_modelo={int} | POST | Cadastra um carro |
| /api/carros/{id}?modelo={string}&marca={string}&ano_modelo={int} | PUT | Edita os dados de um carro específico pelo ID |
| /api/carros/{id}? | DELETE | Excluí um carro específico pelo ID |

Rotas dos filmes:
| Caminho | Tipo | Função |
| ---      | ---       | ---
| /api/filmes | GET | Lista os filmes cadastrados |
| /api/filmes/{id} | GET | Lista um filme específico pelo ID |
| /api/filmes?nome={string}&ano={int}| POST | Cadastra um filme |
| /api/filmes/{id}?nome={string}&ano={int} | PUT | Edita os dados de um filme específico pelo ID |
| /api/filme/{id}? | DELETE | Excluí um filme específico pelo ID |

