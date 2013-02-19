<?php

namespace Ens\JobeetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ens\JobeetBundle\Utils\Jobeet as Jobeet;

/**
 * Job
 */
class Job
{
	/**
	 * @var string
	 */
	private $id;

	/**
	 * @var string
	 */
	private $generator;

	/**
	 * @var string
	 */
	private $type;

	/**
	 * @var string
	 */
	private $company;

	/**
	 * @var string
	 */
	private $logo;

	/**
	 * @var string
	 */
	private $url;

	/**
	 * @var string
	 */
	private $position;

	/**
	 * @var string
	 */
	private $location;

	/**
	 * @var string
	 */
	private $description;

	/**
	 * @var string
	 */
	private $how_to_apply;

	/**
	 * @var string
	 */
	private $token;

	/**
	 * @var boolean
	 */
	private $is_public;

	/**
	 * @var boolean
	 */
	private $is_activated;

	/**
	 * @var string
	 */
	private $email;

	/**
	 * @var \DateTime
	 */
	private $expires_at;

	/**
	 * @var \DateTime
	 */
	private $created_at;

	/**
	 * @var \DateTime
	 */
	private $updated_at;

	/**
	 * @var \Ens\JobeetBundle\Entity\Category
	 */
	private $category;


	/**
	 * Set id
	 *
	 * @param string $id
	 * @return Job
	 */
	public function setId($id)
	{
		$this->id = $id;

		return $this;
	}

	/**
	 * Get id
	 *
	 * @return string
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set generator
	 *
	 * @param string $generator
	 * @return Job
	 */
	public function setGenerator($generator)
	{
		$this->generator = $generator;

		return $this;
	}

	/**
	 * Get generator
	 *
	 * @return string
	 */
	public function getGenerator()
	{
		return $this->generator;
	}

	/**
	 * Set type
	 *
	 * @param string $type
	 * @return Job
	 */
	public function setType($type)
	{
		$this->type = $type;

		return $this;
	}

	/**
	 * Get type
	 *
	 * @return string
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * Set company
	 *
	 * @param string $company
	 * @return Job
	 */
	public function setCompany($company)
	{
		$this->company = $company;

		return $this;
	}

	/**
	 * Get company
	 *
	 * @return string
	 */
	public function getCompany()
	{
		return $this->company;
	}

	/**
	 * Set logo
	 *
	 * @param string $logo
	 * @return Job
	 */
	public function setLogo($logo)
	{
		$this->logo = $logo;

		return $this;
	}

	/**
	 * Get logo
	 *
	 * @return string
	 */
	public function getLogo()
	{
		return $this->logo;
	}

	/**
	 * Set url
	 *
	 * @param string $url
	 * @return Job
	 */
	public function setUrl($url)
	{
		$this->url = $url;

		return $this;
	}

	/**
	 * Get url
	 *
	 * @return string
	 */
	public function getUrl()
	{
		return $this->url;
	}

	/**
	 * Set position
	 *
	 * @param string $position
	 * @return Job
	 */
	public function setPosition($position)
	{
		$this->position = $position;

		return $this;
	}

	/**
	 * Get position
	 *
	 * @return string
	 */
	public function getPosition()
	{
		return $this->position;
	}

	/**
	 * Set location
	 *
	 * @param string $location
	 * @return Job
	 */
	public function setLocation($location)
	{
		$this->location = $location;

		return $this;
	}

	/**
	 * Get location
	 *
	 * @return string
	 */
	public function getLocation()
	{
		return $this->location;
	}

	/**
	 * Set description
	 *
	 * @param string $description
	 * @return Job
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
	 * Set how_to_apply
	 *
	 * @param string $howToApply
	 * @return Job
	 */
	public function setHowToApply($howToApply)
	{
		$this->how_to_apply = $howToApply;

		return $this;
	}

	/**
	 * Get how_to_apply
	 *
	 * @return string
	 */
	public function getHowToApply()
	{
		return $this->how_to_apply;
	}

	/**
	 * Set token
	 *
	 * @param string $token
	 * @return Job
	 */
	public function setToken($token)
	{
		$this->token = $token;

		return $this;
	}

	/**
	 * Get token
	 *
	 * @return string
	 */
	public function getToken()
	{
		return $this->token;
	}

	/**
	 * Set is_public
	 *
	 * @param boolean $isPublic
	 * @return Job
	 */
	public function setIsPublic($isPublic)
	{
		$this->is_public = $isPublic;

		return $this;
	}

	/**
	 * Get is_public
	 *
	 * @return boolean
	 */
	public function getIsPublic()
	{
		return $this->is_public;
	}

	/**
	 * Set is_activated
	 *
	 * @param boolean $isActivated
	 * @return Job
	 */
	public function setIsActivated($isActivated)
	{
		$this->is_activated = $isActivated;

		return $this;
	}

	/**
	 * Get is_activated
	 *
	 * @return boolean
	 */
	public function getIsActivated()
	{
		return $this->is_activated;
	}

	/**
	 * Set email
	 *
	 * @param string $email
	 * @return Job
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
	 * Set expires_at
	 *
	 * @param \DateTime $expiresAt
	 * @return Job
	 */
	public function setExpiresAt($expiresAt)
	{
		$this->expires_at = $expiresAt;

		return $this;
	}

	/**
	 * Get expires_at
	 *
	 * @return \DateTime
	 */
	public function getExpiresAt()
	{
		return $this->expires_at;
	}

	/**
	 * Get created_at
	 *
	 * @return \DateTime
	 */
	public function getCreatedAt()
	{
		return $this->created_at;
	}


	/**
	 * Get updated_at
	 *
	 * @return \DateTime
	 */
	public function getUpdatedAt()
	{
		return $this->updated_at;
	}

	/**
	 * Set category
	 *
	 * @param \Ens\JobeetBundle\Entity\Category $category
	 * @return Job
	 */
	public function setCategory(\Ens\JobeetBundle\Entity\Category $category = null)
	{
		$this->category = $category;

		return $this;
	}

	/**
	 * Get category
	 *
	 * @return \Ens\JobeetBundle\Entity\Category
	 */
	public function getCategory()
	{
		return $this->category;
	}
	/**
	 * @ORM\PrePersist
	 */
	public function setCreatedAtValue()
	{
		if(!$this->getCreatedAt())
		{
			$this->created_at = new \DateTime();
		}
	}

	/**
	 * @ORM\PreUpdate
	 */
	public function setUpdatedAtValue()
	{
		$this->updated_at = new \DateTime();
	}
	
	/**
	 * Get Company slug
	 * 
	 * @return string
	 */
	public function getCompanySlug()
	{
		return Jobeet::slugify($this->getCompany());
	}
	
	/**
	 * Get position slug
	 * 
	 * @return string
	 */
	public function getPositionSlug()
	{
		return Jobeet::slugify($this->getPosition());
	}
	
	/**
	 * Get location slug
	 * 
	 * @return string
	 */
	public function getLocationSlug()
	{
		return Jobeet::slugify($this->getLocation());
	}	

    /**
     * @ORM\PrePersist
     */
    public function setExpiresAtValue()
    {
    	if(!$this->getExpiresAt())
    	{
    		$now = $this->getCreatedAt() ? $this->getCreatedAt()->format('U') : time();
    		$this->expires_at = new \DateTime(date('Y-m-d H:i:s', $now + 86400 * 30));
    	}
    }

    /**
     * Set updated_at
     *
     * @param \DateTime $updatedAt
     * @return Job
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
    
        return $this;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Job
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    
        return $this;
    }
}