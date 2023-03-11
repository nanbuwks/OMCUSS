#!/usr/bin/env python3
from pirc522 import RFID
# Calls GPIO cleanup
import Adafruit_CharLCD as LCD


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
import sys
import time
import wiringpi as w
w.wiringPiSetup()
w.pinMode(1,1)
sector = int(sys.argv[1])
# print('target sector = : ', sector)
lcd.clear()
lcd.message('Ready')
while True:
  rdr.wait_for_tag()
  (error, tag_type) = rdr.request()
  if not error:
#    print("Tag detected")
    (error, uid) = rdr.anticoll()
    if not error:
#      print("  UID: " + str(uid))
      # Select Tag is required before Auth
      if not rdr.select_tag(uid):
#        print("  not rdr.select_tag")

        # Auth for block  using default shipping key A
        if not rdr.card_auth(rdr.auth_a, sector, [0xC0, 0xC1, 0xC2, 0xC3, 0xC4, 0xC5], uid):
          # This will print something like (False, [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0])
#          print("      Reading sector "+ str(sector) +" " + str(rdr.read(sector)))
          (error,data)=rdr.read(sector)
          if not error:
#            print( str(data))
#            print( str(data))
            data2=data[0:10]
            id=(''.join(map(chr,data2)))
            print(id)
            lcd.clear()
            lcd.message(id)
            w.digitalWrite(1,1)
            time.sleep(0.1)
            w.digitalWrite(1,0)

            break

          # Always stop crypto1 when done working
          rdr.stop_crypto()

rdr.cleanup()

