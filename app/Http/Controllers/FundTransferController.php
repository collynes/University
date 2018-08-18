<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Alert;

class FundTransferController extends Controller
{
    
    public function fundTransfer(Request $request){
       $this->validate($request,[
           'source'=>'required',
           'destination' =>'required',
           'amount'=>'required'
       ]);
        $wsdl = storage_path('app/BS_FundsTransfer_1.wsdl');
        $req = file_get_contents(storage_path('app/request.xml'));
        try{
            $options = [
                "trace" => 1,
                "exception" => 1,
                "login" => "omni",
                "password" => "omni123"
            ];
            $client     = new \SoapClient($wsdl,$options); 
            $client->__setLocation(env('FT_ENDPOINT'));
            $now = Carbon::now()->format('Y-m-d\TH:i:s');
    
            $params = [
                    'FundsTransferRequest'=>[
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
                        'FundsTransferReqData'=>[
                            'OperationParameters'=>[
                                'ClientID'=>'9999',
                                'MessageType'=>'NORMAL',
                                'ChannelID'=>'0123456',
                                'UserID'=>'TEL2',
                                'TransactionDatetime'=>$now,
                                'ValueDate'=>$now,
                                'NoOfElements'=>2,
                                'ResultURL'=>'http://172.30.30.58:8006/CallBack',
                                'ExchangeRateDetails'=>[
                                    'FromCurrency'=>'KES',
                                    'ExchangeRate'=>'1',
                                    'ExchangeRateFlag'=>'M',
                                    'ToCurrency'=>'KES',
                                ],
                            ],
                            'TransactionItems'=>[
                                
                                'TransactionItem'=>[
                                    [
                                    'TransactionItemKey'=>'TEST003',
                                    'AccountNumber'=>$request->source,
                                    // 'AccountNumber'=>'01506000022800',
                                    'DebitCreditFlag'=>'D',
                                    'BaseEquivalent'=>10,
                                    'ExchangeRateFlag'=>'M',
                                    'SourceBranch'=>'00001000',
                                    'TransactionCode'=>'03',
                                    'FundsTransfer'=>[
                                        'ReferenceNumber'=>'XXXZZ111',
                                        'MessageType'=>'NORMAL',
                                        'TransactionDate'=>$now,
                                        'ValueDate'=>$now,
                                        'Narrative1'=>'TEST001-03-03',
                                        'Narrative2'=>'',
                                        'Posting'=>[
                                            'PayType'=>'',
                                            'TransactionReference'=>'TEST001-03-03',
                                            'DebitAccountID'=>'',
                                            // 'TransactionAmount'=>19,
                                            'TransactionAmount'=>$request->amount,
                                            'TransactionCurrency'=>'KES',
                                            'ExchangeRate'=>1,
                                            'CreditAccountID'=>'',
                                            'ChargeAccountID'=>'',
                                            'ChargeAmount'=>0,
                                            'ChargeCurrency'=>'',
                                            'FeeAccountID'=>'',
                                            'FeeAmount'=>0,
                                            'FeeCurrency'=>'',
                                        ]
                                    ]
                                ],
                                [
                                    'TransactionItemKey'=>'TEST003',
                                    'AccountNumber'=>$request->destination,
                                    // 'AccountNumber'=>'01506000022800',
                                    'DebitCreditFlag'=>'C',
                                    'BaseEquivalent'=>10,
                                    'ExchangeRateFlag'=>'M',
                                    'SourceBranch'=>'00001000',
                                    'TransactionCode'=>'03',
                                    'FundsTransfer'=>[
                                        'ReferenceNumber'=>'XXXZZ111',
                                        'MessageType'=>'NORMAL',
                                        'TransactionDate'=>$now,
                                        'ValueDate'=>$now,
                                        'Narrative1'=>'TEST001-03-03',
                                        'Narrative2'=>'',
                                        'Posting'=>[
                                            'PayType'=>'',
                                            'TransactionReference'=>'TEST001-03-03',
                                            'DebitAccountID'=>'',
                                            // 'TransactionAmount'=>19,
                                            'TransactionAmount'=>$request->amount,
                                            'TransactionCurrency'=>'KES',
                                            'ExchangeRate'=>1,
                                            'CreditAccountID'=>'',
                                            'ChargeAccountID'=>'',
                                            'ChargeAmount'=>0,
                                            'ChargeCurrency'=>'',
                                            'FeeAccountID'=>'',
                                            'FeeAmount'=>0,
                                            'FeeCurrency'=>'',
                                        ]
                                    ]
                                ],
                            ]],
                        ]
                    ]
            ];
            $result = $client->__soapCall('FundsTransfer',$params);
            // dd($client->__getLastRequest());
            if(!empty($result->ResponseHeader->StatusDescription) && $result->ResponseHeader->StatusDescription == 'Success'):
                return redirect()->back()->with('status', $result->ResponseHeader->StatusMessages->MessageDescription);
            else:
                return redirect()->back()->with('err', "We could not process your request, please try again");
            endif;
            return response()->json($result);
        }catch(\SoapFault $fault){
            return $fault;
        }
        
    }

    public function toArray($xml){
        $xml = simplexml_load_string($xml, "SimpleXMLElement", LIBXML_NOCDATA);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);

        return $array;
    }
}
