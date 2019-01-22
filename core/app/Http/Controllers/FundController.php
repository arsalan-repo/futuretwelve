<?php

namespace App\Http\Controllers;

use App\Method;
use App\Withdraw;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Logo;
use App\SocialIcon;
use App\Contact;
use App\Partner;
use App\SubCategory;
use App\AboutUs;
use App\Title;
use App\Footer;

use App\User;
use App\Payment;
use App\Balance;



class FundController extends Controller
{


    public function getFund()
    {



$userid = Auth::guard('user')->user()->id;
$dt = date("YmdH");
$payid = "$dt$userid";



        $data = [];
        $data['logo'] = Logo::first();
        $data['social'] = SocialIcon::first();
        $data['contact'] = Contact::first();
        $data['sponsor'] = Partner::all();
        $data['exam_category'] = SubCategory::orderBy('id', 'DESC')->get();
        $data['about'] = AboutUs::first();
        $data['title'] = Title::first();
        $data['footer'] = Footer::first();
        $data['category'] = SubCategory::all();
        $data['payment'] = Payment::first();
        $data['site_title'] = Title::first();
        $data['add_bal'] = Balance::where('usid', $userid)->get();






        $data['userid'] = $userid;
        $data['payid'] = $payid;
        $data['method'] = Method::all();
        $data['withdraw'] = Withdraw::whereUser_id(Auth::guard('user')->user()->id)->orderBy('id','DESC')->get();




        return view('fund.add',$data);
    }















    public function paypal()
    {


$pp =  Payment::first();

//Getting records from Paypal IPN
	$payment_type		=	$_POST['payment_type'];
	$payment_date		=	$_POST['payment_date'];
	$payment_status		=	$_POST['payment_status'];
	$address_status		=	$_POST['address_status'];
	$payer_status		=	$_POST['payer_status'];
	$first_name			=	$_POST['first_name'];
	$last_name			=	$_POST['last_name'];
	$payer_email		=	$_POST['payer_email'];
	$payer_id			=	$_POST['payer_id'];
	$address_country	=	$_POST['address_country'];
	$address_country_code	=	$_POST['address_country_code'];
	$address_zip		=	$_POST['address_zip'];
	$address_state		=	$_POST['address_state'];
	$address_city		=	$_POST['address_city'];
	$address_street		=	$_POST['address_street'];
	$business			=	$_POST['business'];
	$receiver_email		=	$_POST['receiver_email'];
	$receiver_id		=	$_POST['receiver_id'];
	$residence_country	=	$_POST['residence_country'];
	$item_name			=	$_POST['item_name'];
	$item_number		=	$_POST['item_number'];
	$quantity			=	$_POST['quantity'];
	$shipping			=	$_POST['shipping'];
	$tax				=	$_POST['tax'];
	$mc_currency		=	$_POST['mc_currency'];
	$mc_fee				=	$_POST['mc_fee'];
	$mc_gross			=	$_POST['mc_gross'];
	$mc_gross_1			=	$_POST['mc_gross_1'];
	$txn_id				=	$_POST['txn_id'];
	$notify_version		=	$_POST['notify_version'];
	$custom				=	$_POST['custom'];





if($payer_status=="verified" && $payment_status=="Completed" && $receiver_email=="$pp->email" && $mc_currency=="USD" ){

$amo = $mc_gross-$mc_fee;
$paidid = $custom;

$us = User::where('id', '=', $paidid)->first();
$will = $us->balance+$amo;


//---------------->>>>>>>>ADD THE BALANCE

                DB::table('users')
                    ->where('id', $paidid)
                    ->update(['balance' => $will]);

//---------------->>>>>>>>ADD THE BALANCE>>TRX


        $Bal['usid'] = $paidid;
        $Bal['trx'] = $txn_id;
        $Bal['tm'] = time();
        $Bal['amount'] = $amo;
        $Bal['method'] = "PayPal";


        //Balance::create($Bal);




}



    
            return redirect()->back();


}





    public function pm()
    {


$pp =  Payment::first();

$passphrase=strtoupper(md5($pp->code));
define('ALTERNATE_PHRASE_HASH',  $passphrase);
define('PATH_TO_LOG',  '/somewhere/out/of/document_root/');
$string=
      $_POST['PAYMENT_ID'].':'.$_POST['PAYEE_ACCOUNT'].':'.
      $_POST['PAYMENT_AMOUNT'].':'.$_POST['PAYMENT_UNITS'].':'.
      $_POST['PAYMENT_BATCH_NUM'].':'.
      $_POST['PAYER_ACCOUNT'].':'.ALTERNATE_PHRASE_HASH.':'.
      $_POST['TIMESTAMPGMT'];

$hash=strtoupper(md5($string));
$hash2 = $_POST['V2_HASH'];

if($hash==$hash2){

$payid = $_POST['PAYMENT_ID'];
$paidid =  substr($payid, 10);
$amo = $_POST['PAYMENT_AMOUNT'];
$unit = $_POST['PAYMENT_UNITS'];

if($unit=="USD"){

$us = User::where('id', '=', $paidid)->first();
$will = $us->balance+$amo;


//---------------->>>>>>>>ADD THE BALANCE

                DB::table('users')
                    ->where('id', $paidid)
                    ->update(['balance' => $will]);



        $Bal['usid'] = $paidid;
        $Bal['trx'] = $payid;
        $Bal['tm'] = time();
        $Bal['amount'] = $amo;
        $Bal['method'] = "PerfectMoney";


        //Balance::create($Bal);


//---------------->>>>>>>>ADD THE BALANCE>>TRX

}
}



    
            return redirect()->back();


}















}
