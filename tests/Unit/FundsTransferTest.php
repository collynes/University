<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FundsTransferTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testFtWsdlExists(){
        $wsdl = storage_path('app/BS_FundsTransfer_1.wsdl');
        $this->assertTrue(file_exists($wsdl));
    }

    public function testFtEndPointConfigAvailable(){
        $endpoint = env('FT_ENDPOINT');
        $this->assertFalse(empty($endpoint));
    }
}
