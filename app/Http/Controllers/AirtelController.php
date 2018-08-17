<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class AirtelController extends Controller
{
    //
    function kyc(){
        return view('airtel.kyc');
    }
    function transfer(){
        return view('airtel.transfer');
    }

    function postKyc(Request $request){
        $this->validate($request,[
            'msisdn'=>'required',
        ]);
        $wsdl = storage_path('app/KYCRequest_gen1_1.wsdl');

        try{
            $options = [
                "trace" => 1,
                "exception" => 1,
                "login" => "omni",
                "password" => "omni123"
            ];
            $client     = new \SoapClient($wsdl,$options); 
            $client->__setLocation(env('AIRTEL_KYC_ENDPOINT'));
            $now = Carbon::now()->format('Y-m-d\TH:i:s');
            $headerBody = [
                    'CreationTimestamp'=>$now,
                    'CorrelationID'=>uniqid(),
                    'MessageID'=>uniqid()
            ];
            $header = new \SOAPHeader('urn://co-opbank.co.ke/CommonServices/Data/Message/MessageHeader', 'RequestHeader', $headerBody); 
            $client->__setSoapHeaders($header);   
            $params = [
                'KYCRequest'=>[
                        'MSISDN'=>$request->msisdn,
                        'Amount'=>'00',
                        'ProviderCode'=>'AM'
                ]
            ];

            $result = $client->__soapCall('send',$params);
            if(!empty($result->IDNumber) ):
                return redirect()->back()->with('data',$result);
            else:
                return redirect()->back()->with('err', "We could not retrieve the customer details for the phone number you've entered, please try again");
            endif;
        }catch(\SoapFault $fault){
           return redirect()->back()->with('err', $fault->getMessage());
        }
    }

    function postTransfer(Request $request){
        $this->validate($request,[
            'account_number'=>'required',
            'amount'=>'required'
        ]);
        $wsdl = storage_path('app/Account_AccountTransaction_postMobileTransfer_1.1_B2C-concrete_gen1_1.wsdl');

        try{
            $options = [
                "trace" => 1,
                "exception" => 1,
                "login" => "omni",
                "password" => "omni123"
            ];
            $client     = new \SoapClient($wsdl,$options); 
            $client->__setLocation(env('AIRTEL_TRANSFER_ENDPOINT'));
            $now = Carbon::now()->format('Y-m-d\TH:i:s');
            $headerBody = [
                    'CreationTimestamp'=>$now,
                    'CorrelationID'=>uniqid(),
                    'MessageID'=>uniqid()
            ];
            $header = new \SOAPHeader('urn://co-opbank.co.ke/CommonServices/Data/Message/MessageHeader', 'RequestHeader', $headerBody); 
            $client->__setSoapHeaders($header);   
            $params = [
                'DataInput'=>[
                        'postMobileTransferInput'=>[
                            'OperationParameters'=>[
                                'MobileOperator'=>'AM',
                                'ProviderName'=>'Airtel',
                                'ProviderBIN'=>'0',
                                'TraceNumber'=>'1234067'
                            ],
                            'Transaction'=>[
                                'TransactionId'=>'1234506',
                                'Reference'=>Carbon::now()->format('YmdHis'),
                                'TransactionDate'=>$now,
                                'PostingDate'=>$now,
                                'TransactionAmount'=>$request->amount,
                                'TransactionCurrency'=>'404',
                            ],
                            'Account'=>[
                                'AccountNumber'=>$request->account_number,
                                'AccountName'=>'Test'
                            ]
                        ]
                ]
            ];

            $result = $client->__soapCall('postMobileTransfer',$params);
            if(!empty($result->postMobileTransferOutput->OperationParameters->ExternalReference) ):
                return redirect()->back()->with('data',$result->postMobileTransferOutput->OperationParameters);
            else:
                return redirect()->back()->with('err', "We could not complete your request for the phone number and amount you entered, please verify and try again");
            endif;
        }catch(\SoapFault $fault){
           return redirect()->back()->with('err', $fault->getMessage());
        }
    }
}
