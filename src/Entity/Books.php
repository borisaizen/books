<?php

namespace App\Entity;

use App\Repository\BooksRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BooksRepository::class)
 */
class Books
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
    private $BOOK_ID;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $BOOK_NAME;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $BOOK_DESCRIPTION;

    /**
     * @ORM\Column(type="date")
     */
    private $BOOK_PUBLISH_YEAR;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $BOOK_COVER_FILE_NAME;

    /**
     * @ORM\Column(type="blob")
     */
    private $BOOK_COVER_FILE_CONTENTS;

    /**
     * @ORM\ManyToMany(targetEntity=Authors::class, inversedBy="BOOKS")
     */
    private $BOOK_AUTHOR_IDS;

    public function __construct()
    {
        $this->BOOK_AUTHOR_IDS = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBOOKID(): ?int
    {
        return $this->BOOK_ID;
    }

    public function setBOOKID(int $BOOK_ID): self
    {
        $this->BOOK_ID = $BOOK_ID;

        return $this;
    }

    public function getBOOKNAME(): ?string
    {
        return $this->BOOK_NAME;
    }

    public function setBOOKNAME(string $BOOK_NAME): self
    {
        $this->BOOK_NAME = $BOOK_NAME;

        return $this;
    }

    public function getBOOKDESCRIPTION(): ?string
    {
        return $this->BOOK_DESCRIPTION;
    }

    public function setBOOKDESCRIPTION(string $BOOK_DESCRIPTION): self
    {
        $this->BOOK_DESCRIPTION = $BOOK_DESCRIPTION;

        return $this;
    }

    public function getBOOKPUBLISHYEAR(): ?\DateTimeInterface
    {
        return $this->BOOK_PUBLISH_YEAR;
    }

    public function setBOOKPUBLISHYEAR(\DateTimeInterface $BOOK_PUBLISH_YEAR): self
    {
        $this->BOOK_PUBLISH_YEAR = $BOOK_PUBLISH_YEAR;

        return $this;
    }

    public function getBOOKCOVERFILENAME(): ?string
    {
        return $this->BOOK_COVER_FILE_NAME;
    }

    public function setBOOKCOVERFILENAME(string $BOOK_COVER_FILE_NAME): self
    {
        $this->BOOK_COVER_FILE_NAME = $BOOK_COVER_FILE_NAME;

        return $this;
    }

    public function getBOOKCOVERFILECONTENTS()
    {
        return $this->BOOK_COVER_FILE_CONTENTS;
    }

    public function setBOOKCOVERFILECONTENTS($BOOK_COVER_FILE_CONTENTS): self
    {
        $this->BOOK_COVER_FILE_CONTENTS = $BOOK_COVER_FILE_CONTENTS;

        return $this;
    }

    /**
     * @return Collection<int, Authors>
     */
    public function getBOOKAUTHORIDS(): Collection
    {
        return $this->BOOK_AUTHOR_IDS;
    }

    public function addBOOKAUTHORID(Authors $bOOKAUTHORID): self
    {
        if (!$this->BOOK_AUTHOR_IDS->contains($bOOKAUTHORID)) {
            $this->BOOK_AUTHOR_IDS[] = $bOOKAUTHORID;
        }

        return $this;
    }

    public function removeBOOKAUTHORID(Authors $bOOKAUTHORID): self
    {
        $this->BOOK_AUTHOR_IDS->removeElement($bOOKAUTHORID);

        return $this;
    }
}
