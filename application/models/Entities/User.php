<?php

namespace Entities;

use Doctrine\Common\Collections\ArrayCollection;

/**
* @Entity @Table(name="user")
*/
class User
{
	/**
	* @Id
	* @Column(type="integer", nullable=false)
	* @GeneratedValue(strategy="AUTO")
	*/
	protected $id;

	/**
	* @Column(type="string", length=32, unique=true, nullable=false)
	*/
	protected $username;

	/**
	* @Column(type="string", length=64, nullable=false)
	*/
	protected $password;

	/**
	* @Column(type="string", length=255, unique=true, nullable=false)
	*/
	protected $email;

	/**
	* The @JoinColumn is not necessary in this example. When you do not specify
	* a @JoinColumn annotation, Doctrine will inteligently determine the join
	* column based on the entity class name and primary key.
	* 
	* @ManyToOne(targetEntity="Group")
	* @JoinColumn(name="group_id", referencedColumnName="id")
	*/
	protected $group;

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
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set group
     *
     * @param \Entities\Group $group
     * @return User
     */
    public function setGroup(\Entities\Group $group = null)
    {
        $this->group = $group;

        return $this;
    }

    /**
     * Get group
     *
     * @return \Entities\Group 
     */
    public function getGroup()
    {
        return $this->group;
    }
}

