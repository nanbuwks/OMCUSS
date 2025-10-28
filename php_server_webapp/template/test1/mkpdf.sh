 python3 db2.py original_xmllint.xml $1 | sed s/##TODAY##/"`date +%Y年%-m月%-d日`"/g  > content.xml
 zip test1.odg content.xml
 soffice --headless --convert-to pdf test1.odg
 evince test1.pdf
