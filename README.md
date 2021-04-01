# Mars converter

# Available recipes
 * phpunit/phpunit 
 * symfony/console 
 * symfony/flex 
 * symfony/framework-bundle 
 * symfony/monolog-bundle 
 * symfony/routing 
 * symfony/twig-bundle 


# Installation

    Local machine:
        1- Make sure PHP >= 7.2.x is installed
        2- Make sure composer is installed
        3- In application directory run this command: composer install
        4- To run web interface run one of below commands or use any web server:
            - php -S localhost:8000 -t public
            or 
            - symfony server:start

        5- To run in command line use below command:
            - php bin/console app:convert-mars date time 
                Sample command: 
                    php bin/console app:convert-mars 2021-03-15 14:02:22
            For mmore infor run:  
                php bin/console app:convert-mars --help
    
    Docker:
        Make sure docker is installed and running, then run below command in application directory:

        - To build and run the docker:
            1- sudo docker build -t pouya .
            2- sudo docker container create pouya
            3- sudo docker container run -it pouya /bin/bash
            4- inside container: cat /etc/hosts get container ip address
            5- inside container: application folder run this command php -S CONTAINER-IP-ADDRESS:80 -t public
            6- In browser write container ip address and check the application 
                sample:
                    - http://172.17.0.2/
        
        - Command line option also available in docker     

    Logger:
        - Application use monolog and logs are avaliable in var/log/LOGFILENAME.log
        - Log also shown in terminal via converter command

    Test:
        There are some tests under tests directory
            -  php vendor/bin/phpunit tests/
