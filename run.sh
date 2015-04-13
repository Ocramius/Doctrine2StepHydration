#!/usr/bin/env sh

curl -sS https://getcomposer.org/installer | php
./composer.phar install

SEPARATOR="###############################"

echo "$SEPARATOR"
echo "Populating Database"
echo "$SEPARATOR"
time php populate-db.php

echo "$SEPARATOR"
echo "Lazy loading example"
echo "$SEPARATOR"
time php lazy-loading.php

echo "$SEPARATOR"
echo "Single fetch-join example"
echo "$SEPARATOR"
time php single-fetch-join.php

echo "$SEPARATOR"
echo "Multi-step hydration example"
echo "$SEPARATOR"

time php multi-step-hydration.php
