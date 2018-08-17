<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

//ini_set("default_socket_timeout", 60);

class MiniStmtCardController extends Controller
{
    
    function nay(){
        return view('miniStmtCard.index');
    }
    function getCard(Request $request){
        $this->validate($request,[
            'CardNumber'=>'required',
        ]);
        $wsdl = storage_path('app/AccountMiniStatement_Concrete_gen1.wsdl');
        try{
            $options = [
                //'connection_timeout' => 60,
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
                    'StatementType'=>"Card",
                    'MaxNumberRows'=>100,
                    //'AccountNumber'=>$request->CardNumber,
                    'AccountNumber'=>'',
                    //'StartDate'=>"2016-08-01+03:00",
                    'StartDate'=>"2013-09-01+03:00",
                    //'EndDate'=> Carbon::now()->format('Y-m-d\+H:i'),
                    'EndDate'=> "2013-09-24+03:00",
                    'CardNumber'=>$request->CardNumber,
                    //'CardNumber'=>4407815754292110,
                    //'PhoneNumber'=>'v',
                    'PhoneNumber'=>254723570798,
                    'AccountName'=>'v',
                    'Bank_C'=>'01',
                    'Group_C'=>'01'
                ]
            ];
            $result = $client->__soapCall('get',$params);
            //dd($result);
            if(isset($result->AccountDetails)){
            //    dd($result);
				return redirect()->back()->with('data',$result->AccountDetails);
            }else{
              //  dd($result);
            	return redirect()->back()->with('err', "We could not retrieve the statement for your account, please try again");
            }

    }
    catch(\SoapFault $fault){
    	//dd($fault);
           return redirect()->back()->with('err', $fault->getMessage());
        }
}
}
