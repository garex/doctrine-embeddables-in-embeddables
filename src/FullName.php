<?php

class FullName
{
    private $first;
    private $middle;
    private $last;
    
    public function __construct(Name $first, Name $middle,  Name $last)
    {
        $this->first = $first;
        $this->middle = $middle;
        $this->last = $last;
    }

    public function __toString()
    {
        return sprintf('%s %s %s', $this->first, $this->middle, $this->last);
    }
}