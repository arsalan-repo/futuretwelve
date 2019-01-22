<?php

namespace App\Http\Controllers;

use App\Answer;
use DB;

use App\Exam;
use App\Question;
use App\SubCategory;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Session;
use App\Contact;
use App\Logo;
use App\Partner;
use App\SocialIcon;
use Illuminate\Support\Facades\Auth;
use App\Title;
use App\Footer;

use App\Currency;
use App\User;

class ExamStartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }
    public function editProfile()
    {
        $logo = Logo::first();
        $social = SocialIcon::first();
        $contact = Contact::first();
        $title = Title::first();
        $footer = Footer::first();
        $sponsor = Partner::all();
        $exam_category = SubCategory::orderBy('id', 'ASC')->get();
        $user = User::findOrFail(Auth::guard('user')->user()->id);
        return view('user.edit-profile')
            ->withSocial($social)
            ->withContact($contact)
            ->withPartner($sponsor)
            ->withCategory($exam_category)
            ->withLogo($logo)
            ->withTitle($title)
            ->withFooter($footer)
            ->withUser($user);
    }
    public function updateProfile(Request $request)
    {
        $m = User::findOrFail(Auth::guard('user')->user()->id);
        $this->validate($request,[
           'name' => 'required',
           'email' => 'required|unique:users,email,'.$m->id,
           'phone' => 'required|unique:users,phone,'.$m->id,
            'username' => 'required|unique:users,username,'.$m->id,
            'country' => 'required'
        ]);
        $m->fill($request->all())->save();
        session()->flash('success','User Profile Update Successfully.');
        return redirect()->back();
    }

    public function changePassword()
    {
        $logo = Logo::first();
        $social = SocialIcon::first();
        $contact = Contact::first();
        $title = Title::first();
        $footer = Footer::first();
        $sponsor = Partner::all();
        $exam_category = SubCategory::orderBy('id', 'ASC')->get();
        $user = User::findOrFail(Auth::guard('user')->user()->id);
        return view('user.change-password')
            ->withSocial($social)
            ->withContact($contact)
            ->withPartner($sponsor)
            ->withCategory($exam_category)
            ->withLogo($logo)
            ->withTitle($title)
            ->withFooter($footer)
            ->withUser($user);
    }
    public function updatePassword(Request $request)
    {
        $this->validate($request,[
            'c_password' => 'required',
            'password' => 'required|confirmed|min:5'
        ]);

        try {
            $cc_password = Auth::guard('user')->user()->password;
            $c_id = Auth::guard('user')->user()->id;

            $user = User::findOrFail($c_id);

            if(Hash::check($request->c_password, $cc_password)){
                $password = Hash::make($request->password);
                $user->password = $password;
                $user->save();
                session()->flash('message', 'Password Changes Successfully.');
                Session::flash('type', 'success');
                Session::flash('title', 'Success');
                return redirect()->back();
            }else{
                session()->flash('message', 'Password Not Match');
                Session::flash('type', 'warning');
                Session::flash('title', 'Opps..!');
                return redirect()->back();
            }

        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'warning');
            return redirect()->back();
        }

    }

    public function getExamStart($id)
    {

        $logo = Logo::first();
        $social = SocialIcon::first();
        $contact = Contact::first();
        $sponsor = Partner::all();
        $exam_category = SubCategory::orderBy('id', 'ASC')->get();
        $singleexam = SubCategory::findOrFail($id);
        $catname = $singleexam->name;
        $title = Title::first();
        $footer = Footer::first();
        $curr = Currency::all();
        Session::put('exam_cat', $id);
        $question = Question::where('question_cat_name', '=', $catname)->get();
        $numQ = Question::where('question_cat_name', '=', $singleexam->id)->count();
        return view('examstart.examstart')->withSingleexam($singleexam)
            ->withSocial($social)
            ->withContact($contact)
            ->withPartner($sponsor)
            ->withCurrency($curr)
            ->withCategory($exam_category)
            ->withLogo($logo)
            ->withSingleexam($singleexam)
            ->withQuestion($question)
            ->withTitle($title)
            ->withFooter($footer)
            ->withNumq($numQ);
    }


    public function getExamConfirm($id)
    {
        $examDetails = SubCategory::findOrFail($id);
        $data = [];

        $data['singleexam'] = $examDetails;
        $data['id'] = $id;
        $data['social'] = SocialIcon::first();
        $data['contact'] = Contact::first();
        $data['logo'] = Logo::first();
        $data['title'] = Title::first();
        $data['category'] = SubCategory::orderBy('id', 'DESC')->get();
        $footer = Footer::first();
        $title = Title::first();
        $numQ = Question::where('question_cat_name', '=', $examDetails->id)->count();

        $okay = Exam::where('user_id', Auth::guard('user')->user()->id)->where('category_id', $id)->where('status', 1)->count();

        if ($okay != 0) {
            $data['message'] = "Sorry.. You Already Attend This Survey.";
            return view('examstart.skipexam',$data)->withTitle($title)
                ->withFooter($footer);
        }

        if($numQ == 0){
            $data['message'] = "Sorry..! This Category No Questions are Available Now.";
            return view('examstart.skipexam', $data)->withTitle($title)
                ->withFooter($footer);
        }
        else{
            $data['num_Q'] = $numQ;

            $balance = Auth::guard('user')->user()->balance;


            $data['message'] = "If You Complete This Survey $examDetails->price USD Added your Account. Current Balance is $balance USD";

            $data['minfo'] = "Please Do Not Refresh The Page. YOUR SURVEY WILL START IN

          <b id=\"note\">10 SECONDS</b>
          


     

          ";

        }


        return view('examstart.examconfirm', $data)->withTitle($title)
            ->withFooter($footer);

    }

    public function LestStartExam($id)
    {

        $examDetails = SubCategory::findOrFail($id);
        $data = [];

        $data['singleexam'] = $examDetails;
        $data['social'] = SocialIcon::first();
        $data['contact'] = Contact::first();
        $data['logo'] = Logo::first();
        $data['title'] = Title::first();
        $data['footer'] = Footer::first();
        $data['category'] = SubCategory::orderBy('id', 'DESC')->get();
        $data['num_Q'] = Question::where('question_cat_name', '=', $examDetails->id)->count();

        $data['question'] = Question::where('question_cat_name', '=', $examDetails->id)->get();


        $okay = Exam::where('user_id', Auth::guard('user')->user()->id)->where('category_id', $id)->where('status', 1)->count();


        if ($okay != 0) {
            $data['message'] = "Sorry.. You Already Attend This Survey.";
            return view('examstart.skipexam',$data);
        } else {
            $data['question'] = Question::where('question_cat_name', '=', $examDetails->id)->get();
        }

        $exam = new Exam;
        $exam->user_id = Auth::guard('user')->user()->id;
        $exam->category_id = $id;
        $exam->status = 1;
        $exam->save();
        return view('examstart.leststart', $data);
    }


    public function FinishExam($id)
    {
        $examdetails = SubCategory::findOrFail($id);
        $user = User::findorFail(Auth::guard('user')->user()->id);
        $count = 0;
        foreach ($_POST as $key => $val) {
            if ($key != '_token') {
                $data['category_id'] = $id;
                $data['question_id'] = $key;
                $data['answer'] = $val;
                $data['user_id'] = Auth::guard('user')->user()->id;
                Answer::create($data);
                $count++;
            }
        }
        $balance = Auth::guard('user')->user()->balance + $examdetails->price;
        $user->balance = $balance;
        $user->save();
        $data['user_balance'] = $user->balance;
        $data['singleexam'] = $examdetails;
        $data['social'] = SocialIcon::first();
        $data['contact'] = Contact::first();
        $data['logo'] = Logo::first();
        $data['title'] = Title::first();
        $data['footer'] = Footer::first();
        $data['category'] = SubCategory::orderBy('id', 'ASC')->get();
        $data['message'] = "You Have Successfully Finish The Survey";
        return view('examstart.finish', $data);

    }

    public function MyExams()
    {

        $data = [];

        $data['social'] = SocialIcon::first();
        $data['contact'] = Contact::first();
        $data['logo'] = Logo::first();
        $data['title'] = Title::first();
        $data['footer'] = Footer::first();
        $data['category'] = SubCategory::orderBy('id', 'ASC')->get();
        $data['exams']= Exam::where('user_id', Auth::guard('user')->user()->id)->where('status', '=', 1)->get();

        return view('examstart.my', $data);
    }





    public function MyResult($id)
    {
        $examDetails = Exam::findOrFail($id);

    if($examDetails->user_id != Auth::guard('user')->user()->id){


                return redirect()->back();
    }




header('Content-type: image/jpeg');

$img = "images/cert.jpg";
$water = "images/logo.png";
$stamp = imagecreatefrompng($water);
$im = imagecreatefromjpeg($img);

list($width, $height) = getimagesize($img);
list($width2, $height2) = getimagesize($water);


$marge_right = 760;
$marge_bottom = 950;
$sx = imagesx($stamp);
$sy = imagesy($stamp);

imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));

      $black = imagecolorallocate($im, 0, 0, 0);
      $red = imagecolorallocate($im, 255, 0, 0);
      $font_path = 'ten.ttf';


			$text1 = "This is Certified That";
			$font_size=40;
			$p = imagettfbbox($font_size, 0, $font_path, $text1);
			$txt_width = $p[2] - $p[0];
			$x = (1800 - $txt_width) / 2;
			imagettftext($im, $font_size, 0, $x, 340, $black, $font_path, "$text1");



			$text1 = Auth::guard('user')->user()->name;
			$font_size=80;
			$p = imagettfbbox($font_size, 0, $font_path, $text1);
			$txt_width = $p[2] - $p[0];
			$x = (1800 - $txt_width) / 2;
			imagettftext($im, $font_size, 0, $x, 480, $black, $font_path, "$text1");



			$text1 = "Has Take The Exam";
			$font_size=40;
			$p = imagettfbbox($font_size, 0, $font_path, $text1);
			$txt_width = $p[2] - $p[0];
			$x = (1800 - $txt_width) / 2;
			imagettftext($im, $font_size, 0, $x, 590, $black, $font_path, "$text1");


			$text1 = $examDetails->subcat->name;
			$font_size=60;
			$p = imagettfbbox($font_size, 0, $font_path, $text1);
			$txt_width = $p[2] - $p[0];
			$x = (1800 - $txt_width) / 2;
			imagettftext($im, $font_size, 0, $x, 720, $red, $font_path, "$text1");


$re = explode(",", $examDetails->result);

			$text1 = "And " . $re[3];
			$font_size=60;
			$p = imagettfbbox($font_size, 0, $font_path, $text1);
			$txt_width = $p[2] - $p[0];
			$x = (1800 - $txt_width) / 2;
			imagettftext($im, $font_size, 0, $x, 840, $black, $font_path, "$text1");



			$text1 = "$re[0] $re[2] ";
			$font_size=40;
			$p = imagettfbbox($font_size, 0, $font_path, $text1);
			$txt_width = $p[2] - $p[0];
			$x = (1800 - $txt_width) / 2;
			imagettftext($im, $font_size, 0, $x, 940, $black, $font_path, "$text1");



			$text1 = "Date of Exam: " .$examDetails->created_at;
			$font_size=24;
			imagettftext($im, $font_size, 0, 200, 1120, $black, $font_path, "$text1");






      imagejpeg($im);
      imagedestroy($im);






    }


}
