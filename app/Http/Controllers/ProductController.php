<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Product;

use Storage;

class ProductController extends Controller
{

    private function imageUpload(Request $request)
    {
        $image = $request->file('image');
        $ext = $image->getClientOriginalExtension();
        $name = Str::slug($request->name, '-');
        if($request->file('image')->isValid()){
            $filename = $name.'.'.$ext;
            $upload_path = 'img/product';
            $request->file('image')->move($upload_path, $filename);

            return $filename;
        }
        return false;
    }

    private function imageDelete(Product $product)
    {
        $exist = Storage::disk('image')->exists($product->image);
        if(isset($product->image) && $exist){
            $delete = Storage::disk('image')->delete($product->image);
            return $delete; //Kalo delete gagal, bakal return false, kalo berhasil bakal return true
        }
    }

    public function shop(Request $request)
    {
        if($request->search){
            $all_product = Product::where('name', 'like', '%' . $request->search . '%')->Paginate(9);
        }
        else{
            $all_product = Product::Paginate(9);
        }
        return view('product.shop', compact('all_product'));
    }

    public function index()
    {
        $all_product = Product::Paginate(10);
        return view('product.index', compact('all_product'));
    }

    public function create()
    {
        $product = new Product;
        return view('product.create', compact('product'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['admin'] = \Auth::user()->id;
        $data['slug'] = Str::slug($request->name, '-');
        if($request->hasFile('image'))
        {
            $data['image'] = $this->imageUpload($request);

        }
        // dd($data);
        $store = Product::create($data);
        if($store)
        {
            return redirect()->route('product.index')->with('alert-class', 'alert-success')
                               ->with('flash_message', 'Product Successfuly Added !!');
        }
        return redirect()->route('product.index')->with('alert-class', 'alert-danger')
                                 ->with('flash_message', 'Product failed to Added !!');

    }

    public function show(Product $product)
    {
        return abort(404);
    }

    public function shop_show($slug)
    {
        $product = Product::where('slug', '=', $slug)->first();
        $related_products =  Product::inRandomOrder()->take(4)->get();
        return view('product.shop_show', compact('product', 'related_products'));
    }


    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->all();
        $data['admin'] = \Auth::user()->id;
        $data['slug'] = Str::slug($request->name, '-');
        if($request->has('image'))
        {
            $data['image'] = $this->imageUpload($request);
        }

        $update = $product->update($data);
        if($update)
        {
            return redirect()->route('product.index')->with('alert-class', 'alert-success')
                               ->with('flash_message', 'Product Successfuly Updated !!');
        }
        return redirect()->route('product.index')->with('alert-class', 'alert-danger')
                                 ->with('flash_message', 'Product failed to Updated !!');
    }

    public function destroy(Product $product)
    {
        $this->imageDelete($product);
        $delete = $product->delete();
        if($delete)
        {
            return redirect()->route('product.index')->with('alert-class', 'alert-success')
                               ->with('flash_message', 'Product Successfuly Deleted !!');
        }
        return redirect()->route('product.index')->with('alert-class', 'alert-danger')
                                 ->with('flash_message', 'Product failed to Deleted !!');

    }
}
