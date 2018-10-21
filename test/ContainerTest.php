<?php

if (file_exists('PHPUnit/Autoload.php'))
    require_once('PHPUnit/Autoload.php');

// backward compatibility
if (!class_exists('\PHPUnit\Framework\TestCase') &&
    class_exists('\PHPUnit_Framework_TestCase')) {
    class_alias('\PHPUnit_Framework_TestCase', '\PHPUnit\Framework\TestCase');
}

class ContainerTest extends \PHPUnit\Framework\TestCase
{
    public function testContainer() {
        $data = [
            'message' => 'Hello World',
            'getMessage' => function($container) {
                return $container->message;
            }
        ];

        $test = new \Saddle\Container($data);
        
        $this->assertEquals($test->message, 'Hello World');
        
        $this->assertEquals($test->getMessage, 'Hello World');
    }
}
