#!/bin/bash

function restart() {
    pid=`cat runtime/master.pid`

    if kill -0 $pid ; then
        kill -9 $pid
    fi

    echo "restart server"
    php src/index.php --config config.conf &
}

fswatch --event Removed --event Renamed --event Updated --event Created -or -l 3 -0 src/ | while read -d "" event
do
    restart
done
