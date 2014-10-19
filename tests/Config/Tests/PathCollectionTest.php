<?php
namespace Sinergi\Config\Tests;

use Exception;
use PHPUnit_Framework_TestCase;
use Sinergi\Config\PathCollection;

class PathCollectionTest extends PHPUnit_Framework_TestCase
{
    public function testAdd()
    {
        $pathCollection = new PathCollection();
        $pathCollection->add(__DIR__ . "/__files");
        $this->assertEquals(__DIR__ . "/__files", $pathCollection->get(0));
    }

    /**
     * @expectedException \Exception
     */
    public function testAddBadPath()
    {
        $pathCollection = new PathCollection();
        $pathCollection->add("this/path/does/not/exists");
    }

    public function testRemoveAll()
    {
        $pathCollection = new PathCollection();
        $pathCollection->add(__DIR__ . "/__files");
        $pathCollection->add(__DIR__ . "/__files/config2");
        $pathCollection->removeAll();
        $this->assertCount(0, $pathCollection);
    }
}
