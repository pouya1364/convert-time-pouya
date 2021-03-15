# Pouya 
--  To build and run the docker:
    1- sudo docker build -t pouya .
    2- sudo docker container create pouya
    3- sudo docker container run -it pouya /bin/bash
    4- inside container: cat /etc/hosts get container ip address
    5- inside container -> application folder run this command php -S CONTAINER-IP-ADDRESS:80 -t public
    6- In browser write docker ip address and check the application