# Instruções para rodar o Projeto
- Clonar o projeto
    - git clone https://github.com/nilsonnegraodeveloper/zuccompany.git && cd zuccompany

- No seu servidor criar um banco de dados (Ex. zuccompany)

- Copiar o .env.example como nosso .env principal e atualizar com as suas credencias do DB:
    - cp .env.example .env

- Use estes comando para construir e executar os containers:
    - docker-compose build app
    - docker-compose up -d

- Executar o composer install para instalar as dependências do aplicativo:
    - docker-compose exec app composer install

- Rodar as migrations: 
    - php artisan migrate

- Popular o banco com dados para teste:
    - php artisan db:seed

- Gerar a chave do aplicativo:
    - php artisan key:generate

- Gerar a chave do token jwt
    - php artisan jwt:secret

- Rodar a aplicação
    - php artisan serve

- Usuário para logar:
    - Email: teste@teste.com
    - Senha: 123456

- Utilizar o Postman para testar as rotas da API

## SOBRE A ENTREGA:
**O que foi implementado:**
- API Rest e Sistema;
- Documentação dos endpoints no arquivo endpoints.txt na raiz do projeto;
- Crud para todos os módulos;
- Frontend para todos os módulos;
- Na tela de Cadastrar e Editar Vendas no combo só é listado produtos cuja quantidade seja maior que zero;
- Venda dando baixa no estoque do produto;
- Exibindo cálculo do total da venda;
- Dockerizar a aplicação;
- Possibilidade de filtar uma venda por cliente (através do DataTable);
- Integração para buscar o endereço do cliente através do CEP;
- Autenticação Token JWT na Api;
- Utilizado o php 7.4;
- Validação dos campos com HTML5;
- Validação básica no servidor (Laravel).

**O que não foi implementado ou ficou em andamento:**
 - Autenticação no Sistema;
 - Editar e Deletar Vendas da Api;
 - Máscara monetária não está funcionando (Plugin jquery.maskMoney.js).

**TECH STACK E DEPENDÊNCIAS:**
- PHP 7.4;
- Laravel 8.83.26;
- PostgreSQL;
- Postman 8.11.1;
- Composer 2.3.5;
- JWT-AUTH 1.0.2 (Tokem para autenticação do Usuário);
- Template Bootstrap Gentelella Admin disponível em: https://colorlib.com/wp/free-bootstrap-admin-dashboard-templates/ e https://github.com/ColorlibHQ/gentelella; 
- Bootstrap 4; 
- HTML5; 
- CSS; 
- JavaScript; 
- Jquery - Plugins: DataTables e MaskMoney;

## Objetivo
Nosso objetivo com este passo do processo de recrutamento é conhecer melhor as suas habilidades técnicas.

Conhecendo você melhor, poderemos selecionar quais desafios já podemos passar para você e quais precisaremos preparar você melhor para enfrentá-los.

## Cenário
No nosso dia-a-dia a aplicação principal é desenvolvida em PHP, Doctrine, Zend Framework, e o frontend desenvolvido em angularjs e vuejs 2. Estamos migrando gradualmente a nossa aplicação para uma arquitetura orientada a microsserviços.

## Critérios

#### A avaliação será feita da seguinte forma:

- Vamos analisar e executar o seu código;
- Rodar sua aplicação e executar testes para validar o atendimento funcional dos items abaixo;
- Verificar se o seu código e arquitetura é limpa, fácil de entender e de dar manutenção;
- Durante entrevista, simularemos uma revisão do seu código, percorremos o código junto com você para discutirmos sobre suas decisões de implementação, os pontos positivos e negativos;
- O saldo entre o que for positivo e o que for negativo vai determinar a recomendação do ponto de vista técnico ou não de sua contratação, se faltar pouco para atingir uma recomendação positiva, daremos um prazo para você corrigir e retornar;

### Requisitos Obrigatórios:
- Cadastros
	- Cliente
		- Nome
		- CPF
		- Endereço
		- E-mail
        	- CEP
	- Produto
		- Nome
		- Quantidade
		- Preço
	- Forma de Pagamento
		- Nome
		- Parcelas

- Venda
	- Cliente
	- Produto
	- Forma de Pagamento

## Sobre a entrega:
- API Rest ou rPC.
- Implementar crud para todos os módulos.
- Frontend (qualquer tecnologia) tela de venda (não é necessário fazer os outros módulos).
- Uma venda deve estar dando baixa no estoque.
- Exibir calculo do total da venda.
- Passo a passo para subir a aplicação.
- Documentar endpoints (pode ser um arquivo .MD).
- Utilização do php 7.2ˆ o resto é por sua conta escolher.

## Você vai arrasar se fizer:
- Testes unitários.
- Dockerizar a aplicação.
- Possibilidade de filtar uma venda por cliente.
- Aplicar princípios S.O.L.I.D e outras boas práticas.
- Integração para buscar o endereço do cliente através do CEP.

## Para você que é ninja:
- Autenticação.
- Implementar estratégia de cache para cliente, produto e forma de pagamento.
- Dividir a aplicação em microsserviços (qualquer tecnologia).

## Dicas:
- Tenha em mente que o seu avaliador irá executar o código antes de falar com você;
- Procure fazer uma entrega simples mas consistente, usando a experiência e conhecimento adquiridos durante sua carreira;
- Não se preocupe em entregar algo extremamente completo ou rebuscado, não vamos usar este código em produção;
- Tudo será avaliado, dê o seu melhor!

