<?php

namespace App\Core\View;

use App\Core\Iface\ViewInterface,
    App\Core\Iface\ResponseInterface;

class View implements ViewInterface
{
    
    protected $values = array();
    
    protected $template;
    
    public function render()
    {
        $output = file_get_contents($this->template);
        foreach ($this->values as $name => $value) {
            //$$name = $value;
            $patterns = '/{{\s*'.$value.'\s*}}/';
            $output = preg_replace($patterns, $name, $output);
        }
        echo $output;
    }

    public function pass($value, $content = null)
    {
        if (is_array($value)) {
            if(!empty($value)){
                array_walk($value, array($this, 'pass'));
            } else {
                return $this;
            } 
        } else {
            $this->values[$value] = $content;
        }
        
        return $this;
    }
    
    public function setTemplate($template)
    {
        $this->template = $template;
        return $this;
    }
}