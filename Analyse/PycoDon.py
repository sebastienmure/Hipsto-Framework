#! /bin/env
# -*- coding: utf8 -*-

import xml.etree.ElementTree as ET
import os

current_dir = os.getcwd()
ficI = raw_input('>fichier (diag.xml): ')
ficO = open(current_dir + "\dicoDon.html", "w")
html = ""

if(ficI == ""):
	ficI = current_dir + "\\diag.xml"
else:
	ficI = current_dir + "\\" + ficI

print "parsing  " + ficI

tree = ET.parse(ficI)
root = tree.getroot()

ficO.write("<html><head><title></title></head><body>\n")

for entite in root.iter('entite'):
	ficO.write( "\t<div id=\"liste-wrapper\"><label><h3>"+ entite.get('name')+ ":</h3></label>\n\t\t<ul>\n" )

	for att in entite.findall('attribut'):
		if(att != None):
			ficO.write( '\t\t\t<li><strong>' + att.get('name') + '</strong> :\t' + att.get('type') + '\t' + att.get('key') + '</li>\n' )
	ficO.write('\t\t</ul>\n\t</div>\n')

# Liens
ficO.write("\t<div id=\"links\"><label><h3>Liens:</h3></label>\n\t\t<ul>\n")
for link in root.iter('link'):
	ficO.write( "\t\t\t<li>elem 1 : " + link.get('elem1') + " | elem2 : " + link.get('elem2') + " | card : " + link.get('card') + "</li>\n" )
ficO.write('\t\t</ul>\n\t</div>\n')


links = root.iter('LinkList')

ficO.write("</body></html>")

ficO.close()

print "- Fichier " + current_dir + u"\dicoDon.html créé -"