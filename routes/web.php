<?php


use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\VerifiedController;
use App\Http\Controllers\DeactivedController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ChangePackageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DailyUpdatesController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\FeeController;
use Laravel\Jetstream\Jetstream;
use App\Http\Controllers\AssignFeeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('main');
});
// Frontend Routes
Route::get('/main', [PagesController::class, 'main'])->name('main');
Route::get('/about', [PagesController::class, 'about'])->name('pages.about');
Route::get('/package', [PagesController::class, 'service'])->name('pages.service');
Route::get('/privacy', [PagesController::class, 'privacy'])->name('pages.privacy');
Route::get('/contact', [PagesController::class, 'contact'])->name('pages.contact');
Route::get('/admin', [PagesController::class, 'admin'])->name('admin');

// Registration Users.
Route::post('/registeration', [CustomAuthController::class, 'registeration'])->name('registeration');
Route::post('mail' , [CustomAuthController::class , 'mail'])->name('CustomAuth.mail');

// Jetstream Routes for Dashboard
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Profile
Route::get('/profile' , [UserController::class , 'profile'])->name('users.profile');

// System User Routes
Route::get('/userlist', [UserController::class, 'userlist'])->middleware('auth')->name('users.userlist');
Route::get('/adduser', [UserController::class, 'adduser'])->middleware('auth')->name('users.adduser');
Route::post('/addusers', [UserController::class, 'addusers'])->middleware('auth');
Route::get('/showuser/{id}', [UserController::class, 'quickshow'])->middleware('auth')->name('users.showuser');
Route::get('/updateuser/{id}', [UserController::class, 'updateshow'])->middleware('auth')->name('users.edituser');
Route::put('/updateusers/{id}', [UserController::class, 'updateusers'])->middleware('auth');
Route::delete('/destroyuser/{id}', [UserController::class, 'destroyuser'])->middleware('auth');

// Areas Routes
Route::get('/arealist', [AreaController::class, 'arealist'])->middleware('auth')->name('area.arealist');
Route::get('/addarea', [AreaController::class, 'addarea'])->middleware('auth')->name('area.addarea');
Route::post('/addareas', [AreaController::class, 'addareas'])->middleware('auth');
Route::get('/showarea/{id}', [AreaController::class, 'quickshow'])->middleware('auth')->name('area.show');
Route::get('/updatearea/{id}', [AreaController::class, 'updateshow'])->middleware('auth')->name('area.edit');
Route::put('/updateareas/{id}', [AreaController::class, 'updatearea'])->middleware('auth');
Route::delete('/destroy3/{id}', [AreaController::class, 'destroy'])->middleware('auth');

// Packages Routes
Route::get('/packagelist', [PackageController::class, 'packagelist'])->middleware('auth')->name('packages.packagelist');
Route::get('/addpackage', [PackageController::class, 'addpackage'])->middleware('auth')->name('packages.addpackage');
Route::post('/addpackages', [PackageController::class, 'addpackages'])->middleware('auth');
Route::get('/showpackage/{id}', [PackageController::class, 'quickshow'])->middleware('auth')->name('packages.show');
Route::get('/updatepackage/{id}', [PackageController::class, 'updateshow'])->middleware('auth')->name('packages.edit');
Route::put('/updatepackages/{id}', [PackageController::class, 'updatepackage'])->middleware('auth');
Route::delete('/destroy1/{id}', [PackageController::class, 'destroy'])->middleware('auth');

// Categories Routes
Route::get('/categorylist', [CategoryController::class, 'categorylist'])->middleware('auth')->name('categories.categorylist');
Route::get('/addcategory', [CategoryController::class, 'addcategory'])->middleware('auth')->name('categories.addcategory');
Route::post('/addcategories', [CategoryController::class, 'addcategories'])->middleware('auth');
Route::get('/showcategory/{id}', [CategoryController::class, 'quickshow'])->middleware('auth')->name('categories.showcategory');
Route::get('/updatecategory/{id}', [CategoryController::class, 'updateshow'])->middleware('auth')->name('categories.editcategory');
Route::put('/updatecategorys/{id}', [CategoryController::class, 'updatecategory'])->middleware('auth');
Route::delete('/destroy2/{id}', [CategoryController::class, 'destroy'])->middleware('auth');

// Expenses Routes
Route::get('/expenselist', [ExpenseController::class, 'expenselist'])->middleware('auth')->name('expenses.expenselist');
Route::get('/addexpense', [ExpenseController::class, 'addexpense'])->middleware('auth')->name('expenses.addexpense');
Route::post('/addexpenses', [ExpenseController::class, 'addexpenses'])->middleware('auth');
Route::get('/showexpense/{id}', [ExpenseController::class, 'quickshow'])->middleware('auth')->name('expenses.showexpense');
Route::get('/updateexpense/{id}', [ExpenseController::class, 'updateshow'])->middleware('auth')->name('expenses.editexpense');
Route::put('/updateexpenses/{id}', [ExpenseController::class, 'updateexpense'])->middleware('auth');
Route::delete('/destroy4/{id}', [ExpenseController::class, 'destroy'])->middleware('auth');

// Clients Routes
Route::get('/clientlist', [ClientsController::class, 'clientlist'])->middleware('auth')->name('clients.clientlist');
Route::get('/addclient', [ClientsController::class, 'create'])->middleware('auth')->name('clients.addclient');
Route::post('/addclient', [ClientsController::class, 'addclient'])->middleware('auth');
Route::get('/showclient/{id}', [ClientsController::class, 'quickshow'])->middleware('auth')->name('clients.showclient');
Route::get('/updateclient/{id}', [ClientsController::class, 'updateshow'])->middleware('auth')->name('clients.editclient');
Route::put('/updateclients/{id}', [ClientsController::class, 'updateclient'])->middleware('auth');
Route::delete('/destroy5/{id}', [ClientsController::class, 'destroy'])->middleware('auth');
Route::get('user_req', [ClientsController::class , 'userreq'])->name('clients.new_conn_req');
Route::post('storereq', [ClientsController::class , 'storereq'])->name('clients.storereq');
Route::get('Requests', [ClientsController::class , 'allreq'])->name('clients.pending');
Route::post('connection-approved/{id}', [ClientsController::class , 'appconn'])->name('clients.approve_conn');

