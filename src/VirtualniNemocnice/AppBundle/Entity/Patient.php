<?php

namespace VirtualniNemocnice\AppBundle\Entity;


/**
 * Class Patient
 *
 * @Doctrine\ORM\Mapping\Entity
 * @Doctrine\ORM\Mapping\Table(name="patient")
 * @package VirtualniNemocnice\AppBundle\Entity
 */
class Patient
{
    /** @var  int
     * @Doctrine\ORM\Mapping\Id
     * @Doctrine\ORM\Mapping\GeneratedValue(strategy="AUTO")
     * @Doctrine\ORM\Mapping\Column(type="integer")
     */
    protected $id;
    /** @var  string
     * @Doctrine\ORM\Mapping\Column(type="string", length=100)
     */
    protected $email;
    /**
     * @Doctrine\ORM\Mapping\Column(type="string", length=20)
     */
    protected $phone;
    /**
     * @Doctrine\ORM\Mapping\Column(type="string", length=6)
     */
    protected $sex;
    /**
     * @Doctrine\ORM\Mapping\Column(type="integer")
     */
    protected $age;
    /**
     * @Doctrine\ORM\Mapping\Column(type="string", length=500)
     */
    protected $illness;
    /**
     * @Doctrine\ORM\Mapping\Column(type="integer")
     */
    protected $height;
    /**
     * @Doctrine\ORM\Mapping\Column(type="integer")
     */
    protected $weight;
    /**
     * @Doctrine\ORM\Mapping\Column(type="string", length=500)
     */
    protected $familyIllness;
    /**
     * @Doctrine\ORM\Mapping\Column(type="string", length=500)
     */
    protected $medications;
    /**
     * @Doctrine\ORM\Mapping\Column(type="string", length=500)
     */
    protected $surgicalProcedures;
    /**
     * @Doctrine\ORM\Mapping\Column(type="string")
     */
    protected $query;
    /**
     * @Doctrine\ORM\Mapping\Column(type="string", length=50)
     */
    protected $answerType;
    /**
     * @Doctrine\ORM\Mapping\Column(type="string", length=50)
     */
    protected $paymentType;
    /**
     * @Doctrine\ORM\Mapping\Column(type="datetime")
     */
    protected $createdAt;
    /**
     * @Doctrine\ORM\Mapping\Column(type="datetime")
     */
    protected $modifiedAt;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param mixed $sex
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getIllness()
    {
        return $this->illness;
    }

    /**
     * @param mixed $illness
     */
    public function setIllness($illness)
    {
        $this->illness = $illness;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param mixed $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param mixed $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * @return mixed
     */
    public function getFamilyIllness()
    {
        return $this->familyIllness;
    }

    /**
     * @param mixed $familyIllness
     */
    public function setFamilyIllness($familyIllness)
    {
        $this->familyIllness = $familyIllness;
    }

    /**
     * @return mixed
     */
    public function getMedications()
    {
        return $this->medications;
    }

    /**
     * @param mixed $medications
     */
    public function setMedications($medications)
    {
        $this->medications = $medications;
    }

    /**
     * @return mixed
     */
    public function getSurgicalProcedures()
    {
        return $this->surgicalProcedures;
    }

    /**
     * @param mixed $surgicalProcedures
     */
    public function setSurgicalProcedures($surgicalProcedures)
    {
        $this->surgicalProcedures = $surgicalProcedures;
    }

    /**
     * @return mixed
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @param mixed $query
     */
    public function setQuery($query)
    {
        $this->query = $query;
    }

    /**
     * @return mixed
     */
    public function getAnswerType()
    {
        return $this->answerType;
    }

    /**
     * @param mixed $answerType
     */
    public function setAnswerType($answerType)
    {
        $this->answerType = $answerType;
    }

    /**
     * @return mixed
     */
    public function getPaymentType()
    {
        return $this->paymentType;
    }

    /**
     * @param mixed $paymentType
     */
    public function setPaymentType($paymentType)
    {
        $this->paymentType = $paymentType;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getModifiedAt()
    {
        return $this->modifiedAt;
    }

    /**
     * @param mixed $modifiedAt
     */
    public function setModifiedAt($modifiedAt)
    {
        $this->modifiedAt = $modifiedAt;
    }

}
