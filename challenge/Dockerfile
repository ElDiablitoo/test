FROM ubuntu:latest

RUN apt update && apt install ncat python3 -y

COPY flag.txt /root

COPY ssecure.py /root

RUN chmod +x /root/ssecure.py

ENTRYPOINT ncat -nvlp 9999 -e /root/ssecure.py -k

EXPOSE 9999

