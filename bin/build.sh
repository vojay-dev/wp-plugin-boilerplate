#!/bin/bash
set -e

function log() {
    message=$1
    level=${2:-"INFO"}

    echo "[$(date -u)] ${level}: ${message}"
}

function usage() {
    echo "Usage: $0 PLUGIN_NAME"
}

function build() {
    plugin_name=$1

    target=target
    plugin_dir=src
    plugin_zip=${plugin_name}.zip

    mkdir -p ${target}

    rm -f ${plugin_zip}
    (cd ${plugin_dir} && zip -r ${plugin_zip} .)
    mv ${plugin_dir}/${plugin_zip} ${target}/${plugin_zip}

    log "Plugin ready: ${target}/${plugin_zip}"
}

if [ "$#" -ne 1 ]; then
    usage
    exit 1
fi

build $1
