<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
class NairobiWaterController extends Controller
{
    //
    function qb(){
        $billers = [
            'NWC'=>'Nairobi Water',
            'STARTIMES'=>'Startimes',
            'KPLC'=>'KPLC'
        ];
        return view('bills.index',['billers'=>$billers]);
    }
    function queryBill(Request $request){
        $this->validate($request,[
            'biller_code'=>'required',
            'account_number' =>'required'
        ]);
        $wsdl = storage_path('app/Coop-Utility-Equiry1.0_gen2.wsdl');
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
            $headerBody = [
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
            ];
            $header = new \SOAPHeader('urn://co-opbank.co.ke/CommonServices/Data/Message/MessageHeader', 'RequestHeader', $headerBody); 
            $client->__setSoapHeaders($header);   
            $params = [
                'GetUtilityBillRequest'=>[
                    'GetUtilityBillReqData'=>[
                        'BillerCode'=>$request->biller_code,
                        'AccountNumber'=>$request->account_number
                    ]
                ]
            ];
            $result = $client->__soapCall('GetUtilityDetails',$params);
            if(!empty($result->AccountName) && !empty($result->AccountName)):
                return redirect()->back()->with('data',$result);
            else:
                return redirect()->back()->with('err', "We could not retrieve the bill for your account, please try again");
            endif;
        }catch(\SoapFault $fault){
           return redirect()->back()->with('err', $fault->getMessage());
        }
    }
    function pb(){
        return view('nairobi-water.pay');
    }
    function payBill(Request $request){
        $this->validate($request,[
            'biller_code'=>'required',
            'account_number' =>'required|numeric|min:1',
            'transaction_amount'=>'required|numeric|min:1'
        ]);
        $wsdl = storage_path('app/CoopUtilityPayment_gen2_1.wsdl');
        try{
            $options = [
                "trace" => 1,
                "exception" => 1,
                "login" => "omni",
                "password" => "omni123"
            ];
            $client     = new \SoapClient($wsdl,$options); 
            $client->__setLocation(env('PAYBILL_NBW_ENDPOINT'));
            $now = Carbon::now()->format('Y-m-d\TH:i:s');
            $headerBody = [
                'CreationTimestamp'=>$now,
                'CorrelationID'=>uniqid(),
                'FaultTO'=>uniqid(),
                'MessageID'=>uniqid(),
                'ReplyTO'=>uniqid(),
                'Credentials'=>[
                    'SystemCode'=>'',
                    'Username'=>'',
                    'Password'=>'',
                    'Realm'=>''
                ]
            ];
            $header = new \SOAPHeader('urn://co-opbank.co.ke/CommonServices/Data/Message/MessageHeader', 'RequestHeader', $headerBody); 
            $client->__setSoapHeaders($header); 
            $params = [
                'SendBillPaymentRequest'=>[
                        'BillerCode'=>$request->biller_code,
                        'AccountNumber'=>$request->account_number,
                        'ReferenceNo'=>uniqid(),
                        'Narration'=>'Nairobi Water Bill Payment',
                        'TransactionCurrency'=>'KSH',
                        'TransactionAmount'=>$request->transaction_amount,
                        'GenericFields'=>[
                            'GenericField'=>[
                                [
                                    'FieldName'=>'CASH_CHEQ_IND',
                                    'FieldValue'=>'Q'
                                ],
                                [
                                    'FieldName'=>'PARTY_INFO',
                                    'FieldValue'=>'Test Pay Bill'
                                ]
                            ]
                        ]
                ]
            ];

            $result = $client->__soapCall('PayBill',$params);
            if(!empty((array)$result)):
                return redirect()->back()->with('status', $result->StatusDescription);
            else:
                return redirect()->back()->with('err', "We could not complete your request, please try again");
            endif;
        }catch(\SoapFault $fault){
           return redirect()->back()->with('err', $fault->getMessage());
        }
    }
}
