#!/bin/sh
DIR=`/usr/bin/dirname $0`

/bin/cat $DIR/../js/loc_list.js | /bin/sed 's/$//' > $DIR/../js/loc_list_unix.js

$DIR/jsdb -load  $DIR/LatLng.js -load $DIR/../js/loc_list_unix.js $DIR/JSON.js  > $DIR/../locations.txt-new


if [  -s  $DIR/../locations.txt-new ]; then
  cp $DIR/../locations.txt-new  $DIR/../locations.txt
fi

