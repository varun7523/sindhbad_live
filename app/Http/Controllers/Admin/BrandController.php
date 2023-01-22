<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Brand;
use App\Category;


class BrandController extends Controller
{
    public function index(Request $request)
    {
        $type = isset($_GET['type']) ? $_GET['type'] : '1';
        $btnStatus = ($type == '1') ? '0' : '1';
        $brands = Brand::where(['status'=>$type])->orderBy('id')->get();
        return view('admin.brand.index',compact('brands', 'type', 'btnStatus'));
    }

    public function create(Request $request)
    {

        $categories = Category::where(['status'=>1])->select('id', 'category_name as name')->get();
        return view('admin.brand.create',compact('categories'));
        
    }

    
    public function store(Request $request)
    {          
        $inputData = $request->all();
        if(isset($inputData['id']) && !empty($inputData['id'])){
            $brandId = $inputData['id'];
            $edit = true;
        }else{
            $edit = false;
        }
        $insertData['brand_name'] =  $inputData['brand_name'];
        $insertData['brands_category_id'] =  $inputData['brands_category_id'];
        $insertData['status'] =  1;
        if(!$edit){
            $createBrand = Brand::create($insertData);
        }else{
            $createBrand = Brand::where(['id'=>$brandId])->update($insertData);
        }
        
        return redirect('admin/master/brand');
        
        
        
        
    }

    public function edit(Request $request)
    {
        $brandId = isset($_GET['brand']) ? $_GET['brand'] : '0';
        if(!empty($brandId)){
            $brandDetails = Brand::where(['id'=>$brandId])->first();
            if($brandDetails){
                $categories = Category::where(['status'=>1])->select('id', 'category_name as name')->get();
                return view('admin.brand.create',compact('brandDetails', 'categories'));
            }else{
                return redirect('admin/master/brand');
            }
        }else{
            return redirect('admin/master/brand');
        }
        
    }

    

}
