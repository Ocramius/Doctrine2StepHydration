<?php

namespace Doctrine2StepHydration;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class Session
{
    const CLASSNAME = __CLASS__;

    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue(strategy="AUTO") */
    public $id;
}
