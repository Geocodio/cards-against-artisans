instructions:
	cd src/individual-cards && xelatex -shell-escape '\def\BLEEDAREA{}\input{instructions.tex}' && magick -density 400 instructions.pdf instructions.png && xelatex -shell-escape '\def\BLEEDAREA{}\input{instructions_back.tex}' && magick -density 400 instructions_back.pdf instructions_back.png

png:
	cd src/individual-cards && make all

clean:
	cd src/individual-cards && make clean
