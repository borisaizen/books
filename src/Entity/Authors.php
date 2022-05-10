<?php

namespace App\Entity;

use App\Repository\AuthorsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AuthorsRepository::class)
 */
class Authors
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $AUTHOR_ID;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $AUTHOR_NAME;

    /**
     * @ORM\Column(type="integer")
     */
    private $BOOK_QUANTITY;

    /**
     * @ORM\ManyToMany(targetEntity=Books::class, mappedBy="BOOK_AUTHOR_IDS")
     */
    private $BOOKS;

    public function __construct()
    {
        $this->BOOKS = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAUTHORID(): ?int
    {
        return $this->AUTHOR_ID;
    }

    public function setAUTHORID(int $AUTHOR_ID): self
    {
        $this->AUTHOR_ID = $AUTHOR_ID;

        return $this;
    }

    public function getAUTHORNAME(): ?string
    {
        return $this->AUTHOR_NAME;
    }

    public function setAUTHORNAME(string $AUTHOR_NAME): self
    {
        $this->AUTHOR_NAME = $AUTHOR_NAME;

        return $this;
    }

    public function getBOOKQUANTITY(): ?int
    {
        return $this->BOOK_QUANTITY;
    }

    public function setBOOKQUANTITY(int $BOOK_QUANTITY): self
    {
        $this->BOOK_QUANTITY = $BOOK_QUANTITY;

        return $this;
    }

    /**
     * @return Collection<int, Books>
     */
    public function getBOOKS(): Collection
    {
        return $this->BOOKS;
    }

    public function addBOOK(Books $bOOK): self
    {
        if (!$this->BOOKS->contains($bOOK)) {
            $this->BOOKS[] = $bOOK;
            $bOOK->addBOOKAUTHORID($this);
        }

        return $this;
    }

    public function removeBOOK(Books $bOOK): self
    {
        if ($this->BOOKS->removeElement($bOOK)) {
            $bOOK->removeBOOKAUTHORID($this);
        }

        return $this;
    }
}
