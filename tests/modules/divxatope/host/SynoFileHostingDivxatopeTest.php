<?php

/*
    This file is part of SynDsEsTorrent.

    SynDsEsTorrent is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    SynDsEsTorrent is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with SynDsEsTorrent.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace tests\modules\divxatope\host;

use modules\divxatope\host\SynoFileHostingDivxatope;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2014-06-08 at 02:27:12.
 */
class SynoFileHostingDivxatopeTest extends \utils\BaseHostTest
{
    protected function setUp()
    {
        parent::setObject(
            new SynoFileHostingDivxatope(
                "http://www.divxatope.com/descargar_torrent_374181-id_malefica_bluray_rip_ac3_5.1_espanol_castellano"
                . "_2014.html"
            )
        );
    }

    /**
     * @covers modules\divxatope\host\SynoFileHostingDivxatope::GetDownloadInfo
     */
    public function testGetDownloadInfo()
    {
        parent::getDownloadInfo();
    }

    /**
     * @covers modules\divxatope\host\SynoFileHostingDivxatope::__construct
     */
    public function testLoadInfo()
    {
        parent::loadInfoTest();
    }
}
