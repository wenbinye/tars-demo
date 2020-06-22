#!/bin/bash

function restart() {
    pid=`cat runtime/master.pid`

    if kill -0 $pid 2>/dev/null; then
        kill -9 $pid
    fi

    echo "restart server"
    composer serve &
}

restart

fswatch --event Removed --event Renamed --event Updated --event Created -or -l 3 -0 src/ | while read -d "" event
do
    restart
done
