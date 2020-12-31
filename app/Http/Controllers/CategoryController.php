<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product\Category;

class CategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::all();
    	$count = 1;
    	return view ('admin.product.category.category',compact('categories','count'));
    }

    public function store(Request $request)
    {
    	$data = $request->validate([
    		'name' => 'required',
    		'status' => ''
    	]);
    	$category = Category::create($data);

    	if ($category) {
    		$notification = array(
    			'messege' => 'Category Inserted Successfully!',
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

    public function update(Category $category)
    {
    	$data = request()->validate([
    		'name' => 'required',
    	]);
    	$category->update($data);

    	if ($category) {
    		$notification = array(
    			'messege' => 'Category Updated Successfully!',
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

    public function delete(Category $category)
    {
    	$category->delete();

    	if ($category) {
    		$notification = array(
    			'messege' => 'Category Removed Successfully!',
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

    public function active(Category $category)
    {
    	$category->update(['status' => '1']);

    	if ($category) {
    		$notification = array(
    			'messege' => 'Category Activated!',
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

    public function deactive(Category $category)
    {
    	$category->update(['status' => '0']);

    	if ($category) {
    		$notification = array(
    			'messege' => 'Category Deactivated!',
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
}
