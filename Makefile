# Makefile
echo:
	@echo
	@echo "		make up		/* start sail containers */ "
	@echo "		make down	/* stop sail containers	*/ "
	@echo "		make restart	/* restart sail containers */ "
	@echo "		make build	/* unusable, lack of .env */ "
	@echo

env:
	env

up:
	docker-compose up -d

down:
	docker-compose down
	sleep 1

build:
	docker-compose build

restart: down up
