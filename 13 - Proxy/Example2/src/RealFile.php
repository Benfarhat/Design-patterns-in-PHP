<?php

namespace App;

use App\File;

class RealFile implements File
{
    private $fileName, $content;

    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;

        $this->load($fileName);
    }

    public function load(string $fileName): void
    {
        echo "Loading '$fileName'..." . '<br>';

        $openedFile = fopen($fileName, "r");
 
        $this->content = fread($openedFile, filesize($this->fileName));
    }

    public function display(): void
    {
        echo $this->content;
    }
}