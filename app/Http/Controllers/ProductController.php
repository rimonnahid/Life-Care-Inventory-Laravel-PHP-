<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product\Product;
use App\Product\Category;
use App\Supplier;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->get();
        $count = 1;
        return view('admin.product.index',compact('products','count'));
    }

    public function gridView()
    {
        $products = Product::latest()->get();
        return view('admin.product.gridview',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status',1)->get();
        $suppliers = Supplier::all();
        return view('admin.product.addpro',compact('categories','suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */






    public function store(Request $request)
    {
        $prod = Product::where('name',$request->name)->where('size',$request->size)->first();
        if(!$prod){
            $product = Product::create($this->validateData());
            // $this->storeImage($product);
            if ($product) {
                $notification = array(
                    'messege' => 'Product Stored Successfully!',
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
        }else{
            $notification = array(
                'messege' => 'Product already have!',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.product.product',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view ('admin.product.edit',compact('product','categories','suppliers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Product $product)
    {
        $product->update($this->validateData());
        // $this->storeImageUpdate($product);

        if ($product) {
            $notification = array(
                'messege' => 'Product Information Updated!',
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Product $product)
    {
        // if ($product->photo_1) {
        //     unlink('storage/app/public/'.$product->photo_1);
        // }
        // if ($product->photo_2) {
        //     unlink('storage/app/public/'.$product->photo_2);
        // }
        // if ($product->photo_3) {
        //     unlink('storage/app/public/'.$product->photo_3);
        // }
        $product->delete();

        if ($product) {
            $notification = array(
                'messege' => 'Product Deleted!',
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

    public function stockOut()
    {
        $products = Product::where('quantity', 0)->latest()->get();
        $count = 1;
        return view ('admin.product.stockout',compact('products','count'));
    }

    private function validateData()
    {
        return request()->validate([
            // 'category_id' => 'required',
            'supplier_id' => '',
            'name' => 'required',
            'pv' => '',
            'size' => '',
            'quantity' => '',
            'buy_price' => 'required',
            'selling_price' => 'required',
            'details' => '',
        ]);
    }

    // private function storeImage($product)
    // {
    //     if (request()->has('photo_1')) {
    //         $product->update([
    //             'photo_1' => request()->photo_1->store('image/product','public'),
    //         ]);
    //     }

    //     if (request()->has('photo_2')) {
    //         $product->update([
    //             'photo_2' => request()->photo_2->store('image/product','public'),
    //         ]);
    //     }

    //     if (request()->has('photo_3')) {
    //         $product->update([
    //             'photo_3' => request()->photo_3->store('image/product','public'),
    //         ]);
    //     }
    // }

    // private function storeImageUpdate($product)
    // {
    //     if (request()->has('photo_1')) {
    //         if (request()->oldphoto1) {
    //             unlink('storage/app/public/'.request()->oldphoto1);
    //         }
    //         $product->update([
    //             'photo_1' => request()->photo_1->store('image/product','public'),
    //         ]);
    //     }

    //     if (request()->has('photo_2')) {
    //         if (request()->oldphoto2) {
    //             unlink('storage/app/public/'.request()->oldphoto2);
    //         }
    //         $product->update([
    //             'photo_2' => request()->photo_2->store('image/product','public'),
    //         ]);
    //     }

    //     if (request()->has('photo_3')) {
    //         if (request()->oldphoto3) {
    //             unlink('storage/app/public/'.request()->oldphoto3);
    //         }
    //         $product->update([
    //             'photo_3' => request()->photo_3->store('image/product','public'),
    //         ]);
    //     }
    // }


}
