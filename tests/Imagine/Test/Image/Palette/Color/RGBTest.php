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

use Imagine\Image\Palette\Color\RGB;
use Imagine\Image\Palette\Color\ColorInterface;
use Imagine\Image\Palette\RGB as RGBPalette;

class RGBTest extends AbstractColorTest
{
    public static function provideOpaqueColors()
    {
        return array(
            array(new RGB(new RGBPalette(), array(12, 123, 245), 100)),
            array(new RGB(new RGBPalette(), array(0, 0, 0), 100)),
            array(new RGB(new RGBPalette(), array(255, 255, 255), 100)),
        );
    }
    public static function provideNotOpaqueColors()
    {
        $getColor = (new self('getColor'))->getColor();
        return array(
            array($getColor),
            array(new RGB(new RGBPalette(), array(12, 123, 245), 23)),
            array(new RGB(new RGBPalette(), array(0, 0, 0), 45)),
            array(new RGB(new RGBPalette(), array(255, 255, 255), 0)),
        );
    }

    public static function provideGrayscaleData()
    {
        $getColor = (new self('getColor'))->getColor();
        return array(
            array('#686868', $getColor),
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
        return new RGB(new RGBPalette(), array(12, 123, 245), 14);
    }

    public static function provideColorAndValueComponents()
    {
        $getColor = (new self('getColor'))->getColor();
        return array(
            array(array(
                ColorInterface::COLOR_RED => 12,
                ColorInterface::COLOR_GREEN => 123,
                ColorInterface::COLOR_BLUE => 245,
            ), $getColor),
        );
    }
}
