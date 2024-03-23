#!make
include .env

all: clean target/${PLUGIN_NAME}.zip

.PHONY: clean
clean:
	rm -rf target/

target/${PLUGIN_NAME}.zip:
	./bin/build.sh ${PLUGIN_NAME}

.PHONY: wp-setup
wp-setup:
	docker-compose exec wordpress /scripts/setup.sh ${ADMIN_USER} ${ADMIN_PASS}

.PHONY: wp-start
wp-start:
	docker-compose up -d --wait wordpress && make wp-setup
	@echo "WordPress is now running at http://localhost:8080"
	@echo "Admin login: http://localhost:8080/wp-admin"
	@echo "Admin user: ${ADMIN_USER}"
	@echo "Admin password: ${ADMIN_PASS}"

.PHONY: wp-stop
wp-stop:
	docker-compose down
