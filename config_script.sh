#!/bin/bash
docker exec -i php a2enmod rewrite
docker-compose restart