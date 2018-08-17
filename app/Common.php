<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Common extends Model
{
    //
    function queryBill(Request $request){
        $this->validate($request,[
            'biller_code'=>'required',
            'account_number' =>'required'
        ]);
        $wsdl = storage_path('app/QueryAccounts1.0_gen1.wsdl');
        try{
            $options = [
                "trace" => 1,
                "exception" => 1,
                "login" => "omni",
                "password" => "omni123"
            ];
            $client     = new \SoapClient($wsdl,$options); 
            $client->__setLocation(env('QUERY_ACCOUNT_NBW_ENDPOINT'));
            $now = Carbon::now()->format('Y-m-d\TH:i:s');
            $params = [
                'RequestHeader'=>[
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
                ],
                'GetUtilityBillRequest'=>[
                    'GetUtilityBillReqData'=>[
                        'BillerCode'=>$request->biller_code,
                        'AccountNumber'=>$request->account_number
                    ]
                ]
            ];
            $result = $client->__soapCall('GetUtilityDetails',$params);
            if(!empty($result['parameters']->AccountName) && !empty($result['parameters']->AccountBalance)):
                return redirect()->back()->with('data',$result['parameters']);
            else:
                return redirect()->back()->with('err', "We could not retrieve the bill for your account, please try again");
            endif;
        }catch(\SoapFault $fault){
           return redirect()->back()->with('err', $fault->getMessage());
        }
    }
}
