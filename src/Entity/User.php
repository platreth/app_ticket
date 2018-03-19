<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;


/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(
 *     fields={"username"},
 *     message="Le nom d'utilisateur est déjà utilisé"
 * )
 * @UniqueEntity(
 *     fields={"email"},
 *     message="L'email est déjà utilisé"
 * )
*/
class User implements UserInterface
{

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Ticket", mappedBy="category")
     */
    private $tickets;

    public function __construct()
    {
        $this->tickets = new ArrayCollection();
    }

    /**
     * @return Collection|Ticket[]
     */
    public function getTickets()
    {
        return $this->tickets;
    }


    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */


    private $id;


/**
 * @ORM\Column(name="username", type="text", length=255, unique=true)
 * @Assert\NotBlank()
 */
private $username;

/**
 * @ORM\Column(name="email", type="text", length=255, unique=true)
 * @Assert\NotBlank()
 */
private $email;

/**
 * @ORM\Column(type="text", length=255)
 */
private $password;

/**
 * @ORM\Column(type="json_array")
 */
private $roles = ["ROLE_USER"];


private $plainPassword;

    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;
    }


    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

     public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

       public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getRoles()
    {
        return $this->roles;
    }

    public function setRoles($roles)
    {
        $this->roles = $roles;
    }
    public function getSalt()
    {
    	return null;
    }
    public function addRole($role) {
        $this->roles[] = $role;
    }
    
    public function removeRole($role) {
        $index = array_search($role, $this->roles, true);
        if ($index !== false) {
            array_splice($this->roles, $index, 1);
        }
    }
    public function eraseCredentials() {
        $this->plainPassword=null;
    }
}
