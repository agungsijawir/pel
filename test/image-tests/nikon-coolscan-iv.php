<?php

/*
 * PEL: PHP Exif Library. A library with support for reading and
 * writing all Exif headers in JPEG and TIFF images using PHP.
 *
 * Copyright (C) 2005, 2006 Martin Geisler.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program in the file COPYING; if not, write to the
 * Free Software Foundation, Inc., 51 Franklin St, Fifth Floor,
 * Boston, MA 02110-1301 USA
 */

/* Autogenerated by the make-image-test.php script */
set_include_path(dirname(__FILE__) . "/../../src/" . PATH_SEPARATOR . get_include_path());

if (realpath($_SERVER["PHP_SELF"]) == __FILE__) {
    require_once "simpletest/autorun.php";
}

class nikon_coolscan_iv extends UnitTestCase
{

    public function __construct()
    {
        require_once (dirname(__FILE__) . '/../../src/PelJpeg.php');
        parent::__construct('PEL nikon-coolscan-iv.jpg Tests');
    }

    public function testRead()
    {
        Pel::clearExceptions();
        Pel::setStrictParsing(false);
        $jpeg = new PelJpeg(dirname(__FILE__) . '/nikon-coolscan-iv.jpg');

        $exif = $jpeg->getExif();
        $this->assertIsA($exif, 'PelExif');

        $tiff = $exif->getTiff();
        $this->assertIsA($tiff, 'PelTiff');

        /* The first IFD. */
        $ifd0 = $tiff->getIfd();
        $this->assertIsA($ifd0, 'PelIfd');

        /* Start of IDF $ifd0. */
        $this->assertEqual(count($ifd0->getEntries()), 6);

        $entry = $ifd0->getEntry(271); // Make
        $this->assertIsA($entry, 'PelEntryAscii');
        $this->assertEqual($entry->getValue(), 'Nikon');
        $this->assertEqual($entry->getText(), 'Nikon');

        $entry = $ifd0->getEntry(282); // XResolution
        $this->assertIsA($entry, 'PelEntryRational');
        $this->assertEqual($entry->getValue(), array(
            0 => 2000,
            1 => 1
        ));
        $this->assertEqual($entry->getText(), '2000/1');

        $entry = $ifd0->getEntry(283); // YResolution
        $this->assertIsA($entry, 'PelEntryRational');
        $this->assertEqual($entry->getValue(), array(
            0 => 2000,
            1 => 1
        ));
        $this->assertEqual($entry->getText(), '2000/1');

        $entry = $ifd0->getEntry(296); // ResolutionUnit
        $this->assertIsA($entry, 'PelEntryShort');
        $this->assertEqual($entry->getValue(), 2);
        $this->assertEqual($entry->getText(), 'Inch');

        $entry = $ifd0->getEntry(306); // DateTime
        $this->assertIsA($entry, 'PelEntryTime');
        $this->assertEqual($entry->getValue(), 1090023875);
        $this->assertEqual($entry->getText(), '2004:07:17 00:24:35');

        $entry = $ifd0->getEntry(531); // YCbCrPositioning
        $this->assertIsA($entry, 'PelEntryShort');
        $this->assertEqual($entry->getValue(), 1);
        $this->assertEqual($entry->getText(), 'centered');

        /* Sub IFDs of $ifd0. */
        $this->assertEqual(count($ifd0->getSubIfds()), 2);
        $ifd0_0 = $ifd0->getSubIfd(2); // IFD Exif
        $this->assertIsA($ifd0_0, 'PelIfd');

        /* Start of IDF $ifd0_0. */
        $this->assertEqual(count($ifd0_0->getEntries()), 7);

        $entry = $ifd0_0->getEntry(36864); // ExifVersion
        $this->assertIsA($entry, 'PelEntryVersion');
        $this->assertEqual($entry->getValue(), 2.1);
        $this->assertEqual($entry->getText(), 'Exif Version 2.1');

        $entry = $ifd0_0->getEntry(37121); // ComponentsConfiguration
        $this->assertIsA($entry, 'PelEntryUndefined');
        $this->assertEqual($entry->getValue(), "\x01\x02\x03\0");
        $this->assertEqual($entry->getText(), 'Y Cb Cr -');

        $entry = $ifd0_0->getEntry(37500); // MakerNote
        $this->assertIsA($entry, 'PelEntryUndefined');
        $expected = "\x02\0\x01\0\x07\0\x04\0\0\0\x30\x31\x30\x30\x10\x0e\x04\0\x01\0\0\0\x16\x01\0\0\0\0\0\0\x05\0";
        $this->assertEqual($entry->getValue(), $expected);
        $this->assertEqual($entry->getText(), '32 bytes unknown MakerNote data');

        $entry = $ifd0_0->getEntry(40960); // FlashPixVersion
        $this->assertIsA($entry, 'PelEntryVersion');
        $this->assertEqual($entry->getValue(), 1);
        $this->assertEqual($entry->getText(), 'FlashPix Version 1.0');

        $entry = $ifd0_0->getEntry(40961); // ColorSpace
        $this->assertIsA($entry, 'PelEntryShort');
        $this->assertEqual($entry->getValue(), 1);
        $this->assertEqual($entry->getText(), 'sRGB');

        $entry = $ifd0_0->getEntry(40962); // PixelXDimension
        $this->assertIsA($entry, 'PelEntryLong');
        $this->assertEqual($entry->getValue(), 960);
        $this->assertEqual($entry->getText(), '960');

        $entry = $ifd0_0->getEntry(40963); // PixelYDimension
        $this->assertIsA($entry, 'PelEntryLong');
        $this->assertEqual($entry->getValue(), 755);
        $this->assertEqual($entry->getText(), '755');

        /* Sub IFDs of $ifd0_0. */
        $this->assertEqual(count($ifd0_0->getSubIfds()), 0);

        $this->assertEqual($ifd0_0->getThumbnailData(), '');

        /* Next IFD. */
        $ifd0_1 = $ifd0_0->getNextIfd();
        $this->assertNull($ifd0_1);
        /* End of IFD $ifd0_0. */
        $ifd0_1 = $ifd0->getSubIfd(3); // IFD GPS
        $this->assertIsA($ifd0_1, 'PelIfd');

        /* Start of IDF $ifd0_1. */
        $this->assertEqual(count($ifd0_1->getEntries()), 0);

        /* Sub IFDs of $ifd0_1. */
        $this->assertEqual(count($ifd0_1->getSubIfds()), 0);

        $this->assertEqual($ifd0_1->getThumbnailData(), '');

        /* Next IFD. */
        $ifd0_2 = $ifd0_1->getNextIfd();
        $this->assertNull($ifd0_2);
        /* End of IFD $ifd0_1. */

        $this->assertEqual($ifd0->getThumbnailData(), '');

        /* Next IFD. */
        $ifd1 = $ifd0->getNextIfd();
        $this->assertNull($ifd1);
        /* End of IFD $ifd0. */

        $this->assertTrue(count(Pel::getExceptions()) == 0);
    }
}
