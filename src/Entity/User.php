<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    // add your own fields

    /**
 * @ORM\Column(type="text", length=255)
 */
private $username;

/**
 * @ORM\Column(type="text", length=255)
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
        return $this->Username;
    }

    public function setUsername($username)
    {
        $this->Username = $Username;
    }

     public function getEmail()
    {
        return $this->Email;
    }

    public function setEmail($email)
    {
        $this->Email = $Email;
    }

       public function getPassword()
    {
        return $this->Email;
    }

    public function setPassword($password)
    {
        $this->Password = $Password;
    }

    public function getRoles()
    {
        return $this->Email;
    }

    public function setRoles($roles)
    {
        $this->Roles = $Roles;
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
