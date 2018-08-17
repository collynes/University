<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AirtelTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAirtelKYCWsdlExists(){
        $wsdl = storage_path('app/KYCRequest_gen1_1.wsdl');
        $this->assertTrue(file_exists($wsdl));
    }

    public function testAirtelKYCEndPointConfigAvailable(){
        $endpoint = env('AIRTEL_KYC_ENDPOINT');
        $this->assertFalse(empty($endpoint));
    }

    public function testAirtelTransferWsdlExists(){
        $wsdl = storage_path('app/Account_AccountTransaction_postMobileTransfer_1.1_B2C-concrete_gen1_1.wsdl');
        $this->assertTrue(file_exists($wsdl));
    }

    public function testAirtelTransferEndPointConfigAvailable(){
        $endpoint = env('AIRTEL_TRANSFER_ENDPOINT');
        $this->assertFalse(empty($endpoint));
    }
}
