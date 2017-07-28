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

    /**
     * @ORM\Column(type="string")
     */
    protected $email;

    /**
     * @ORM\Column(type="string")
     */
    protected $mobile;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * $param string $firstname
     * @return AddressbookEntry
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * $param string $lastname
     * @return AddressbookEntry
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * $param string $email
     * @return AddressbookEntry
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this->email;
    }

    /**
     * $param string $mobile
     * @return AddressbookEntry
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
        return $this;
    }
}
