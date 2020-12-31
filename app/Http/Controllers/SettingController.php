<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::first();
        return view ('admin.setting.setting',compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $setting = Setting::first();
        return view ('admin.setting.create',compact('setting'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $setting = Setting::create($this->validateData());
        $this->storeImage($setting);

        if ($setting) {
            $notification = array(
                'messege' => 'Information Inserted Successfully!',
                'alert-type' => 'success'
            );
            return redirect('/setting')->with($notification);
        }else{
            $notification = array(
                'messege' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $setting = Setting::first();
        $setting->update($this->validateData());

        if (request()->has('company_logo')) {
            if (request()->oldlogo) {
                unlink('storage/app/public/'.request()->oldlogo);
            }
            $this->storeImage($setting);
        }

        if ($setting) {
            $notification = array(
                'messege' => 'Information Updated Successfully!',
                'alert-type' => 'success'
            );
            return redirect('/setting')->with($notification);
        }else{
            $notification = array(
                'messege' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }

    private function validateData()
    {
        return request()->validate([
            'company_name' => '',
            'company_phone' => '',
            'company_email' => '',
            'company_address' => '',
            'company_city' => '',
            'company_country' => '',
            'company_zipcode' => '',
            'company_logo' => '',
            'company_details' => '',
        ]);
    }

    private function storeImage($setting)
    {
        if (request()->has('company_logo')) {
            $setting->update([
                'company_logo' => request()->company_logo->store('image/company-logo','public'),
            ]);
        }
    }
}
