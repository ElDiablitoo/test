#!/usr/bin/env python3

from os import urandom
from binascii import hexlify, unhexlify

class Cipher:
    def __init__(self):
        self.key = b''
    def encrypt(self, data):
        if len(data) > len(self.key):
            self.key = urandom(len(data))
        return bytes(a ^ b for a, b in zip(data, self.key))

cipher = Cipher()

with open('/root/flag.txt', 'rb') as f:
    flag = f.read().strip()

flag = cipher.encrypt(flag)
flag = hexlify(flag)

print("Hello, this is the most secure encryption service in the world!")
print("To prove you that, here is my encrypted version the flag.")
print("Why? cz you can't decrypt it LOOOOOL.")
print(f"Here it is: {flag}")
print()
print("See how my service is SECURE,give it a try!")

while True:
    try:
        print("Give me data:")
        inp = input()
    except:
        break
    try:
        inp = unhexlify(inp)
    except:
        print("Not valid!")
        continue
    ct = cipher.encrypt(inp)
    ct = hexlify(ct)
    print(f"Here it is: {ct}")
