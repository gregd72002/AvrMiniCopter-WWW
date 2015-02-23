#!/bin/sh

MP4Box -add "$1".h264 "$1".mp4

#ffmpeg -r 25 -i "$1" -vcodec copy -b:v 5M "$1".mp4

