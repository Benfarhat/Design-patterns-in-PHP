<?php

require 'vendor/autoload.php';

$input = " This is a string of text that    SHOULD be filtered & handle 's properly.";

$htmlEntities = new Zend\Filter\HtmlEntities();
echo $htmlEntities->filter($input) . '<br>';

$strtolower  = new Zend\Filter\StringToLower;
echo $strtolower ->filter($input) . '<br>';

$UnderscoreToCamelCase = new Zend\Filter\Word\UnderscoreToCamelCase();
echo $UnderscoreToCamelCase->filter($input) . '<br>';
echo $strtolower ->filter($input) . '<br>';

$CamelCaseToUnderscore = new Zend\Filter\Word\CamelCaseToUnderscore();
echo $CamelCaseToUnderscore->filter($input) . '<br>';

$alphanumeric = new Zend\I18n\Filter\Alnum();
echo $alphanumeric->filter($input) . '<br>';

$alphanumeric = new Zend\I18n\Filter\Alnum(true);
echo $alphanumeric->filter($input) . '<br>';


// With Class Output
echo "<hr>";
include_once 'output.php';

$output = new Output(new Zend\Filter\HtmlEntities());
echo $output->display($input) . '<br>';

$output->setStrategy(new Zend\Filter\StringToLower);
echo $output->display($input) . '<br>';

$output->setStrategy(new Zend\Filter\Word\UnderscoreToCamelCase());
echo $output->display($input) . '<br>';

$output->setStrategy(new Zend\Filter\Word\CamelCaseToUnderscore());
echo $output->display($input) . '<br>';

$output->setStrategy(new Zend\I18n\Filter\Alnum());
echo $output->display($input) . '<br>';

$output->setStrategy(new Zend\I18n\Filter\Alnum(true));
echo $output->display($input);