<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TicketRepository")
 */
class Ticket
{

    // ...

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="users")
     * @ORM\JoinColumn(nullable=true)
     */
    private $user;

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user)
    {
        $this->user = $user;
    }


    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


 /**
 * @ORM\Column(type="text", length=255)
 */
private $title;

/**
 * @ORM\Column(type="text", length=1000)
 */
private $description;

/**
 * @ORM\Column(type="text", length=50)
 */
private $problemeType;

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
	}

	public function getProblemeType()
    {
        return $this->problemeType;
    }

    public function setProblemeType($problemeType)
    {
        $this->problemeType = $problemeType;
    }
}
