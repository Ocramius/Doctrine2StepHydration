<?php

use Doctrine2StepHydration\User;

/* @var $entityManager \Doctrine\ORM\EntityManager */
$entityManager = require __DIR__ . '/bootstrap.php';

/* @var $users User[] */
$users = $entityManager
    ->createQuery('
        SELECT
            u, a
        FROM
            ' . User::class . ' u
        LEFT JOIN
            u.socialAccounts a
    ')
    ->getResult();

$entityManager
    ->createQuery('
        SELECT
            u, s
        FROM
            ' . User::class . ' u
        LEFT JOIN
            u.sessions s
    ')
    ->getResult();

$fetchedRecords = 0;

foreach ($users as $user) {
    $fetchedRecords += 1;

    $fetchedRecords += count($user->socialAccounts);
    $fetchedRecords += count($user->sessions);
}

var_dump('Fetched records: ', $fetchedRecords);