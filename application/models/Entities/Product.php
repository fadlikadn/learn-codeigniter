<?php

namespace Entities;
// src/Product.php

use Doctrine\ORM\Mapping as ORM;

/**
* @Entity @Table(name="products")
**/
class Product
{
	/** @Id @Column(type="integer") @GeneratedValue **/
	protected $id;
	
	/** @Column(type="string") **/
	protected $name;

	public function getId() 
	{
		return $this->id;
	}

	public function getName() 
	{
		return $this->name;
	}

	public function setName($name) 
	{
		$this->name = $name;
	}

}