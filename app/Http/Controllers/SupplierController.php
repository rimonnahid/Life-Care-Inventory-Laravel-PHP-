<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;

class SupplierController extends Controller
{
    public function index()
    {
    	$suppliers = Supplier::latest()->get();
    	$count = 1;
    	return view('admin.supplier.allsup',compact('suppliers','count'));
    }

    public function show(Supplier $supplier)
    {
    	return view('admin.supplier.profile',compact('supplier'));
    }

    public function create()
    {
    	return view('admin.supplier.addsup');
    }

    public function store()
    {
    	$supplier = Supplier::create($this->validateData());
    	$this->storeImage($supplier);

    	if ($supplier) {
    		$notification = array(
    			'messege' => 'Successfully Joined Supplier!',
    			'alert-type' => 'success'
    		);
    		return redirect()->back()->with($notification);
    	}else{
    		$notification = array(
    			'messege' => 'Something Went Wrong!',
    			'alert-type' => 'error'
    		);
    		return redirect()->back()->with($notification);
    	}
    }

    public function edit(Supplier $supplier)
    {
    	return view('admin.supplier.editsup',compact('supplier'));
    }

    public function update(Supplier $supplier)
    {
    	$supplier->update($this->validateData());
    	$this->storeImageUpdate($supplier);

    	if ($supplier) {
    		$notification = array(
    			'messege' => 'Successfully Updated Supplier Information!',
    			'alert-type' => 'success'
    		);
    		return redirect()->back()->with($notification);
    	}else{
    		$notification = array(
    			'messege' => 'Something Went Wrong!',
    			'alert-type' => 'error'
    		);
    		return redirect()->back()->with($notification);
    	}
    }

    public function delete(Supplier $supplier)
    {
    	if ($supplier->photo) {
    		unlink('storage/app/public/'.$supplier->photo);
    	}
    	$supplier->delete();

    	if ($supplier) {
    		$notification = array(
    			'messege' => 'Supplier Removed Successfully!',
    			'alert-type' => 'success'
    		);
    		return redirect()->back()->with($notification);
    	}else{
    		$notification = array(
    			'messege' => 'Something Went Wrong!',
    			'alert-type' => 'error'
    		);
    		return redirect()->back()->with($notification);
    	}
    }


    private function validateData()
    {
    	return request()->validate([
    		'name' => 'required',
    		'email' => '',
    		'phone' => 'required',
    		'address' => '',
    		'type' => 'required',
    		'shopname' => '',
    		'bank_name' => '',
    		'bank_branch' => '',
    		'account_name' => '',
    		'account_number' => '',
    		'city' => '',
    		'photo' => '',
    	]);
    }

    private function storeImage($supplier)
    {
    	if (request()->has('photo')) {
    		$supplier->update([
    			'photo' => request()->photo->store('image/supplier','public'),
    		]);
    	}
    }

    private function storeImageUpdate($supplier)
    {
    	if(request()->has('photo')) {
    		if(request()->oldphoto) {
    			unlink('storage/app/public/'.request()->oldphoto);
    		}
            
            $supplier->update([
                'photo' => request()->photo->store('image/supplier','public'),
            ]);
    	}
    }
}
