pdf:
	cd src/booklet && make pdf

png:
	cd src/booklet && make png
	cd src/individual-cards && make all

clean:
	cd src/booklet && make clean
	cd src/individual-cards && make clean
