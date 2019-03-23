<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MonImcRepository")
 */
class MonImc
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     **@Assert\NotBlank(message="La Civilité est Obligatoire")
     * @ORM\Column(type="string", length=255)
     */
    private $gender;

    /**
     **@Assert\NotBlank(message="Le nom est Obligatoire")
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     **@Assert\NotBlank(message="Le prénom est Obligatoire")
     * @ORM\Column(type="string", length=255)
     */
    private $surname;

    /**
     *@Assert\NotBlank(message="L'email est Obligatoire")
     *@Assert\Email(message ="L'adresse e-mail n'est pas valide")
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @Assert\Length(
     *      min = 1,
     *      max = 3,
     *      minMessage = "votre age doit comporter au moin {{ limit }} un Caractère",
     *      maxMessage = "Votre age ne doit pas dépasser {{ limit }} caractères"
     * )
     *@Assert\GreaterThan(
     * value =0,
     * message = "L'age doit etre supperieur à 0"
     * )
     *@Assert\NotBlank(message="L'age est Obligatoire")
     * @ORM\Column(type="integer")
     */
    private $age;

    /**
     * @Assert\Length(
     *      min = 1,
     *      max = 3,
     *      minMessage = "votre poid doit comporter au moin {{ limit }} un Caractère",
     *      maxMessage = "Votre poid ne doit pas dépasser {{ limit }} caractères"
     * )
     *@Assert\GreaterThan(
     * value =0,
     * message = "Le Poid doit etre supperieur à 0"
     * )
     *@Assert\NotBlank(message="Le Poid est Obligatoire")
     * @ORM\Column(type="integer")
     */
    private $weight;

    /**
     * @Assert\Length(
     *      min = 1,
     *      max = 3,
     *      minMessage = "votre taille doit comporter au moin {{ limit }} un Caractère",
     *      maxMessage = "Votre taille ne doit pas dépasser {{ limit }} caractères"
     * )
     *@Assert\GreaterThan(
     * value =0,
     * message = "La taille doit etre supperieur à 0"
     * )
     *@Assert\NotBlank(message="La taille est Obligatoire")
     * @ORM\Column(type="integer")
     */
    private $height;

    public function getId()
    {
        return $this->id;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(int $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setHeight(int $height): self
    {
        $this->height = $height;

        return $this;
    }
}
