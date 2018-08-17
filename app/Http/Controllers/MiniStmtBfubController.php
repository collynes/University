<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class MiniStmtBfubController extends Controller
{
    function nay(){
        return view('miniStmtBfub.index');
    }
    function getBfub(Request $request){
        $this->validate($request,[
            'AccountNumber'=>'required',
        ]);
        $wsdl = storage_path('app/AccountMiniStatement_Concrete_gen1.wsdl');
        try{
            $options = [
                "trace" => 1,
                "exception" => 1,
                "login" => "omni",
                "password" => "omni123"
            ];
            $client = new \SoapClient($wsdl,$options); 
            $client->__setLocation(env('STMT_BFUB_ENDPOINT'));
            $now = Carbon::now()->format('Y-m-d\TH:i:s');
			$headerBody = [
//			    'RequestHeader'=>[
			        'CreationTimestamp'=>$now,
			        'CorrelationID'=>uniqid(),
			        'MessageID'=>uniqid()
//			    ]
			];
			$header = new \SOAPHeader('urn://co-opbank.co.ke/CommonServices/Data/Message/MessageHeader', 'RequestHeader', $headerBody); 
			$client->__setSoapHeaders($header);           
            $params = [
                /*'RequestHeader'=>[
                    'CreationTimestamp'=>$now,
                    'CorrelationID'=>uniqid(),
                    'FaultTO'=>'',
                    'MessageID'=>uniqid(),
                    'ReplyTO'=>'',
                    'Credentials'=>[
                        'SystemCode'=>'008',
                        'Username'=>'',
                        'Password'=>'',
                        'Realm'=>''
                    ]
                ],*/
                'RequestBody'=>[
                    'StatementType'=>"Account",
                    'MaxNumberRows'=>100,
                    'AccountNumber'=>$request->AccountNumber,
                    'StartDate'=>"2016-08-01+03:00",
                    'EndDate'=> Carbon::now()->format('Y-m-d\+H:i'),
                    'CardNumber'=>'v',
                    'PhoneNumber'=>'v',
                    'AccountName'=>'v',
                    'Bank_C'=>'01',
                    'Group_C'=>'01'
                ]
            ];
            $result = $client->__soapCall('get',$params);
            //dd($result);
            if($result->AccountHeader->RowCount > 0){
				return redirect()->back()->with('data',$result->AccountDetails);
            }else{
            	return redirect()->back()->with('err', "We could not retrieve the statement for your account, please try again");
            }

    }
    catch(\SoapFault $fault){
    	//dd($fault);
           return redirect()->back()->with('err', $fault->getMessage());
        }
}
}
