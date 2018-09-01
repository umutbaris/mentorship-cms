<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoriesRepository")
 */
class Categories
{
	/**
	 * @ORM\Id()
	 * @ORM\GeneratedValue()
	 * @ORM\Column(type="integer")
	 */
	private $id;

	/**
	 * @ORM\Column(type="string", length=255)
	 */
	private $title;

	/**
	 * @ORM\Column(type="string", length=32)
	 */
	private $status;

	/**
	 * @var \DateTime $createdDate
	 *
	 * @Assert\DateTime()
	 * @ORM\Column(type="datetime")
	 */
	private $createdDate;

	/**
	 * @var \DateTime $updatedDate
	 *
	 * @Assert\DateTime()
	 * @ORM\Column(type="datetime")
	 */
	private $updatedDate;

	/**
	 * @ORM\ManyToMany(targetEntity="App\Entity\Products", mappedBy="category")
	 */
	private $products;

	public function __construct()
	{
		$this->products = new ArrayCollection();
	}

	public function getId()
	{
		return $this->id;
	}

	public function getTitle(): ?string
	{
		return $this->title;
	}

	public function setTitle(string $title): self
	{
		$this->title = $title;

		return $this;
	}

	public function getStatus(): ?string
	{
		return $this->status;
	}

	public function setStatus(string $status): self
	{
		$this->status = $status;

		return $this;
	}

	public function getCreatedDate(): ?\DateTimeInterface
	{
		return $this->createdDate;
	}

	public function setCreatedDate(\DateTimeInterface $createdDate): self
	{
		$this->createdDate = $createdDate;

		return $this;
	}

	public function getUpdatedDate(): ?\DateTimeInterface
	{
		return $this->updatedDate;
	}

	public function setUpdatedDate(\DateTimeInterface $updatedDate): self
	{
		$this->updatedDate = $updatedDate;

		return $this;
	}

	/**
	 * @return Collection|Products[]
	 */
	public function getProducts(): Collection
	{
		return $this->products;
	}

	public function addProduct(Products $product): self
	{
		if (!$this->products->contains($product)) {
			$this->products[] = $product;
			$product->addCategory($this);
		}

		return $this;
	}

	public function removeProduct(Products $product): self
	{
		if ($this->products->contains($product)) {
			$this->products->removeElement($product);
			$product->removeCategory($this);
		}

		return $this;
	}
}
