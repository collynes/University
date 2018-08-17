<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StartTimesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testStartTimesQueryWsdlExists(){
        $wsdl = storage_path('app/QueryAccounts1.0_gen1.wsdl');
        $this->assertTrue(file_exists($wsdl));
    }

    public function testStartTimesQueryEndPointConfigAvailable(){
        $endpoint = env('QUERY_ACCOUNT_NBW_ENDPOINT');
        $this->assertFalse(empty($endpoint));
    }
}
