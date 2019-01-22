<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/',['as'=>'home','uses'=>'HomeController@getHomePage']);
Route::get('/about-us', ['as'=>'about_us', 'uses'=>'HomeController@getAboutUs']);
Route::get('/contact-us', ['as'=>'contact-us', 'uses'=>'HomeController@getContactUs']);
//Authentication Route List
Route::get('auth', ['as'=>'login', 'uses'=>'AdminAuthController@getLogin']);
Route::post('auth', ['as'=>'login', 'uses'=>'AdminAuthController@postLogin']);
Route::get('auth/logout', ['as'=>'logout','uses'=>'AdminAuthController@logout']);

//User Registration Route List
Route::get('user-login', ['as'=>'userlogin', 'uses'=>'UserAuthController@getLogin']);
Route::post('user-login', ['as'=>'user_login', 'uses'=>'UserAuthController@postLogin']);
Route::get('user-reg', ['as'=>'userreg', 'uses'=>'UserAuthController@getRegister']);
Route::post('user-reg', ['as'=>'user_reg', 'uses'=>'UserAuthController@postRegister']);
Route::get('user-logout', ['as'=>'user-logout', 'uses' => 'UserAuthController@logout']);
Route::get('user-registration',['as'=>'userregistration','uses'=>'UserAuthController@getRegister']);

/* user Forget Password */
Route::get('user-forget-password',['as'=>'user-forget-password','uses'=>'UserAuthController@getForgetPassword']);
Route::get('user-password-reset/{token}',['as'=>'user-password-reset','uses'=>'UserAuthController@resetForgetPassword']);
Route::post('user-forget-password-submit',['as'=>'user-forget-password-submit','uses'=>'UserAuthController@submitForgetPassword']);
Route::post('user-reset-password-submit',['as'=>'user-reset-password-submit','uses'=>'UserAuthController@ResetSubmitPassword']);



Route::get('edit-profile',['as'=>'edit-profile','uses'=>'ExamStartController@editProfile']);
Route::post('edit-profile',['as'=>'edit-profile','uses'=>'ExamStartController@updateProfile']);

Route::get('change-password',['as'=>'change-password','uses'=>'ExamStartController@changePassword']);
Route::post('change-password',['as'=>'change-password','uses'=>'ExamStartController@updatePassword']);

//Password Change
Route::get('password_change', ['as' => 'password_form', 'uses' => 'PasswordChangeController@getChangePassword']);
Route::post('password_change', ['as' => 'password_form', 'uses' => 'PasswordChangeController@postChangePassword']);

// Dashboard Route List
Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@getDashboard']);

// Base Category Route List
Route::resource('category', 'CategoryController');

// Sub category Route List
Route::resource('subcategory', 'SubCategoryController');

// Question Route List
Route::resource('question', 'QuestionController');

// Question from sub Category Route List
Route::get('questioncat/{id}', ['as' => 'question_subcategory', 'uses' => 'QuestionController@addQuestionById']);
Route::post('questioncat/{id}', ['as' => 'question_store', 'uses' => 'QuestionController@postQuestionById']);
Route::get('questions/{id}', ['as' => 'question_view', 'uses' => 'QuestionController@viewQuestionById']);
Route::get('questionview/{id}', ['as' => 'question_show', 'uses' => 'QuestionController@showQuestionById']);
Route::get('questionedit/{id}/edit', ['as' => 'question_edit', 'uses' => 'QuestionController@editQuestionById']);
Route::put('questionedit/{id}', ['as' => 'question_update', 'uses' => 'QuestionController@updateQuestionById']);
Route::delete('questiondelete/{id}', ['as' => 'question_delete', 'uses' => 'QuestionController@deleteQuestionById']);

// Currency Route List
Route::resource('currency', 'CurrencyController');

// WebSetting Route
Route::get('logo', ['as' => 'logo', 'uses' => 'WebSettingController@getLogo']);
Route::post('logo/{id}', ['as' => 'logo_post', 'uses' => 'WebSettingController@postLogo']);

