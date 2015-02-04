#!/bin/sh
# ALTITUDE
gnuplot <<- EOF
	set term png size 2048, 1536
	
	set output "$2"

	#set yrange [-0.5:0.5]
	set autoscale y
	#set ytics 0.1
	set grid ytics lt 0 lw 1 lc rgb "#bbbbbb"

	plot \
		"$1" using 3 title 'Target' with lines \
		,"$1" using 4 title 'Alt' with lines
EOF
