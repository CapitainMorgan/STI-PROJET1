FROM tutum/lamp:latest
#FROM fauria/lamp

# copy content to
COPY app/ /var/www/html
COPY document/BD.sql /home/
COPY document/init-sql.sh /home/

EXPOSE 80

CMD ["/run.sh"]
#RUN sh /home/init-sql.sh
#CMD ["sh", "/home/init-sql.sh"]
