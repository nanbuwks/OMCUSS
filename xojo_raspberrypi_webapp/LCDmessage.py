#!/usr/bin/env python

import sys

import Adafruit_CharLCD as LCD
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
if ( 2 >  len(sys.argv)):
  lcd.message("No IP address.")
if ( 1 <  len(sys.argv)):
  message = sys.argv[1]
  lcd.message(message)
if ( 2 <  len(sys.argv)):
  message = sys.argv[2]
  lcd.message("\n")
  lcd.message(message)
# cursol blink
lcd.blink(False)

