<?php

namespace VirtualniNemocnice\AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use VirtualniNemocnice\AppBundle\Entity\Patient;

class PatientRepository extends EntityRepository
{
    /**
     * @param Patient $patient
     * @return bool
     */
    public function storePatient(Patient $patient)
    {
        if ($patient) {
            $patient->setCreatedAt(new \DateTime());
            $patient->setModifiedAt(new \DateTime());

            $entityManager = $this->getEntityManager();
            $entityManager->persist($patient);
            $entityManager->flush();

            return true;
        }

        return false;
    }

    public function findAllPatientQuestines()
    {
        return $this->findAll();

    }

}