#!/usr/bin/env python3
from pirc522 import RFID
# Calls GPIO cleanup
import Adafruit_CharLCD as LCD
import wiringpi as w
w.wiringPiSetup()
w.pinMode(1,1)

import RPi.GPIO as GPIO
#rdr = RFID(0,0,1000000,22,0,18,GPIO.BOARD)
rdr = RFID(0,0,1000000,25,0,24,GPIO.BCM)



lcd_rs        = 26
lcd_en        = 19
lcd_d4        = 20
lcd_d5        = 21
lcd_d6        = 22
lcd_d7        = 27
#
lcd_columns = 16
lcd_rows    = 2
#
#
lcd = LCD.Adafruit_CharLCD(lcd_rs, lcd_en, lcd_d4, lcd_d5, lcd_d6, lcd_d7,
                       lcd_columns, lcd_rows)
lcd.clear()
lcd.message("set card...")
lcd.blink(True)




import signal
import time
import sys


sector = int(sys.argv[1])
print('target sector : ', sector)
s = sys.argv[2]
writedata=s.encode('utf-8')
#li = [writedata.append(int(i+j,16)) for (i,j) in zip(s[::2],s[1::2])]

run = True
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
      if error:
         print("read error")
      if not error:
#        print(": " , error,len(data),len(writedata))
#        print(util.sector_string(sector) + ": " + str([format(writedata[i],'02x') for i in range(len(writedata))]))
#        print(util.sector_string(sector) + ": " + str([format(data[i],'02x') for i in range(len(writedata))]))
#        print(util.sector_string(sector) + ": " + str(data))
        count = 0
        diffflag = 0
        if ( len(writedata) <= len(data)):
          for x in writedata:
             if ( writedata[count] != data[count] ):
               diffflag = 1
             count = count + 1
          if ( 0 == diffflag ):
             print(" verify ok ")
             w.digitalWrite(1,1)
             time.sleep(0.1)
             w.digitalWrite(1,0)
             lcd.clear()
             lcd.message(sys.argv[2])
             lcd.message("\nOK")
             time.sleep(3)
             lcd.clear()
             lcd.message("Ready")

             exit()
      time.sleep(0.1)
