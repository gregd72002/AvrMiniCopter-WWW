#!/bin/sh

/usr/bin/MP4Box -tmp /rpicopter/tmp/ -add "$1".h264 "$1".mp4 2>&1

#ffmpeg -r 25 -i "$1" -vcodec copy -b:v 5M "$1".mp4

