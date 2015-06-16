<?php

namespace Entities\Composite;

use Doctrine\Common\Collections\ArrayCollection;

/**
* @Entity
* Join-Table with Metadata
*/
class Order
{
	/**
	 * @Id @Column(type="integer")
	 * @GeneratedValue
	 */
	private $id;

	/**
	 * @ManyToOne(targetEntity="Customer")
	 */
	private $customer;

	/**
	 * @OneToMany(targetEntity="OrderItem", mappedBy="order")
	 */
	private $items;

	/**
	 * @Column(type="boolean")
	 */
	private $payed = false;

	/**
	 * @Column(type="boolean")
	 */
	private $shipped = false;

	/**
	 * @Column(type="datetime")
	 */
	
	public function __construct(Customer $customer)
	{
		$this->customer = $customer;
		$this->items = new ArrayCollection();
		$this->created = new \DateTime("now");
	}
}


/**
* @Entity
*/
class Product
{
	/**
	 * @Id @Column(type="integer")
	 * @GeneratedValue
	 */
	private $id;

	/**
	 * @Column(type="string")
	 */
	private $name;

	/**
	 * @Column(type="decimal")
	 */
	private $currentPrice;

	public function getCurrentPrice()
	{
		return $this->currentPrice;
	}
}


/**
* @Entity
*/
class OrderItem
{
	/**
	 * @Id @ManyToOne(targetEntity="Order")
	 */
	private $order;

	/**
	 * @Id @ManyToOne(targetEntity="Product")
	 */
	private $product;

	/**
	 * @Column(type="integer")
	 */
	private $amount = 1;

	/**
	 * @Column(type="decimal")
	 */
	private $offeredPrice;

	public function __construct(Order $order, Product $product, $amount = 1)
	{
		$this->order = $order;
		$this->product = $product;
		$this->offeredPrice = $product->getCurrentPrice();
	}
}




?>