<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
//syarat untuk php dpt terkoneksi dengan DBMS (database management system) MySQL
//1. adanya nama host/server = localhost
//2. adanya username db = root (default)
//3. adanya password db = kosong
//4. adanya nama db = db_sewakamera

//membuat koneksi ke dbms mysql
$koneksi = new mysqli("localhost","root","","egopro");
if(!$koneksi) {
    echo "Koneksi gagal";
} else {
//echo "Koneksi Berhasil";
}

function addToMidtrans($total,$invoice){
    try{

        $body['transaction_details'] = [
            "order_id" => $invoice,
            "gross_amount" => $total
          ];
        
          $body['credit_card'] = [
            "secure"=> true
          ];
        
          $body['enabled_payments'] = ["permata_va", "bca_va", "bni_va", "other_va",];
    
          $client = new GuzzleHttp\Client();
    
            $res = $client->request('POST', 'https://app.sandbox.midtrans.com/snap/v1/transactions', [
                'auth' => ['SB-Mid-server-444cu0iEaJpEXi2bVyspf2Q7', ''],
                'json' => $body,
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ]
            ]);
    
        $snapToken = json_decode($res->getBody(),true)['token'];
    }catch(GuzzleHttp\Exception\ClientException $e){
    
        // echo $e->getMessage() . "\n";
        // echo $e->getRequest()->getMethod();
        $snapToken = null;
    }
    
    return $snapToken;
}

function checkStatus($trxid){
    $client = new GuzzleHttp\Client();

    try{
        $res = $client->request('GET', 'https://api.sandbox.midtrans.com/v2/'.$trxid.'/status', [
            'auth' => ['SB-Mid-server-444cu0iEaJpEXi2bVyspf2Q7', ''],
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ]
        ]);

        return json_decode($res->getBody(),true);
    }catch(GuzzleHttp\Exception\ClientException $e){

    }
}
?>