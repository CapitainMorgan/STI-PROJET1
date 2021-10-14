#!/bin/bash

echo "Start mysql server"
service mysql start

#echo "Create user"
mysql -uroot -e "CREATE USER 'admin'@'%' IDENTIFIED BY 'admin'"
mysql -uroot -e "GRANT ALL PRIVILEGES ON *.* TO 'admin'@'%' WITH GRANT OPTION"

echo "Upload database"
mysql --user=admin --password=admin < /home/BD.sql
