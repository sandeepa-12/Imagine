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

use Imagine\Filter\Advanced\Grayscale;
use Imagine\Image\Box;
use Imagine\Image\BoxInterface;
use Imagine\Test\Filter\FilterTestCase;
use Imagine\Image\Palette\Color\ColorInterface;

class GrayscaleTest extends FilterTestCase
{
    /**
     * @covers \Imagine\Filter\Advanced\Grayscale::apply
     *
     * @dataProvider getDataSet
     *
     * @param BoxInterface   $size
     * @param ColorInterface $color
     * @param ColorInterface $filteredColor
     */
    public function testGrayscaling(BoxInterface $size, ColorInterface $color, ColorInterface $filteredColor)
    {
        $image       = $this->getImage();
        $imageWidth  = $size->getWidth();
        $imageHeight = $size->getHeight();

        $size = $this->createMock('Imagine\\Image\\BoxInterface');
        $size->expects($this->once())
             ->method('getWidth')
             ->willReturn($imageWidth);

        $size->expects($this->once())
             ->method('getHeight')
             ->willReturn($imageHeight);

        $image->expects($this->any())
            ->method('getSize')
            ->willReturn($size);

        $image->expects($this->exactly($imageWidth*$imageHeight))
            ->method('getColorAt')
            ->willReturn($color);

        $color->expects($this->any())
            ->method('grayscale')
            ->willReturn($filteredColor);

        $draw = $this->getDrawer();
        $draw->expects($this->exactly($imageWidth*$imageHeight))
            ->method('dot')
            ->with($this->isInstanceOf('Imagine\\Image\\Point'), $this->equalTo($filteredColor));

        $image->expects($this->exactly($imageWidth*$imageHeight))
              ->method('draw')
              ->willReturn($draw);

        $filter = new Grayscale();
        $this->assertSame($image, $filter->apply($image));
    }

    /**
     * Data provider for testShouldCanvasImageAndReturnResult
     *
     * @return array
     */
    public static function getDataSet()
    {
        $getColor = (new self('getColor'))->getColor();
        return array(
            array(new Box(20, 10), $getColor , $getColor),
            array(new Box(10, 15), $getColor , $getColor),
            array(new Box(12, 23), $getColor , $getColor),
        );
    }
}
