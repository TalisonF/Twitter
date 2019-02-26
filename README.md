# Twitter

## instalação

- abrir o diretório e executar o comando no CMD: 

    # composer install

    - Configurar o banco de dados

    # ./vendor/bin/doctrine orm:schema-tool:update --force

- apos finalizar a instalação de todos componentes, abrir no CMD no diretório e executar (vai iniciar o servidor):

    # php -S 0.0.0.0:1010 -t public/ public/index.php
    
- abrir no browser: http://127.0.0.1:1010/

- para cada mudanca no banco de dados executar o comando no diretorio do repositorio:

        ./vendor/bin/doctrine orm:schema-tool:update --force
        
- vai atualizar o banco de dados sozinho