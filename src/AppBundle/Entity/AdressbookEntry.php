<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class AddressbookEntry
 * @ package AppBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="addressbook_entry")
 */
class AddressbookEntry
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $firstname;

    /**
     * @ORM\Column(type="string")
     */ 
    protected $lastname;
}
