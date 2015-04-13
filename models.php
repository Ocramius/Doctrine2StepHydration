<?php

namespace Doctrine2StepHydration;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class User
{
    const CLASSNAME = __CLASS__;

    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue(strategy="AUTO") */
    public $id;

    /** @ORM\ManyToMany(targetEntity=SocialAccount::class, cascade={"persist"}) */
    public $socialAccounts = [];

    /** @ORM\ManyToMany(targetEntity=Session::class, cascade={"persist"}) */
    public $sessions = [];
}

/** @ORM\Entity */
class SocialAccount
{
    const CLASSNAME = __CLASS__;

    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue(strategy="AUTO") */
    public $id;
}

/** @ORM\Entity */
class Session
{
    const CLASSNAME = __CLASS__;

    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue(strategy="AUTO") */
    public $id;
}
