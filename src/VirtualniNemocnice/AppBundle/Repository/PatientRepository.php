<?php

namespace VirtualniNemocnice\AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use VirtualniNemocnice\AppBundle\Entity\Patient;

class PatientRepository extends EntityRepository
{


    /**
     * Find patient by email
     *
     * @param $email
     * @return null|object
     */
    public function getPatientByEmail($email)
    {
        /** @var Patient $patient */
        $patient = $this->findOneBy(['email'=> $email]);
        if ($patient) {
            return $patient;
        }

        return null;
    }

    /**
     * list of all active qu
     * @param Patient $patient
     * @return bool|Patient
     */
    public function storePatient($patient)
    {
        if ($patient) {
            $patient->setCreatedAt(new \DateTime());
            $patient->setModifiedAt(new \DateTime());

            $entityManager = $this->getEntityManager();
            $entityManager->persist($patient);
            $entityManager->flush();

            return $patient;
        }

        return false;
    }

    /**
     * list all questions
     * @return array
     */
    public function findAllPatientQuestions()
    {
        return $this->findAll();

    }
}