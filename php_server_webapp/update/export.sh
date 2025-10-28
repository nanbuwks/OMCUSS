cp $1.csv $1.csv.backup
python3 export.py $1 > $1.csv
