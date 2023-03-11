# ifconfig eth0:1 169.254.12.24
/mnt/MySQLWebCardWrite/mysqlwebcardwrite --port=8080 &
/mnt/EntryBlood/EntryBlood --port=8081 &
/mnt/makePersonalCSVFile/makePersonalCSVFile --port=8082 &
"/mnt/尿検査機/Builds - 尿検査機/Linux ARM/尿検査機/尿検査機" --port=8083 &

