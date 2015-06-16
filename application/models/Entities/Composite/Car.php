<?php

namespace Entities\Composite;

/**
* @Entity
*/
class Car
{
	/**
	 * @Id @Column(type="string")
	 */
	private $name;
	/**
	 * @Id @Column(type="integer")
	 */
	private $year;

	public function __construct($name, $year)
	{
		$this->name = $name;
		$this->year = $year;
	}

	public function getModelName()
	{
		return $this->name;
	}

	public function getYearOfProduction()
	{
		return $this->year;
	}
}
