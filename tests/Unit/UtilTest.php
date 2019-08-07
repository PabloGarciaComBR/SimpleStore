<?php

namespace Tests\Unit;

use Tests\TestCase;
use SimpleStore\Services\UtilService;

class UtilTest extends TestCase
{
    /**
     *
     */
    public function testFormatToComponentSelect()
    {
        $array = [
            0 => 'opt0',
            1 => 'opt1',
            5 => 'opt5'
        ];

        $res = UtilService::formatArrayToSelectReact($array);

        $this->assertNotEmpty($res);
        $this->assertCount(3, $res);
        $this->assertArrayHasKey('value', $res[0]);
        $this->assertArrayHasKey('label', $res[2]);
    }
}
