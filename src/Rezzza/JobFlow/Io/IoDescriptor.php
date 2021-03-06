<?php

namespace Rezzza\JobFlow\Io;

class IoDescriptor implements \IteratorAggregate
{
    public $stdin;

    public $stdout;

    public $stderr;

    // Stock les options propres à la configuration et instantiation de l'etl 
    public $etlConfig;

    public function __construct($stdin, $stdout = null, $stderr = null)
    {
        $this->stdin = $stdin;
        $this->stdout = $stdout;
        $this->stderr = $stderr;
    }

    public function read()
    {
        return $this->stdin->read();
    }

    public function write()
    {
        return $this->stdout->write();
    }

    public function getIterator() 
    {
        return new \ArrayIterator($this);
    }
}