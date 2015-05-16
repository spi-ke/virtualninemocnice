<?php

namespace VirtualniNemocnice\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Patient
 *
 * @ORM\Entity(repositoryClass="VirtualniNemocnice\AppBundle\Repository\PatientRepository")
 * @ORM\Table(name="patient")
 * @ORM\Entity(repositoryClass="VirtualniNemocnice\AppBundle\Repository\PatientRepository")
 */
class Patient
{
    /** @var  int
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;
    /** @var  string
     * @ORM\Column(type="string", length=100)
     */
    protected $email;
    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected $phone;
    /**
     * @ORM\Column(type="string", length=6)
     */
    protected $sex;
    /**
     * @ORM\Column(type="integer")
     */
    protected $age;
    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    protected $illness;
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $height;
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $weight;
    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    protected $familyIllness;
    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    protected $medications;
    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    protected $surgicalProcedures;
    /**
     * @ORM\Column(type="string")
     */
    protected $query;
    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $answerType;
    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $paymentType;
    /**
     * @ORM\Column(type="datetime")
     */
    protected $createdAt;
    /**
     * @ORM\Column(type="datetime")
     */
    protected $modifiedAt;
    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $visible;

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
