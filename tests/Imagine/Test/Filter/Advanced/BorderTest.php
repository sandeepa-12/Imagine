<?php

/*
 * This file is part of the Imagine package.
 *
 * (c) Bulat Shakirzyanov <mallluhuct@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Imagine\Test\Filter\Advanced;

use Imagine\Filter\Advanced\Border;
use Imagine\Test\Filter\FilterTestCase;

class BorderTest extends FilterTestCase
{
    public function testBorderImage()
    {
        $color       = $this->createMock('Imagine\\Image\\Palette\\Color\\ColorInterface');
        $width       = 2;
        $height      = 4;
        $image       = $this->getImage();
        $imageWidth  = 200;
        $imageHeight = 100;

        $size = $this->createMock('Imagine\\Image\\BoxInterface');
        $size->expects($this->once())
             ->method('getWidth')
             ->willReturn($width);

        $size->expects($this->once())
             ->method('getHeight')
             ->willReturn($height);

        $draw = $this->getDrawer();
        $draw->expects($this->exactly(4))
             ->method('line')
             ->willReturn($draw);

        $image->expects($this->once())
              ->method('getSize')
              ->willReturn($size);

        $image->expects($this->once())
              ->method('draw')
              ->willReturn($draw);

        $filter = new Border($color, $width, $height);

        $this->assertSame($image, $filter->apply($image));
    }
}