// Verified Routes
Route::get('/index', [VerifiedController::class, 'index'])->middleware('auth')->name('verified.index');
Route::get('/showverify/{id}', [VerifiedController::class, 'showverify'])->middleware('auth')->name('verified.show');

// Dactived Routes
Route::get('/index1', [DeactivedController::class, 'index'])->middleware('auth')->name('deactived.index');
Route::delete('/destroy6/{id}', [DeactivedController::class, 'destroy'])->middleware('auth');

// Accounts Routes
Route::get('/accountlist', [AccountController::class, 'index'])->middleware('auth')->name('accounts.index');
Route::get('/showaccount/{id}', [AccountController::class, 'show'])->middleware('auth')->name('accounts.show');

// user Account
Route::get('/my-account' , [AccountController::class , 'myaccount'])->name('accounts.user_show');

// Services Routes
Route::resource('services', ServiceController::class);

// Change Package Route
Route::resource('changes', ChangePackageController::class);

// Daily updates
Route::get('daily_update', [DailyUpdatesController::class, 'index'])->name('daily_updates.index');
Route::get('daily_update-create', [DailyUpdatesController::class, 'create'])->name('daily_updates.create');
Route::post('daily_updates-store', [DailyUpdatesController::class, 'store'])->name('daily_updates.store');
Route::post('daily_updates-send', [DailyUpdatesController::class, 'send'])->name('daily_updates.send');

// Changing password Routes
Route::resource('settings', SettingController::class);

// Feedback Routes
Route::get('feedbacks', [FeedbackController::class, 'index'])->name('feedbacks.index');
Route::get('feedback-create', [FeedbackController::class, 'create'])->name('feedbacks.create');
Route::post('feedback-store', [FeedbackController::class, 'store'])->name('feedbacks.store');
Route::get('feedback-edit/{id}', [FeedbackController::class, 'edit'])->name('feedbacks.edit');
Route::post('feedback-update/{id}', [FeedbackController::class, 'update'])->name('feedbacks.update');
Route::post('feedbackdestroy/{id}', [FeedbackController::class, 'destroy'])->name('feedbacks.destroy');

// Contact Form Routes
Route::post('contact-store', [PagesController::class, 'contactstore'])->name('pages.contactstore');
Route::get('contacts', [ContactController::class, 'index'])->name('contact.index');

// for search textbox
Route::post('fetch-productname', [DropdownController::class, 'fetchProductName']);
Route::post('fetch-expensename', [DropdownController::class, 'fetchExpenseName']);
Route::post('fetch-productcontact', [DropdownController::class, 'fetchProductContact']);
Route::post('fetch-productcnic', [DropdownController::class, 'fetchProductCnic']);
Route::post('fetch-productarea', [DropdownController::class, 'productarea']);
Route::post('/fetch-clientname', [DropdownController::class, 'clientname']);
Route::post('/fetch-clientcontact', [DropdownController::class, 'clientcontact']);
Route::post('/fetch-contact', [DropdownController::class, 'fetchContact']);
Route::post('/fetch-packagename', [DropdownController::class, 'packagename']);
Route::post('/fetch-names', [DropdownController::class, 'fetchName']);
Route::post('/fetch-fees', [DropdownController::class, 'fetchfees']);
Route::post('/fetch-pre_balance', [DropdownController::class, 'fetchPreBalance']);
Route::post('/fetch-old_balance', [DropdownController::class, 'fetcholdBalance']);
Route::post('/fetch-balance', [DropdownController::class, 'fetchbalance']);
Route::post('/fetch-pre_paid', [DropdownController::class, 'pre_paid']);
Route::post('/fetch-cnic', [DropdownController::class, 'fetchCnic']);

// ajax for client
Route::post('/fetch-client_fee', [DropdownController::class, 'clientfee']);
Route::post('/fetch-clientid', [DropdownController::class, 'clientid']);
Route::post('/fetch-currentpackage', [DropdownController::class, 'currentpackage']);

// for modal ajax
Route::post('/feeadd', [DropdownController::class, 'fee_add'])->name('fee_add');
Route::get('/fee_data', [DropdownController::class, 'fee_data'])->name('fee_data');

//Processing Payment Routes
Route::get('/paypal', [PagesController::class, 'orders'])->name('myOrder');

//PayPal Payment Method Routes
Route::post('transcation', [PaymentController::class, 'transcation'])->name('transcation');

// Reports Routes
Route::get('/reports', [ReportController::class, 'index'])->name('reports.users');
Route::get('/report-receivable', [ReportController::class, 'receivable'])->name('reports.receivable');
Route::get('/report-expense', [ReportController::class, 'expense'])->name('reports.expense');
Route::get('/report-account', [ReportController::class, 'account'])->name('reports.accounts');
Route::get('/data', [ReportController::class, 'client'])->name('reports.client');
Route::get('/report-customers', [ReportController::class, 'customers'])->name('reports.customers');
Route::get('/searchwitharea', [ReportController::class, 'searchwitharea'])->name('reports.searchwitharea');
Route::get('/report-fee', [ReportController::class, 'fee'])->name('reports.fees');

// fees Routes
Route::resource('fees', Feecontroller::class);

// For assign fee
Route::resource('assignfee', AssignFeeController::class);
