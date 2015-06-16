<?php

namespace Entities\Composite;

/**
* @Entity
* Simple Derived Identity
* One-to-One relationship
*/
class User
{
	/**
	 * @Id @Column(type="integer") 
	 * @GeneratedValue
	 */
	private $id;
}

/**
* @Entity
*/
class Address 
{
	/**
	 * @Id @OneToOne(targetEntity="User")
	 */
	private $user;
}

?>