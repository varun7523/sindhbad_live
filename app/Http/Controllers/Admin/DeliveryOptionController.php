<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\DeliveryOption;


class DeliveryOptionController extends Controller
{
    public function index(Request $request)
    {
        $type = isset($_GET['type']) ? $_GET['type'] : '1';
        $btnStatus = ($type == '1') ? '0' : '1';
        $deliveryOptions = DeliveryOption::where(['status'=>$type])->orderBy('id')->get();
        return view('admin.deliveryOption.index',compact('deliveryOptions', 'type', 'btnStatus'));
    }

    public function create(Request $request)
    {
        return view('admin.deliveryOption.create');
        
    }

    
    public function store(Request $request)
    {          
        $inputData = $request->all();
        if(isset($inputData['id']) && !empty($inputData['id'])){
            $deliveryOptionId = $inputData['id'];
            $edit = true;
        }else{
            $edit = false;
        }
        $insertData['heading'] =  $inputData['heading'];
        $insertData['delivery_options_description'] =  $inputData['delivery_options_description'];
        $insertData['status'] =  1;
        if(!$edit){
            $createDeliveryOption = DeliveryOption::create($insertData);
        }else{
            $createDeliveryOption = DeliveryOption::where(['id'=>$deliveryOptionId])->update($insertData);
        }
        
        return redirect('admin/master/delivery-option');
        
        
        
        
    }

    public function edit(Request $request)
    {
        $deliveryId = isset($_GET['delivery']) ? $_GET['delivery'] : '0';
        if(!empty($deliveryId)){
            $deliveryDetails = DeliveryOption::where(['id'=>$deliveryId])->first();
            if($deliveryDetails){
                return view('admin.deliveryOption.create',compact('deliveryDetails'));
            }else{
                return redirect('admin/master/delivery-option');
            }
        }else{
            return redirect('admin/master/delivery-option');
        }
        
    }

    

}
