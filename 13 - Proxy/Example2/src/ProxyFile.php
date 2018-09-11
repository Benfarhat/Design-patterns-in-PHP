<?php

namespace App;


class ProxyFile implements File
{
    private $realFile, $fileName;

    public function __construct($fileName)
    {
        $this->fileName = $fileName;
    }

    public function display(): void
    {
        if ($this->realFile == null)
            $this->realFile = new RealFile($this->fileName);

        echo $this->realFile->display();
    }
}