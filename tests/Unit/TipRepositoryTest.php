<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Infrastructure\TipRepository;
use App\TipModel;
use App\Core\Tip;

class TipRepositoryTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetTipsList()
    {
        $returnedFromModel[0] = new TipModel;
        $returnedFromModel[0]->id = 1;
        $returnedFromModel[0]->guid = 999;
        $returnedFromModel[0]->title = 'Hello';
        $returnedFromModel[0]->description = 'salam';

        $assertTips[0] = new Tip();
        $assertTips[0]->id = 1;
        $assertTips[0]->guid = 999;
        $assertTips[0]->title = 'Hello';
        $assertTips[0]->description = 'salam';

        $mockMy = $this->getMockBuilder(TipRepository::class)
            ->disableOriginalConstructor()
            ->setMethods(['getAllTips'])
            ->getMock();

        $mockMy->expects($this->any())
            ->method('getAllTips')
            ->will($this->returnValue($returnedFromModel));

        $returnedFromRepository = $mockMy->getTipsList();
        $this->assertEquals($returnedFromRepository, $assertTips);
    }
}
