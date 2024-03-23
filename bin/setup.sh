#!/bin/bash
set -e

function log() {
    message=$1
    level=${2:-"INFO"}

    echo "[$(date -u)] ${level}: ${message}"
}

function usage() {
    echo "Usage: $0 ADMIN_USER ADMIN_PASS"
}

function wp_check_setup() {
    if wp core is-installed --path="/var/www/html" --allow-root; then
        log "WordPress is already set up"
        exit 0
    fi
}

function wp_setup() {
    admin_user=$1
    admin_pass=$2

    log "Setting up WordPress with admin user '${admin_user}' and password '${admin_pass}'"

    wp core install \
        --url="http://localhost:8080" \
        --title="My WordPress Site" \
        --admin_user="${admin_user}" \
        --admin_password="${admin_pass}" \
        --admin_email="admin@example.com" \
        --path="/var/www/html" \
        --allow-root
}

if [ "$#" -ne 2 ]; then
    usage
    exit 1
fi

# exit if WordPress is already set up
wp_check_setup

# WordPress initial setup
wp_setup $1 $2
