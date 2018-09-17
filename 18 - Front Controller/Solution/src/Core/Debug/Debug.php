<?php

namespace App\Core\Debug;


class Debug 
{

    public static function log( $data ){
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
    }
    public static function dir( $data ){
        echo '<script>';
        echo 'console.dir('. json_encode( $data ) .')';
        echo '</script>';
    }

    public static function dump($args, $stop = false){
        $bt = debug_backtrace();
        $caller = array_shift($bt);
        $uniqid = uniqid();
        print '<style>div#id'.$uniqid.' pre{font-size:0.85em;display: flex; background-color: #333; color:#fff; padding: 8px; margin: 8px; border: none;margin-bottom:0;margin-top:0;;padding-bottom:2px;border-bottom:1px solid rgb(0, 128, 128);padding-left: 14px;}</style>'.PHP_EOL;
        print '<style>div#id'.$uniqid.' pre.content_debug{display: flex; background-color: #333; color:#fff; padding: 8px; margin: 8px; border: none; border-left: 6px solid rgb(0, 128, 128);margin-top:0;}</style>'.PHP_EOL;

        print '<div id="id' . $uniqid . '">';
        print '<pre>'.PHP_EOL;
        print  'Debug called in: <i>'. $caller['file'] . '</i> at line: <i>'. $caller['line'] . '</i>' .PHP_EOL;
        print '</pre><pre>'.PHP_EOL;
        print  'Type of debug element: <i>'. gettype($args) . '</i>' .PHP_EOL;  
        print '</pre>'.PHP_EOL;
        print '<pre class="content_debug">'.PHP_EOL;
        print_r($args);
        print '</pre>'.PHP_EOL;
        print '</div>';
        
        if($stop){
            die('Stopping execution...');
        }
    }
}