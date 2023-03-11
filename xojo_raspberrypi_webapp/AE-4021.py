#!/usr/bin/env python3
# 尿検査 AE-4021 
#  picocom -b 4800  --parity e --databits 7 --stopbits 2 /dev/ttyUSB0
# 改行はCRLF 1レコード 30Bytes
# 
# 
# D2020-12-08,T16:09,N10003,Temp19  5EA
# GLU ,NORMAL,     ,mg/dL , 
# PRO ,-     ,     ,mg/dL , 
#     ,      ,     ,      , 
# URO ,NORMAL,     ,mg/dL , 
# PH  ,      ,6.0  ,      , 
#     ,      ,     ,      , 
# BLD ,+-    ,0.03 ,mg/dL , 
#     ,      ,     ,      , 
#     ,      ,     ,      , 
#     ,      ,     ,      , 
#      ,     ,      ,     , 
# COLOR,     ,YELLOW,     , 


# AM-4290 は BLD ,+- の代わりに BLD , と出力されるのに注意
# 
import serial
import re
import sys
import requests
import time
id="3015011111"
URL="http://192.168.162.138/measure/measure.php"


def change(data):
    if ( "-" == data ):
          data="0"
    if ( "NORMAL" == data ):
          data="1"
    if ( "+-" == data ):
          data="1"
    if ( "+1" == data ):
          data="2"
    if ( "+2" == data ):
          data="3"
    if ( "+3" == data ):
          data="4"
    if ( "+4" == data ):
          data="5"
    return(data)

def changeGLU(data):
    if ( "NORMAL" == data ):
          data="0"
    if ( "+-" == data ):
          data="1"
    if ( "+1" == data ):
          data="2"
    if ( "+2" == data ):
          data="3"
    if ( "+3" == data ):
          data="4"
    if ( "+4" == data ):
          data="5"
    return(data)


def main(args):
  ser = serial.Serial('/dev/ttyUSB0' , 4800,parity=serial.PARITY_EVEN,bytesize=serial.SEVENBITS,stopbits=serial.STOPBITS_TWO)
  while True:
#    print("Ready")
    data = ser.read() # 1 byte
    if ( data != b'\x02' ):
#       print("ERR")
       continue
    data = ser.read(300) # remain of 1 recode
#    print(data)
    GLU=data[39:67].strip().decode('utf-8', errors='ignore')
    PRO=data[66:94].strip().decode('utf-8', errors='ignore')
    URO=data[120:148].strip().decode('utf-8', errors='ignore')
    PH =data[150:178].strip().decode('utf-8', errors='ignore')
    BLD=data[204:232].strip().decode('utf-8', errors='ignore')
#    print ("GLU:")
#    print (GLU)
#    print ("PRO:")
#    print (PRO)
#    print ("URO:")
#    print (URO)
#    print ("PH:")
#    print (PH)
#    print ("BLD:")
#    print (BLD)
    GLU=changeGLU(GLU[5:11].strip())
    PRO=change(PRO[5:11].strip())
    URO=change(URO[5:11].strip())
    PH =change(PH[12:17].strip())
    BLD=change(BLD[5:11].strip())
    print (GLU+", "+PRO+", "+URO+", "+PH+", "+BLD)
    data = ser.read() # 1 byte
    while data!=b'\x03':
      data = ser.read() # 1 byte
 #   data = ser.read() # 1 byte

    #print(r.text)
    break
if __name__ == '__main__':
    main(sys.argv)

