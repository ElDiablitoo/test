FROM vulhub/httpd:2.4.50

COPY flag.txt /root

COPY httpd.conf /usr/local/apache2/conf/

COPY index.html /usr/local/apache2/htdocs/

RUN chmod a+x /root

EXPOSE 8080
