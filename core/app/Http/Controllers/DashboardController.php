<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Exam;
use App\Method;
use App\Question;
use App\SubCategory;
use App\Title;
use App\User;
use App\Withdraw;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $data = [];
    }

    /*
     * Get Dashboard Here
     *
     * */
    public function getDashboard()
    {

        $data['question'] = Question::all()->count();
        $data['user'] = User::all()->count();
        $data['category'] = SubCategory::all()->count();
        $data['exam'] = Exam::all()->count();
        $data['site_title'] = Title::first();
        return view('dashboard.dashboard',$data);
    }
    public function surveyHistory()
    {
        $data['site_title'] = Title::first();
        $data['survey'] = Exam::orderBy('id','DESC')->get();
        return view('history.exam',$data);
    }
    public function surveyView($id)
    {
        $data['site_title'] = Title::first();
        $data['category'] = SubCategory::findOrFail($id);
        $data['survey'] = Answer::whereCategory_id($id)->get();
        return view('history.survey-view',$data);
    }
    public function createMethod()
    {
        $data['site_title'] = Title::first();
        return view('method.create',$data);
    }
    public function storeMethod(Request $request)
    {
        $this->validate($request,[
           'name' =>'required',
            'rate' => 'required'
        ]);
        $method = Input::except('_method','_token');
        Method::create($method);
        session()->flash('success','Method Created Succesfully.');
        return redirect()->back();
    }
    public function showMethod()
    {
        $data['site_title'] = Title::first();
        $data['method'] = Method::orderBy('id','DESC')->get();
        return view('method.show',$data);
    }
    public function editMethod($id)
    {
        $data['site_title'] = Title::first();
        $data['method'] = Method::findOrFail($id);
        return view('method.edit',$data);
    }
    public function updateMethod(Request $request,$id)
    {
        $method = Method::findOrFail($id);
        $met = Input::except('_method','_token');
        $method->fill($met)->save();
        session()->flash('success','Method Updated Succesfully.');
        return redirect()->back();
    }
    public function destroyMethod($id)
    {
        $method = Method::findOrFail($id);
        $method->delete();
        session()->flash('success','Method deleted Succesfully.');
        return redirect()->back();
    }
    public function getWithdraw()
    {
        $data['site_title'] = Title::first();
        $data['withdraw'] = Withdraw::orderBy('id','DESC')->paginate(10);
        return view('fund.withdraw-view',$data);
    }
    public function submitWithdraw($id)
    {
        $withdraw = Withdraw::findOrFail($id);
        $withdraw->status = 1;
        $withdraw->save();
        session()->flash('success','Withdraw Confirm Succesfully.');
        return redirect()->back();
    }
    public function refundWithdraw($id)
    {
        $withdraw = Withdraw::findOrFail($id);
        $withdraw->status = 2;
        $user = User::findOrFail($withdraw->user_id);
        $user->balance = $user->balance + $withdraw->balance;
        $withdraw->save();
        $user->save();
        session()->flash('success','Withdraw Refund Succesfully.');
        return redirect()->back();
    }
    public function allUsers()
    {
        $data['site_title'] = Title::first();
        $data['users'] = User::orderBy('id','desc')->paginate(10);
        return view('dashboard.all-user',$data);
    }
    public function blockUser(Request $request)
    {
        $m = User::findOrFail($request->id);
        $m->status = 1;
        $m->save();
        session()->flash('message', 'User Block Successfully.');
        Session::flash('type', 'success');
        Session::flash('title', 'Success');
        return redirect()->back();
    }
    public function UnblockUser(Request $request)
    {
        $m = User::findOrFail($request->id);
        $m->status = 0;
        $m->save();
        session()->flash('message', 'User UnBlock Successfully.');
        Session::flash('type', 'success');
        Session::flash('title', 'Success');
        return redirect()->back();
    }

}
