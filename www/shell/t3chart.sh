#!/bin/sh
#QUAT
gnuplot <<- EOF
	set term png size 2048, 1536
	
	set output "$2"

	set multiplot 

	set size 1,0.7
	set yrange [1000:1600]
	set ytics 50 tc lc 7
	set ylabel 'motors' tc lc 7
	set grid ytics lt 1 lw 1 lc rgb "#bbbbbb"

	set origin 0.01,0.3
	plot \
		"$1" using 6 title 'front-left' axes x1y1 with lines lc 1  \
		,"$1" using 7 title 'back-left' axes x1y1 with lines lc 2 \
		,"$1" using 8 title 'front-right' axes x1y1 with lines lc 3\
		,"$1" using 9 title 'back-right' axes x1y1 with lines lc 4

	set size 1,0.3
	#set yrange [-180:180]
	set autoscale y 
	set ytics 5 tc lt 1 
	set ylabel 'quat' tc lc 7
	set grid ytics lt 1 lw 1 lc rgb "#bbbbbb"


	set origin 0.017,0.01
	set size 0.993,0.3
	plot \
		"$1" using 2 title 'yaw' axes x1y1 with lines lc 1\
		,"$1" using 3 title 'pitch' axes x1y1 with lines lc 2\
		,"$1" using 4 title 'roll' axes x1y1 with lines lc 3\
		,"$1" using 5 title 'yt' axes x1y1 with lines lc 4

	unset multiplot
EOF

