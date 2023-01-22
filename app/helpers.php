<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;
use App\Product;
use App\OrderProductMapping;

class Helper
{
   

    public static function skill_crypt($string, $action = 'e')
    {
        // you may change these values to your own
        $secret_key = 'sbecom';
        $secret_iv = 'staycreative';

        $output = false;
        $encrypt_method = 'AES-256-CBC';
        $key = hash('sha256', $secret_key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        if ($action == 'e') {
            $output = base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
        } elseif ($action == 'd') {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }

        return $output;
    }

    public static function getProductName($productId){
        $product = Product::where(['id'=>$productId])->select('product_name')->first();
        if($product){
            return $product->product_name;
        }else{
            return 'NA';
        }
    }

    public static function getOrderDetails($orderId){
        $orderProducts = OrderProductMapping::where(['order_id'=>$orderId])->get();
        if($orderProducts){
            return $orderProducts;
        }else{
            return false;
        }
    }


    
    
}