// Web Title Setting
Route::get('title', ['as'=>'title', 'uses' =>'WebSettingController@getTitle']);
Route::put('title/{id}', ['as'=>'title_update', 'uses' => 'WebSettingController@postTitle']);

// History Route
Route::get('AddFund', ['as' => 'add_fund_history', 'uses' => 'WebSettingController@AddFund']);
Route::get('ExamHistory', ['as' => 'exam_history', 'uses' => 'WebSettingController@ExamHistory']);



// Web Setting Footer Route
Route::get('footer', ['as'=>'footer', 'uses'=>'WebSettingController@getFooter']);
Route::put('footer/{id}', ['as'=>'footer_update', 'uses' => 'WebSettingController@postFooter']);

// Website Setting Slider Route
Route::get('slider', ['as' => 'slider', 'uses' => 'WebSettingController@getSlider']);
Route::post('slider', ['as' => 'slider_post', 'uses' => 'WebSettingController@postSlider']);
Route::delete('slider/{id}', ['as' => 'slider_delete', 'uses' => 'WebSettingController@deleteSlider']);

//Web Setting Offer Route
Route::get('offer', ['as' => 'offer', 'uses' => 'WebSettingController@getOffer']);
Route::put('offer/{id}', ['as' => 'offer_update', 'uses' => 'WebSettingController@putOffer']);

// Web Setting History Route
Route::get('history', ['as' => 'history', 'uses' => 'WebSettingController@getHistory']);

//Web Setting Partner Route List
Route::get('partner', ['as' => 'partner', 'uses' => 'WebSettingController@getPartner']);
Route::post('partner', ['as' => 'partner_post', 'uses' => 'WebSettingController@postPartner']);
Route::delete('partner/{id}', ['as' => 'partner_delete', 'uses' => 'WebSettingController@deletePartner']);

// Web Setting Route Link
Route::get('social', ['as' => 'social', 'uses' => 'WebSettingController@getSocial']);
Route::put('social/{id}', ['as' => 'social_update', 'uses' => 'WebSettingController@putSocial']);

// Web Setting contact Route List
Route::get('contact', ['as' => 'contact', 'uses' => 'WebSettingController@getContact']);
Route::put('contact/{id}', ['as' => 'contact_update', 'uses' => 'WebSettingController@putContact']);

// Route for About Us
Route::get('about', ['as' => 'aboutus', 'uses'=>'WebSettingController@getAbout']);
Route::put('about/{id}', ['as' => 'about_update', 'uses' => 'WebSettingController@putAbout']);

// Route for payment Setting
Route::get('payment', ['as'=>'payment', 'uses'=>'WebSettingController@getPayment']);
Route::put('payment/{id}', ['as'=>'payment_update', 'uses'=>'WebSettingController@putPayment']);

// Route For Exam Category
Route::get('exam/{id}', ['as' => 'exam_id', 'uses' => 'ExamController@getExamById']);
Route::get('exam', ['as' => 'exam', 'uses' => 'ExamController@getExam']);

// Route For Exam Start
Route::get('examstart/{id}', ['as' => 'exam_start', 'uses' => 'ExamStartController@getExamStart']);


Route::get('examconfirm/{id}', ['as'=>'exam_confirm', 'uses' =>'ExamStartController@getExamConfirm']);
Route::get('examineMe/{id}', ['as'=>'lets_exam', 'uses' =>'ExamStartController@LestStartExam']);
Route::post('examineMe/{id}', ['as'=>'lets_exam', 'uses' =>'ExamStartController@FinishExam']);

Route::get('my_exams', ['as'=>'my_exams', 'uses' =>'ExamStartController@MyExams']);
Route::get('myexam/{id}', ['as'=>'my_exam', 'uses' =>'ExamStartController@MyResult']);

// Survey History
Route::get('survey-history',['as'=>'survey-history','uses'=>'DashboardController@surveyHistory']);
Route::get('survey-view/{id}',['as'=>'survey-view','uses'=>'DashboardController@surveyView']);

