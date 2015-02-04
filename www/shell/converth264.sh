#!/bin/sh

ffmpeg -r 25 -i "$2" -vcodec copy -b:v 5M "$2".mp4 # 2>&1

