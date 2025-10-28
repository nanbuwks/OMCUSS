cp $1 $1.work
rm content.xml
unzip $1.work content.xml
xmllint --format content.xml > original_xmllint.xml
python3 db2preview.py original_xmllint.xml $2 | sed s/##TODAY##/"`date +%Y年%-m月%-d日`"/g  > content.xml
zip $1.work content.xml
cp $1.work $1.仮編集.ods
soffice --headless --convert-to pdf $1.work
# evince $1.pdf