// Add Fund Route List
Route::get('add-fund', ['as' => 'add_fund', 'uses' => 'FundController@getFund']);

Route::post('paypal_ipn', ['as' => 'pp_fund', 'uses' => 'FundController@paypal']);
Route::post('pm_ipn', ['as' => 'pm_fund', 'uses' => 'FundController@pm']);


//Withdraw Method
Route::get('method-create',['as'=>'method-create','uses'=>'DashboardController@createMethod']);
Route::post('method-create',['as'=>'method-create','uses'=>'DashboardController@storeMethod']);
Route::get('method-show',['as'=>'method-show','uses'=>'DashboardController@showMethod']);
Route::get('method-edit/{id}',['as'=>'method-edit','uses'=>'DashboardController@editMethod']);
Route::put('method-edit/{id}',['as'=>'method-update','uses'=>'DashboardController@updateMethod']);
Route::delete('method-destroy/{id}',['as'=>'method-destroy','uses'=>'DashboardController@destroyMethod']);

// Withdraw Request Route
Route::post('withdraw-request',['as'=>'withdraw-request','uses'=>'HomeController@postWithdraw']);
Route::get('withdraw-history',['as'=>'withdraw-history','uses'=>'DashboardController@getWithdraw']);
Route::get('withdraw-submit/{id}',['as'=>'withdraw-submit','uses'=>'DashboardController@submitWithdraw']);
Route::get('withdraw-refund/{id}',['as'=>'withdraw-refund','uses'=>'DashboardController@refundWithdraw']);

//Contact Page Route list
Route::post('contact-send',['as'=>'contact-send','uses'=>'HomeController@sendContact']);


Route::get('all-users',['as'=>'all-users','uses'=>'DashboardController@allUsers']);
Route::post('block-user',['as'=>'block-user','uses'=>'DashboardController@blockUser']);
Route::post('unblock-user',['as'=>'unblock-user','uses'=>'DashboardController@UnblockUser']);

//Facebook SDK
Route::get('/facebook/login', function(SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb){
    $login_url = $fb->getLoginUrl(['email']);
    echo '<a href="' . $login_url . '">Login with Facebook</a>';
});

Route::get('/facebook/callback', function(SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb)
{
    // Obtain an access token.
    try {
        $token = $fb->getAccessTokenFromRedirect();
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        dd($e->getMessage());
    }

    // Access token will be null if the user denied the request
    // or if someone just hit this URL outside of the OAuth flow.
    if (! $token) {
        // Get the redirect helper
        $helper = $fb->getRedirectLoginHelper();

        if (! $helper->getError()) {
            abort(403, 'Unauthorized action.');
        }

        // User denied the request
        dd(
            $helper->getError(),
            $helper->getErrorCode(),
            $helper->getErrorReason(),
            $helper->getErrorDescription()
        );
    }

    if (! $token->isLongLived()) {
        // OAuth 2.0 client handler
        $oauth_client = $fb->getOAuth2Client();

        // Extend the access token.
        try {
            $token = $oauth_client->getLongLivedAccessToken($token);
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            dd($e->getMessage());
        }
    }

    $fb->setDefaultAccessToken($token);

    // Save for later
    Session::put('fb_user_access_token', (string) $token);

    // Get basic info on the user from Facebook.
    try {
        $response = $fb->get('/me?fields=id,name,email');
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        dd($e->getMessage());
    }

    // Convert the response to a `Facebook/GraphNodes/GraphUser` collection
    $facebook_user = $response->getGraphUser();

    // Create the user if it does not exist or update the existing entry.
    // This will only work if you've added the SyncableGraphNodeTrait to your User model.
    $user = App\User::createOrUpdateGraphNode($facebook_user);

    // Log the user into Laravel
    Auth::login($user);

    return redirect('/')->with('message', 'Successfully logged in with Facebook');
});

