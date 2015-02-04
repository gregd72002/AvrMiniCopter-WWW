#!/bin/sh
gnuplot <<- EOF
	set term png size 2048, 1536
	
	set output "$2"

	set yrange [1000:1600]
	set ytics 50
	set grid ytics lt 0 lw 1 lc rgb "#bbbbbb"

	plot \
		"$1" using 3 title 'front-left' with lines \
		,"$1" using 4 title 'back-left' with lines \
		,"$1" using 5 title 'front-right' with lines \
		,"$1" using 6 title 'back-right' with lines 
EOF

