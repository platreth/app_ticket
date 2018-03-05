<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TicketRepository")
 */
class Ticket
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
private $title;

/**
 * @ORM\Column(type="datetime")
 */
private $releaseOn;

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
      public function getReleaseOn()
    {
        return $this->releaseOn;
    }

    public function setReleaseOn($releaseOn)
    {
        $this->releaseOn = $releaseOn;
    }
}
