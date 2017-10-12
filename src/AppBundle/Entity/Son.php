<?php

namespace AppBundle\Entity;

/**
 * Son
 */
class Son
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Father
     */
    private $father;


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
     * Set father
     *
     * @param \AppBundle\Entity\Father $father
     *
     * @return Son
     */
    public function setFather(\AppBundle\Entity\Father $father = null)
    {
        $this->father = $father;

        return $this;
    }

    /**
     * Get father
     *
     * @return \AppBundle\Entity\Father
     */
    public function getFather()
    {
        return $this->father;
    }
}
