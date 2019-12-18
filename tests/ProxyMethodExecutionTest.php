<?php

namespace Endeavors\Repository\Tests;

use PHPUnit\Framework\TestCase;
use Endeavors\Repository\Tests\Mocks\RobotsRepository;

class ProxyMethodExecutionTest extends TestCase
{
     /**
      * @test
      */
     public function callsStartsWith()
     {
         $robots = new RobotsRepository();

         $robots->startsWith('foo', 'bar');
     }
}
