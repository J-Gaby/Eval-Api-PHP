<?php
declare(strict_types=1);

namespace Tests\Domain\jobdating;

use App\Domain\User\jobdating;
use Tests\TestCase;

class jobdating extends TestCase
{
    public function jobdatingProvider()
    {
        return [
            [1, '8h00', 'p01', 'Bill'],
            [2, '10h00', 'p03', 'Steve'],
            [3, '12h00', 'p02', 'Mark'],
            [4, '15h00', 'p04', 'Evan'],
            [5, '17h00', 'p05', 'Jack'],
        ];
    }

    /**
     * @dataProvider jobdatingProvider
     * @param $id
     * @param $time
     * @param $place
     * @param $name
     */
    public function testGetters($id, $time, $place, $name)
    {
        $jobdating = new jobdating($id, $time, $place, $name);

        $this->assertEquals($id, $jobdating->getId());
        $this->assertEquals($time, $jobdating->gettime());
        $this->assertEquals($place, $jobdating->getplace());
        $this->assertEquals($name, $jobdating->getname());
    }

    /**
     * @dataProvider jobdatingProvider
     * @param $id
     * @param $time
     * @param $place
     * @param $name
     */
    public function testJsonSerialize($id, $time, $place, $name)
    {
        $jobdating = new jobdating($id, $time, $place, $name);

        $expectedPayload = json_encode([
            'id' => $id,
            'time' => $time,
            'place' => $place,
            'name' => $name,
        ]);

        $this->assertEquals($expectedPayload, json_encode($jobdating));
    }
}