#!/bin/sh
# ACCEL CHART
gnuplot <<- EOF
	set term png size 2048, 1536
	
	set output "$2"

	set yrange [-0.5:0.5]
	set ytics 0.1
	set grid ytics lt 0 lw 1 lc rgb "#bbbbbb"

	plot \
		"$1" using 2 title 'max X' with lines \
		,"$1" using 3 title 'max Y' with lines \
		,"$1" using 4 title 'max Z' with lines \
		,"$1" using 5 title 'min X' with lines \
		,"$1" using 6 title 'min Y' with lines \
		,"$1" using 7 title 'min Z' with lines
EOF
