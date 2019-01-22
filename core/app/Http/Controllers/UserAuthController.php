<?php

namespace App\Http\Controllers;

use App\Footer;
use App\PasswordSubmit;
use App\Title;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Contact;
use App\History;
use App\Logo;
use App\Offer;
use App\Partner;
use App\Slider;
use App\SocialIcon;
use App\SubCategory;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Session;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    public function __construct()
    {

    }

    public function getLogin()
    {
        $logo = Logo::first();
        $social = SocialIcon::first();
        $contact = Contact::first();
        $sponsor = Partner::all();
        $title = Title::first();
        $footer = Footer::first();
        $exam_category = SubCategory::orderBy('id', 'DESC')->get();
        return view('user.login')
            ->withSocial($social)
            ->withContact($contact)
            ->withPartner($sponsor)
            ->withCategory($exam_category)
            ->withLogo($logo)
            ->withTitle($title)
            ->withFooter($footer);
    }
    public function postLogin(Request $request)
    {

        if (Auth::guard('user')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])){
            if (Auth::guard('user')->user()->status == 1)
            {
                Auth::guard('user')->logout();
                session()->flash('message', 'Sorry Your Account in Block Now.');
                session()->flash('type', 'danger');
                return redirect()->back();
            }else{
                // Authentication passed...
                Session::flash('success', 'Log In Successfully');
                $id = Session::get('exam_cat');
                Session::put('user','user');
                if($id != null){
                    return redirect()->route('exam_start',$id);
                }
                else{
                    return redirect()->route('exam');
                }
            }

        }

        $request->session()->flash('message', 'Login incorrect!');
        session()->flash('type', 'danger');
        return redirect()->back();
    }

    public function getRegister()
    {
        $logo = Logo::first();
        $social = SocialIcon::first();
        $contact = Contact::first();
        $title = Title::first();
        $footer = Footer::first();
        $sponsor = Partner::all();
        $exam_category = SubCategory::orderBy('id', 'ASC')->get();
        return view('user.register')
            ->withSocial($social)
            ->withContact($contact)
            ->withPartner($sponsor)
            ->withCategory($exam_category)
            ->withLogo($logo)
            ->withTitle($title)
            ->withFooter($footer);
    }
    public function postRegister(Request $request)
    {
        $this->validate($request,[
           'name' => 'required|min:5',
            'email' => 'required|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:6|confirmed'
        ]);

        $reg = new User;
        $password = Hash::make($request->password_confirmation);
        $reg->name = $request->name;
        $reg->email = $request->email;
        $reg->password = $password;
        $reg->phone = $request->phone;
        $reg->country = $request->country;
        $reg->dob = $request->dob;
        $reg->username = $request->username;
        $reg->gender = $request->gender;
        $reg->save();
        Session::flash('success', 'Your Registration Successfully Complected.');
        return redirect()->route('userlogin');
    }
    public function logout()
    {
        Auth::guard('user')->logout();
        session()->forget('user');
        session()->forget('exam_cat');
        session()->flash('success', 'Successfully Log Out!');
        $logo = Logo::first();
        $social = SocialIcon::first();
        $contact = Contact::first();
        $sponsor = Partner::all();
        $title = Title::first();
        $footer = Footer::first();
        $exam_category = SubCategory::orderBy('id', 'DESC')->get();
        return redirect()->route('userlogin')
            ->withSocial($social)
            ->withContact($contact)
            ->withPartner($sponsor)
            ->withCategory($exam_category)
            ->withTitle($title)
            ->withFooter($footer)
            ->withLogo($logo);
    }
    public function getForgetPassword()
    {
        $logo = Logo::first();
        $social = SocialIcon::first();
        $contact = Contact::first();
        $sponsor = Partner::all();
        $title = Title::first();
        $footer = Footer::first();
        $exam_category = SubCategory::orderBy('id', 'DESC')->get();
        return view('user.forget-password')
            ->withSocial($social)
            ->withContact($contact)
            ->withPartner($sponsor)
            ->withCategory($exam_category)
            ->withLogo($logo)
            ->withTitle($title)
            ->withFooter($footer);
    }
    public function submitForgetPassword(Request $request)
    {
        $email = $request->email;
        $ur = User::whereEmail($email)->count();
        $user = User::whereEmail($email)->first();
        if ($ur == 1){
            $data['token'] = Str::random(60);
            $data['email'] = $email;
            $data['status'] = 0;
            $rr = PasswordSubmit::create($data);
            $url = route('user-password-reset',$rr->token);


            $title = Title::first();
            $contact = Contact::first();
            $footer = Footer::first();
            $mail_val = [
                'email' => $user->email,
                'name' => $user->lname.' '.$user->fname,
                'g_email' => $contact->email,
                'g_title' => $title->title,
                'subject' => 'Password Reset',
            ];
            Config::set('mail.driver','mail');
            Config::set('mail.from',$contact->email);
            Config::set('mail.name',$title->title);

            Mail::send('auth.reset-email', ['name' => $user->name,'link'=>$url,'footer'=>$footer->left_footer], function ($m) use ($mail_val) {
                $m->from($mail_val['g_email'], $mail_val['g_title']);
                $m->to($mail_val['email'], $mail_val['name'])->subject($mail_val['subject']);
            });
            session()->flash('message', 'Check Your Email.Reset link Successfully send.');
            Session::flash('type', 'success');
            return redirect()->back();
        }else{
            session()->flash('message', 'Email Not Match our Recorded.');
            Session::flash('type', 'warning');
            return redirect()->back();
        }
    }
    public function resetForgetPassword($token)
    {
        $pw1 = PasswordSubmit::whereToken($token)->count();
        if ($pw1 != null ){

            $pw = PasswordSubmit::whereToken($token)->first();
            $logo = Logo::first();
            $social = SocialIcon::first();
            $contact = Contact::first();
            $sponsor = Partner::all();
            $title = Title::first();
            $footer = Footer::first();
            $exam_category = SubCategory::orderBy('id', 'DESC')->get();
            $token = $pw->token;
            return view('user.reset-password-form')
                ->withSocial($social)
                ->withContact($contact)
                ->withPartner($sponsor)
                ->withCategory($exam_category)
                ->withLogo($logo)
                ->withTitle($title)
                ->withFooter($footer)
                ->withToken($token);

        }else{
            session()->flash('message', 'Something is Error.');
            Session::flash('type', 'warning');
            return redirect()->route('user-forget-password');
        }

    }
    public function ResetSubmitPassword(Request $request)
    {
        $this->validate($request,[
            'email' => 'email|required',
            'token' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);
        $pw = PasswordSubmit::whereEmail($request->email)->whereToken($request->token)->count();
        $pw1 = PasswordSubmit::whereEmail($request->email)->whereToken($request->token)->first();
        if ($pw == 1){

            $user = User::whereEmail($pw1->email)->first();
            $password = Hash::make($request->password);
            $user->password = $password;
            $user->save();
            PasswordSubmit::whereEmail($pw1->email)->delete();
            session()->flash('message', 'Password Reset Successfully.');
            Session::flash('type', 'success');
            return redirect()->route('userlogin');
        }else{
            session()->flash('message', 'Something Is Error.');
            Session::flash('type', 'success');
            return redirect()->back();
        }
    }


}
