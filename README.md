# Cards Against Artisans

This contains scripts to generate PDF and PNG files for playing cards and the instruction card.

This repository is loosely based off of [Cards Against Cryptography](https://github.com/CardsAgainstCryptography/CAC)

## Prerequisites

* TeXLive (`brew install TeXLive`)
* ImageMagick (`brew install imagemagick`)

## Building

```bash
# Generate playing card files
$ make png

# Generate instructions card
$ make instructions
```

## Updating cards

* Question cards: [src/black.txt](src/black.txt)
* Answer cards: [src/white.txt](src/white.txt)

> One card per line, LaTeX syntax accepted

## Updating instructions card

* Front: [src/individual-cards/instructions.tex](src/individual-cards/instructions.tex)
* Back: [src/individual-cards/instructions_back.tex](src/individual-cards/instructions_back.tex)

## Changing logo on cards

Replace the inline SVG file in [src/common.tex](src/common.tex) with a logo of your choice.

Make sure to provide both a black version (for white cards) and a white version (for black cards).
