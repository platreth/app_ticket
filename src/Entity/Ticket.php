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
<<<<<<< HEAD
 * @ORM\Column(type="text", length=50)
 */
private $problemeType;
=======
 * @ORM\Column(type="choicetype", length=20)
 */
private $probleme;


/**
 * @ORM\Column(type="choicetype", length=20)
 */
private $date;
>>>>>>> 79dd98e3bc85d42017ba381ebf547dc9f715a3c8

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

<<<<<<< HEAD
	public function getProblemeType()
    {
        return $this->problemeType;
    }
=======
    public function getProbleme()
    {
        return $this->probleme;
    }

    public function setProbleme($probleme)
    {
        $this->probleme = $probleme;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

>>>>>>> 79dd98e3bc85d42017ba381ebf547dc9f715a3c8

    public function setProblemeType($problemeType)
    {
        $this->problemeType = $problemeType;
    }
}
