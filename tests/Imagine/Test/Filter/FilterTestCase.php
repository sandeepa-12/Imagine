<?php

/*
 * This file is part of the Imagine package.
 *
 * (c) Bulat Shakirzyanov <mallluhuct@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Imagine\Test\Filter;

use PHPUnit\Framework\TestCase;

abstract class FilterTestCase extends TestCase
{
    protected function getMock(string $className)
    {
        return $this->createMock($className);
    }

    protected function getImage()
    {
        return $this->getMock('Imagine\\Image\\ImageInterface');
    }

    protected function getImagine()
    {
        return $this->getMock('Imagine\\Image\\ImagineInterface');
    }

    protected function getDrawer()
    {
        return $this->getMock('Imagine\\Draw\\DrawerInterface');
    }

    protected function getPalette()
    {
        return $this->getMock('Imagine\\Image\\Palette\\PaletteInterface');
    }

    protected function getColor()
    {
        return $this->getMock('Imagine\\Image\\Palette\\Color\\ColorInterface');
    }
}
