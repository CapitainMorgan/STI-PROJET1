#!/bin/bash

echo "build de l'image"
docker build -t sti-projet1 .

echo "Lancement du conteneur"
docker run -d  --name=STI -p 127.0.0.1:8080:80 sti-projet1

echo "Initialisation de la BD"
docker exec -d STI sh /home/init-sql.sh

