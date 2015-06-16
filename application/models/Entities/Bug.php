<?php

namespace Entities;
// src/Bug.php

use Doctrine\Common\Collections\ArrayCollection;

/**
* @Entity(repositoryClass="BugRepository") 
* @Table(name="bugs")
*/
class Bug
{
	/**
	 * @Id @Column(type="integer") @GeneratedValue
	 * @var int
	 */
	protected $id;

	/**
	 * @Column(type="string")
	 * @var string
	 */
	protected $description;

	/**
	 * @Column(type="datetime")
	 * @var DateTime
	 */
	protected $created;

	/**
	 * @Column(type="string")
	 * @var string
	 */
	protected $status;

    /**
     * @ManyToOne(targetEntity="User", inversedBy="assignedBugs")
     */
    protected $engineer;

    /**
     * @ManyToOne(targetEntity="User", inversedBy="reportedBugs")
     */
    protected $reporter;

    /**
     * @ManyToMany(targetEntity="Product")
     */
    protected $products = null;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Bug
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Bug
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Bug
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }
    
    /**
     * Constructor Function
     */
    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    public function setEngineer($engineer)
    {
        $engineer->assignedToBug($this);
        $this->engineer = $engineer;
    }

    public function getEngineer()
    {
        return $this->engineer;
    }

    public function setReporter($reporter)
    {
        $reporter->addReportedBug($this);
        $this->reporter = $reporter;
    }

    public function getReporter()
    {
        return  $this->reporter;
    }

    public function assignToProduct($product)
    {
        $this->products[] = $product;
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function close()
    {
        $this->status = "CLOSE";
    }
}
