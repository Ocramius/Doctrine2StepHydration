<?php

namespace Doctrine2StepHydration;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class SocialAccount
{
    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue(strategy="AUTO") */
    public $id;
}
