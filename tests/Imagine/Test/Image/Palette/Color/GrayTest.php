<?php

/*
 * This file is part of the Imagine package.
 *
 * (c) Bulat Shakirzyanov <mallluhuct@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Imagine\Test\Image\Palette\Color;

use Imagine\Image\Palette\Color\Gray;
use Imagine\Image\Palette\Color\ColorInterface;
use Imagine\Image\Palette\Grayscale;

class GrayTest extends AbstractColorTest
{
    public static function provideOpaqueColors()
    {
        return array(
            array(new Gray(new Grayscale(), array(12), 100)),
            array(new Gray(new Grayscale(), array(0), 100)),
            array(new Gray(new Grayscale(), array(255), 100)),
        );
    }
    public static function provideNotOpaqueColors()
    {
        $getColor = (new self('getColor'))->getColor();
        return array(
            array($getColor),
            array(new Gray(new Grayscale(), array(12), 23)),
            array(new Gray(new Grayscale(), array(0), 45)),
            array(new Gray(new Grayscale(), array(255), 0)),
        );
    }

    public static function provideGrayscaleData()
    {
        $getColor = (new self('getColor'))->getColor();
        return array(
            array('#0c0c0c', $getColor),
        );
    }

    public static function provideColorAndAlphaTuples()
    {
        $getColor = (new self('getColor'))->getColor();
        return array(
            array(14, $getColor)
        );
    }

    protected function getColor()
    {
        return new Gray(new Grayscale(), array(12), 14);
    }

    public static function provideColorAndValueComponents()
    {
        $getColor = (new self('getColor'))->getColor();
        return array(
            array(array(
                ColorInterface::COLOR_GRAY => 12,
            ), $getColor),
        );
    }
}
