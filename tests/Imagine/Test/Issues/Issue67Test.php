<?php

namespace Imagine\Test\Issues;

use Imagine\Gd\Imagine;
use Imagine\Exception\RuntimeException;
use PHPUnit\Framework\TestCase;

class Issue67Test extends TestCase
{
    private function getImagine()
    {
        try {
            $imagine = new Imagine();
        } catch (RuntimeException $e) {
            $this->markTestSkipped($e->getMessage());
        }

        return $imagine;
    }

    /**
    * @expectedException Imagine\Exception\RuntimeException
    */
    public function testShouldThrowExceptionNotError()
    {
        $invalidPath = '/thispathdoesnotexist';
        $this->expectException(\Imagine\Exception\RuntimeException::class);

        $imagine = $this->getImagine();

        $imagine->open('tests/Imagine/Fixtures/large.jpg')
            ->save($invalidPath . '/myfile.jpg');
    }
}
