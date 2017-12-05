<?php

namespace AppBundle\Entity;

use AppBundle\Enum\Gender;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="users")
 */
class User
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column()
     */
    protected $name;

    /**
     * @var Gender
     *
     * @ORM\Column(type="php_enum_gender")
     */
    protected $gender;
}
