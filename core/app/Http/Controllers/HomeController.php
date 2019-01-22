<?php

namespace App\Http\Controllers;

use App\AboutUs;
use App\Contact;
use App\Currency;
use App\Footer;
use App\History;
use App\Logo;
use App\Method;
use App\Offer;
use App\Partner;
use App\Slider;
use App\SocialIcon;
use App\SubCategory;
use App\Title;
use App\User;
use App\Withdraw;
use Illuminate\Http\Request;
use App\Exam;
use App\Question;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function getHomePage()
    {
        $data = [];
        $logo = Logo::first();
        $social = SocialIcon::first();
        $contact = Contact::first();
        $slider = Slider::all();
        $offer = Offer::first();
        $sponsor = Partner::all();
        $title = Title::first();
        $footer = Footer::first();
        $data['subcategory'] = SubCategory::all()->count();
        $data['exam'] = Exam::all()->count();
        $data['question']= Question::all()->count();
        $data['currency'] = Currency::all();
        $exam_category = SubCategory::orderBy('id', 'DESC')->get();
        return view('home.home',$data)
            ->withSocial($social)
            ->withContact($contact)
            ->withSliders($slider)
            ->withOffer($offer)
            ->withPartner($sponsor)
            ->withCategory($exam_category)
            ->withLogo($logo)
            ->withTitle($title)
            ->withFooter($footer);
    }

    public function getAboutUs()
    {
        $logo = Logo::first();
        $social = SocialIcon::first();
        $contact = Contact::first();
        $sponsor = Partner::all();
        $exam_category = SubCategory::orderBy('id', 'DESC')->get();
        $about = AboutUs::first();
        $title = Title::first();
        $footer = Footer::first();
        return view('home.aboutus')
            ->withSocial($social)
            ->withContact($contact)
            ->withPartner($sponsor)
            ->withCategory($exam_category)
            ->withLogo($logo)
            ->withAbout($about)
            ->withTitle($title)
            ->withFooter($footer);
    }
    public function getContactUs()
    {
        $logo = Logo::first();
        $social = SocialIcon::first();
        $contact = Contact::first();
        $sponsor = Partner::all();
        $exam_category = SubCategory::orderBy('id', 'DESC')->get();
        $title = Title::first();
        $footer = Footer::first();
        return view('home.contactus')
            ->withSocial($social)
            ->withContact($contact)
            ->withPartner($sponsor)
            ->withCategory($exam_category)
            ->withLogo($logo)
            ->withTitle($title)
            ->withFooter($footer);
    }
    public function postWithdraw(Request $request)
    {
        $this->validate($request,[
            'method_id' => 'required',
            'balance' => 'required'
        ]);
        $method = Method::findOrFail($request->method_id);
        $rate = $method->rate;
        if(Auth::guard('user')->user()->balance < $request->balance){
            Session::flash('error','Sorry. Your Withdraw Balance is Larger Then Your Current Balance.');
            return redirect()->back();
        }elseif ($rate > $request->balance){
            Session::flash('error','Sorry. Your Request Balance is Smaller Then Withdraw Balance.');
            return redirect()->back();
        }else{
            $data['method_id'] = $request->method_id;
            $data['balance'] = $request->balance;
            $data['user_id'] = Auth::guard('user')->user()->id;
            $data['status'] = 0;
            $balance = Auth::guard('user')->user()->balance - $request->balance;
            $user = User::findOrFail(Auth::guard('user')->user()->id);
            $user->balance = $balance;
            $user->save();
            Withdraw::create($data);
            session()->flash('success','Withdraw Submitted Succesfully.');
            return redirect()->back();
        }
    }
    public function sendContact(Request $request)
    {
        $this->validate($request,[
           'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required'
        ]);
        $con = Contact::first();
        $to = $con->email;
        $subject = "Contact Page Massage";
        $msg = $request->message;
        $name = $request->name;
        $email = $request->email;

        $headers = "From: $name <$email> \r\n";
        $headers .= "Reply-To: $name <$email> \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        $message = "
                    <html>
                    <head>
                    <title>Contact You</title>
                    </head>
                    <body>
                    <p>$msg</p>
                    </body>
                    </html>
                    ";
        if (mail($to, $subject, $message, $headers)) {
            session()->flash('message', 'Message Send Successfully.');
            Session::flash('type', 'success');
            return redirect()->back();
        } else {
            Session::flash('message', 'Message Not Send');
            Session::flash('type', 'danger');
        }
    }
}
