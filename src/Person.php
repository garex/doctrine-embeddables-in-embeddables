<?php

class Person
{
    private $id;
    private $fullName;
    private $birthDate;

    public function __construct(FullName $fullName, DateTimeInterface $birthDate)
    {
        $this->fullName = $fullName;
        $this->birthDate = $birthDate;
    }
    
    public function __toString()
    {
        return sprintf('Person named %s, born at %s', $this->fullName, $this->birthDate->format('Y-m-d'));
    }
}