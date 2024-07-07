DESTINATION_PDFS=../../output/pdf
DESTINATION_PNGS=../../output/png

pdf:
	mkdir -p ${DESTINATION_PDFS}
	xelatex -shell-escape "\\def\LINES{}\\input{booklet-outside.tex}"
	xelatex -shell-escape "\\def\LINES{}\\input{booklet-inside.tex}"
	xelatex -shell-escape "\\def\AFOURPAPER{}\\input{booklet-combined.tex}"
	mv booklet-combined.pdf ${DESTINATION_PDFS}/booklet-a4.pdf
	xelatex -shell-escape "\\def\LETTERPAPER{}\\input{booklet-combined.tex}"
	mv booklet-combined.pdf ${DESTINATION_PDFS}/booklet-letter.pdf
	make clean

png:
	mkdir -p ${DESTINATION_PNGS}
	xelatex -shell-escape "\\def\BLEEDAREA{}\\input{booklet-outside.tex}"
	convert -density 300 -geometry 1392x1092 booklet-outside.pdf ${DESTINATION_PNGS}/booklet-outside.png
	xelatex -shell-escape "\\def\BLEEDAREA{}\\input{booklet-inside.tex}"
	convert -density 300 -geometry 1392x1092 booklet-inside.pdf ${DESTINATION_PNGS}/booklet-inside.png
	make clean

clean:
	rm -f *.aux *.log *.pdf
