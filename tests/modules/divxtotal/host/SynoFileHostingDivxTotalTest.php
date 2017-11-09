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

namespace tests\modules\divxtotal\host;

use modules\divxtotal\host\SynoFileHostingDivxTotal;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2014-06-08 at 02:27:12.
 */
class SynoFileHostingDivxTotalTest extends \utils\BaseHostTest
{
    protected function setUp()
    {
        parent::setObject(
            new SynoFileHostingDivxTotal(
                "http://www.divxtotal.com/musica/torrent/44391/va-verano-latino-total-2014/"
            )
        );
    }

    /**
     * @covers modules\divxtotal\host\SynoFileHostingDivxTotal::GetDownloadInfo
     */
    public function testGetDownloadInfo()
    {
        parent::getDownloadInfo();
    }

    /**
     * @covers modules\divxtotal\host\SynoFileHostingDivxTotal::__construct
     */
    public function testLoadInfo()
    {
        parent::loadInfoTest();
    }
}
