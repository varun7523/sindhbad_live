<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\SubCategory;
use App\Category;


class SubCategoryController extends Controller
{
    public function index(Request $request)
    {
        $type = isset($_GET['type']) ? $_GET['type'] : '1';
        $btnStatus = ($type == '1') ? '0' : '1';
        $subCategories = SubCategory::where(['status'=>$type])->orderBy('id')->get();
        return view('admin.subCategory.index',compact('subCategories', 'type', 'btnStatus'));
    }

    public function create(Request $request)
    {
        $categories = Category::where(['status'=>1])->select('id', 'category_name as name')->get();
        return view('admin.subCategory.create',compact('categories'));
        
    }

    
    public function store(Request $request)
    {          
        $inputData = $request->all();

        if(isset($inputData['id']) && !empty($inputData['id'])){
            $subCategoryId = $inputData['id'];
            $edit = true;
        }else{
            $edit = false;
        }
        $insertData['sub_category_name'] =  $inputData['sub_category_name'];
        $insertData['category_id'] =  $inputData['category_id'];
        $insertData['status'] =  1;
        if(!$edit){
            $createSubCategory = SubCategory::create($insertData);
        }else{
            $createSubCategory = SubCategory::where(['id'=>$subCategoryId])->update($insertData);
        }
        
        return redirect('admin/master/sub-category');
        
        
        
        
    }

    public function edit(Request $request)
    {
        $subcategoryId = isset($_GET['sub-category']) ? $_GET['sub-category'] : '0';
        if(!empty($subcategoryId)){
            $subCategoryDetails = SubCategory::where(['id'=>$subcategoryId])->first();
            if($subCategoryDetails){
                 $categories = Category::where(['status'=>1])->select('id', 'category_name as name')->get();
                return view('admin.subCategory.create',compact('subCategoryDetails', 'categories'));
            }else{
                return redirect('admin//master/sub-category');
            }
        }else{
            return redirect('admin//master/sub-category');
        }
        
    }

    

}
