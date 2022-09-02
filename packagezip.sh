#!/bin/bash

echo "Removing old build folder and zip if present"
if test -d build/lj-moods; then
	rm -rf build/lj-moods
fi
if test -f build/lj-moods.zip; then
	rm build/lj-moods.zip
fi

echo "Copying files to build folder"
if [ ! -d build ]; then
	mkdir build
fi

mkdir build/lj-moods
cp -p *.php *.txt *.md LICENSE build/lj-moods

echo "Building lj-moods.zip"
cd build && zip -r lj-moods.zip lj-moods

