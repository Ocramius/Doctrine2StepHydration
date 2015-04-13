#!/usr/bin/env sh

curl -sS https://getcomposer.org/installer | php
./composer.phar install

time php populate-db.php
time php single-fetch-join.php
time php multi-step-hydration.php
