<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout','HomeController@logout')->name('logout');

Route::middleware(['auth','admin'])->group(function () {

	Route::get('/admin-dashboard','AdminController@index')->name('admin.dashboard');

	//EMPLOYEE ROUTE ARE HERE----------------------------
	Route::get('/employees','EmployeeController@index')->name('employees');
	Route::get('/new-employee','EmployeeController@create')->name('new.employee');
	Route::post('/store-employee','EmployeeController@store')->name('store.employee');
	Route::get('/emplyee-profile/{employee}','EmployeeController@show')->name('profile.employee');
	Route::get('/edit-employee/{employee}','EmployeeController@edit')->name('edit.employee');
	Route::post('/update-employee/{employee}','EmployeeController@update')->name('update.employee');
	Route::get('/delete-employee/{employee}','EmployeeController@delete')->name('delete.employee');

	//CUSTOMER ROUTE ARE HERE----------------------------
	Route::get('/customers','CustomerController@index')->name('customers');
	Route::get('/new-customer','CustomerController@create')->name('new.customer');
	Route::post('/store-customer','CustomerController@store')->name('store.customer');
	Route::get('/customer-profile/{customer}','CustomerController@show')->name('profile.customer');
	Route::get('/edit-customer/{customer}','CustomerController@edit')->name('edit.customer');
	Route::post('/update-customer/{customer}','CustomerController@update')->name('update.customer');
	Route::get('/delete-customer/{customer}','CustomerController@delete')->name('delete.customer');

	//SUPPLIER ROUTE ARE HERE-----------------------------
	Route::get('/suppliers','SupplierController@index')->name('suppliers');
	Route::get('/new-supplier','SupplierController@create')->name('new.supplier');
	Route::post('/store-supplier','SupplierController@store')->name('store.supplier');
	Route::get('/supplier-profile/{supplier}','SupplierController@show')->name('profile.supplier');
	Route::get('/edit-supplier/{supplier}','SupplierController@edit')->name('edit.supplier');
	Route::post('/update-supplier/{supplier}','SupplierController@update')->name('update.supplier');
	Route::get('/delete-supplier/{supplier}','SupplierController@delete')->name('delete.supplier');

	//SALARY ROUTE ARE HERE-------------------------------
	Route::get('/salaries','SalaryController@index')->name('salaries');
	Route::get('/last-month-salary','SalaryController@lastMonth')->name('lastmonth.salary');
	Route::get('/new-salary','SalaryController@create')->name('new.salary');
	Route::get('/edit-salary/{salary}','SalaryController@edit')->name('edit.salary');
	Route::post('/update-salary/{salary}','SalaryController@update')->name('update.salary');
	Route::get('/delete-salary/{salary}','SalaryController@delete')->name('delete.salary');
	Route::post('/store-salary','SalaryController@store')->name('store.salary');

	//ADVANCE SALARY ROUTE ARE HERE-----------------------
	Route::get('/advance-salary','AdvancesalaryController@index')->name('advancesalary');
	Route::get('/new-advance-salary','AdvancesalaryController@create')->name('new.advancesalary');
	Route::get('/edit-advance-salary/{advancesalary}','AdvancesalaryController@edit')->name('edit.advancesalary');
	Route::post('/update-advance-salary/{advancesalary}','AdvancesalaryController@update')->name('update.advancesalary');
	Route::get('/delete-advance-salary/{advancesalary}','AdvancesalaryController@delete')->name('delete.advancesalary');
	Route::post('/store-advnace-salary','AdvancesalaryController@store')->name('store.advancesalary');

	//PRODUCT CATEGORY ROUTE ARE HERE---------------------
	Route::get('/proudct-category','CategoryController@index')->name('category');
	Route::post('/store-product-category','CategoryController@store')->name('store.category');
	Route::post('/update/{category}','CategoryController@update')->name('update.category');
	Route::get('/delete/{category}','CategoryController@delete')->name('delete.category');
	Route::get('/active-category/{category}','CategoryController@active')->name('active.category');
	Route::get('/deactive-category/{category}','CategoryController@deactive')->name('deactive.category');

	//PRODUCT ROUTE ARE HERE------------------------------
	Route::get('/products','ProductController@index')->name('products');
	Route::get('/products-grid','ProductController@gridView')->name('gridview.products');
	Route::get('/new-product','ProductController@create')->name('new.product');
	Route::post('/store-product','ProductController@store')->name('store.product');
	Route::get('/edit-product/{product}','ProductController@edit')->name('edit.product');
	Route::post('update-product/{product}','ProductController@update')->name('update.product');
	Route::get('/delete-product/{product}','ProductController@delete')->name('delete.product');
	Route::get('/product/{product}','ProductController@show')->name('show.product');

	//STOCK MANAGEMENT ROUTE ARE HERE---------------------
	Route::get('/stock-out','ProductController@stockOut')->name('stockout');

	//EXPENSE ROUTE ARE HERE------------------------------
	Route::get('/expenses','ExpenseController@index')->name('expenses');
	Route::get('/today-expense','ExpenseController@today')->name('today.expenses');
	Route::get('/monthly-expense','ExpenseController@month')->name('month.expenses');
	Route::get('/yearly-expense','ExpenseController@year')->name('year.expenses');
	Route::get('/new-expense','ExpenseController@create')->name('new.expense');
	Route::post('/store-expense','ExpenseController@store')->name('store.expense');
	Route::get('/edit-expense/{expense}','ExpenseController@edit')->name('edit.expense');
	Route::post('/update-expense/{expense}','ExpenseController@update')->name('update.expense');
	Route::get('/delete-expense/{expense}','ExpenseController@delete')->name('delete.expense');

	//MONTHLY EXPENSE ROUTE ARE HERE-----------------------
	Route::get('/january-expense','ExpenseController@January')->name('january.expenses');
	Route::get('/february-expense','ExpenseController@February')->name('february.expenses');
	Route::get('/march-expense','ExpenseController@March')->name('march.expenses');
	Route::get('/april-expense','ExpenseController@April')->name('april.expenses');
	Route::get('/may-expense','ExpenseController@May')->name('may.expenses');
	Route::get('/june-expense','ExpenseController@June')->name('june.expenses');
	Route::get('/july-expense','ExpenseController@July')->name('july.expenses');
	Route::get('/august-expense','ExpenseController@August')->name('august.expenses');
	Route::get('/september-expense','ExpenseController@September')->name('september.expenses');
	Route::get('/october-expense','ExpenseController@October')->name('october.expenses');
	Route::get('/november-expense','ExpenseController@November')->name('november.expenses');
	Route::get('/december-expense','ExpenseController@December')->name('december.expenses');

	//ATTENDANCE ROUTE ARE HERE-----------------------------
	Route::get('/attendances','AttendanceController@index')->name('attendances');
	Route::get('/new-attendance','AttendanceController@create')->name('new.attendance');
	Route::post('/store-attendance','AttendanceController@store')->name('store.attendance');
	Route::get('/show-attendance/{edit_date}','AttendanceController@show')->name('view.attendance');
	Route::get('/today-attendance','AttendanceController@today')->name('today.attendance');
	Route::get('/edit-attendance/{edit_date}','AttendanceController@edit')->name('edit.attendance');
	Route::post('/update-attendance','AttendanceController@update')->name('update.attendance');
	Route::get('/delete-attendance/{edit_date}','AttendanceController@delete')->name('delete.attendance');
	Route::get('/current-year-attendance','AttendanceController@yearly')->name('yearly.attendance');

	//MONTHLY ATTENDANCE ROUTE ARE HERE---------------------
	Route::get('/current-month-attendance','AttendanceController@current')->name('current.attendance');
	Route::get('/monthly-attendance/{month}','AttendanceController@monthly')->name('monthly.attendance');
	Route::get('/january-attendance','AttendanceController@January')->name('january.attendance');
	Route::get('/february-attendance','AttendanceController@February')->name('february.attendance');
	Route::get('/march-attendance','AttendanceController@March')->name('march.attendance');
	Route::get('/april-attendance','AttendanceController@April')->name('april.attendance');
	Route::get('/may-attendance','AttendanceController@May')->name('may.attendance');
	Route::get('/june-attendance','AttendanceController@June')->name('june.attendance');
	Route::get('/july-attendance','AttendanceController@July')->name('july.attendance');
	Route::get('/august-attendance','AttendanceController@August')->name('august.attendance');
	Route::get('/september-attendance','AttendanceController@September')->name('september.attendance');
	Route::get('/october-attendance','AttendanceController@October')->name('october.attendance');
	Route::get('/november-attendance','AttendanceController@November')->name('november.attendance');
	Route::get('/december-attendance','AttendanceController@December')->name('december.attendance');

	//WEBSITE SETTING ROUTE ARE HERE------------------------
	Route::get('/setting','SettingController@index')->name('setting');
	Route::get('/edit-setting','SettingController@create')->name('create.setting');
	Route::post('/store-setting','SettingController@store')->name('store.setting');
	Route::post('/update-setting','SettingController@update')->name('update.setting');

	//POS AND INVOICE ROUTE ARE HERE-----------------------------
	Route::get('/point-of-sale','PosController@index')->name('pos');
	Route::get('/invoice/{id}/{tracking_code}','CartController@invoice')->name('invoice');
	Route::get('/invoice_print/{id}/{tracking_code}','CartController@print')->name('invoice.print');
	Route::post('discount','PosController@discount');


	//CART SYSTEM ROUTE ARE HERE----------------------------
	Route::get('/add-cart/{id}','CartController@index')->name('add.cart');
	Route::post('/update-cart/{rowId}','CartController@update')->name('update.cart');
	Route::get('/delete-cart/{rowId}','CartController@delete')->name('delete.cart');

	//ORDER ROUTE ARE HERE----------------------------------
	Route::get('/orders','OrderController@index')->name('orders');
	Route::get('/order/delete/{order}','OrderController@delete')->name('delete.order');
	Route::get('/pending-orders','OrderController@pending')->name('pending.orders');
	Route::get('/approve-orders','OrderController@approve')->name('approve.orders');
	Route::get('/new-orders','OrderController@newOrder')->name('new.orders');
	Route::get('/processing-orders','OrderController@processing')->name('processing.orders');
	Route::get('/delivery-orders','OrderController@delivery')->name('delivery.orders');
	Route::get('/cancel-orders','OrderController@cancel')->name('cancel.orders');
	Route::post('/order-confirm','OrderController@store')->name('order.confirm');
	Route::get('/order-approve/{order}','OrderController@approveOrder')->name('approve.order');
	Route::get('/order-processing/{order}','OrderController@processingOrder')->name('processing.order');
	Route::get('/order-delivery/{order}','OrderController@deliveryOrder')->name('delivery.order');
	Route::get('/order-cancel/{order}','OrderController@cancelOrder')->name('cancel.order');
	Route::get('/show-order/{order}','OrderController@show')->name('show.order');

	//GALARY ROUTE ARE HERE---------------------------------
	Route::get('/employee-galary','GalaryController@employee')->name('employee.galary');
	Route::get('/supplier-galary','GalaryController@supplier')->name('supplier.galary');
	Route::get('/customer-galary','GalaryController@customer')->name('customer.galary');


	//CUSTOMER PV ROUTER ARE HERE
	Route::get('/customer/allpv','CustomerController@allPv')->name('customer.allpv');
	Route::get('/customer/todaypv/','CustomerController@todayPv')->name('customer.todaypv');
	Route::get('/customer/pv','CustomerController@customerPv')->name('customer.pv');
	Route::get('/customer/singlepvs/{id}','CustomerController@singlepvs')->name('customer.singlepvs');
	Route::get('/allpvs/pvs/details/{id}','CustomerController@appPvs_singleDetails')->name('all.orders.pvs.details');


	Route::get('/customer/monthly/singlepvs/{id}','CustomerController@thismonthSinglepvs')->name('customer.thismonthsinglepvs');
	// Route::get('/customer/thismonthsinglepvs/{id}','CustomerController@thismonthSinglepvs')->name('customer.thismonth.singlepvs');
	// Route::get('/customer/thisyearsinglepvs/{id}','CustomerController@thisyearSinglepvs')->name('customer.thisyear.singlepvs');
	Route::get('/dis_invoice/{id}/{tracking_code}','CartController@dis_invoice');
	Route::get('/dis_invoice_print/{id}/{tracking_code}','CartController@dis_invoice');

	Route::get('admin/get_cus_id/{id}','PosController@getSubcate');


	Route::get('admin/get_cus_id/{id}','PosController@getSubcate');
});
