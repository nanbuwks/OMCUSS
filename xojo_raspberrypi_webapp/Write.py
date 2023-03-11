#!/usr/bin/env python3

import signal
import time
import sys

# from rfid import RFID
from pirc522 import RFID

sector = int(sys.argv[1])
print('target sector : ', sector)
s = sys.argv[2]
writedata=[]
li = [writedata.append(int(i+j,16)) for (i,j) in zip(s[::2],s[1::2])]

run = True
rdr = RFID()
util = rdr.util()
util.debug = False
keyab=rdr.auth_b
key  =[0xB0,0x00,0x00,0x26,0x11,0x23]

def end_read(signal,frame):
    global run
    print("\nCtrl+C captured, ending read.")
    run = False
    print("\ncleanuping...")
    rdr.cleanup()
    print("\ncleanup end")
    exit()

signal.signal(signal.SIGINT, end_read)

print("Starting")
while run:
    rdr.wait_for_tag()

    (error, data) = rdr.request()
    if not error:
        time.sleep(0.1)
        print("\nDetected: " + format(data, "02X"))

    (error, uid) = rdr.anticoll()
    if not error:
        time.sleep(0.1)
        print("Card read UID: "+str(uid[0])+","+str(uid[1])+","+str(uid[2])+","+str(uid[3]))

        print("Setting tag")
        util.set_tag(uid)
        time.sleep(0.1)
        print("\nAuthorizing")
        util.auth(keyab, key)
        time.sleep(0.1)
        print("\nWriting modified bytes")
        util.rewrite(sector, writedata)
        time.sleep(0.1)
        print("\nReading")
        (error, data) = rdr.read(sector)
        print(util.sector_string(sector) + ": " + str([format(data[i],'02x') for i in range(len(writedata))]))
        count = 0
        diffflag = 0
        if ( len(writedata) <= len(data)):
          for x in writedata:
             if ( writedata[count] != data[count] ):
               diffflag = 1
             count = count + 1
          if ( 0 == diffflag ):
             print(" verify ok ")
             exit()
        time.sleep(0.1)
