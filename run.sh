#!/usr/bin/env sh

curl -sS https://getcomposer.org/installer | php
./composer.phar install

echo "Populating Database"
time php populate-db.php

echo "Lazy loading example"
time php lazy-loading.php

echo "Single fetch-join example"
time php single-fetch-join.php

echo "Multi-step hydration example"
time php multi-step-hydration.php
