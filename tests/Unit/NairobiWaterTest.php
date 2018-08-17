<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NairobiWaterTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testNWCQueryWsdlExists(){
        $wsdl = storage_path('app/Coop-Utility-Equiry1.0_gen2.wsdl');
        $this->assertTrue(file_exists($wsdl));
    }

    public function testNWCQueryEndPointConfigAvailable(){
        $endpoint = env('QUERY_ACCOUNT_NBW_ENDPOINT');
        $this->assertFalse(empty($endpoint));
    }
    public function testNWCPayBillWsdlExists(){
        $wsdl = storage_path('app/CoopUtilityPayment_gen2_1.wsdl');
        $this->assertTrue(file_exists($wsdl));
    }

    public function testNWCPayBillEndPointConfigAvailable(){
        $endpoint = env('PAYBILL_NBW_ENDPOINT');
        $this->assertFalse(empty($endpoint));
    }
}
