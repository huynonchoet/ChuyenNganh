<?php

namespace App\Http\Controllers\admin;

use App\detail_order;
use App\Http\Controllers\Controller;
use App\order;
use App\products;
use Illuminate\Http\Request;

class thongkecontroller extends Controller
{
    public function thongke(){
        $data_detail_oder = detail_order::all();
        $data_order = order::all();
        $data_product = products::all();
        $data_product_theothang=[];
        for($i=1;$i<=12;$i++){
            $total=0;
            for($j=0;$j<count($data_order);$j++){
                $month = date('m', strtotime($data_order[$j]->day));
                if($i==$month){
                    for($h=0;$h<count($data_detail_oder);$h++){
                        if($data_detail_oder[$h]->id_order==$data_order[$j]->id){

                            for($k=0;$k<count($data_product);$k++){
                                if($data_product[$k]->id==$data_detail_oder[$h]->id_product){
                                    $total=(int)$total+((int)$data_detail_oder[$h]->amount)*((int)$data_product[$k]->price);
                                }
                            }
                        }
                    }
                }
            }
            $data_product_theothang[$i]=$total;
        }
        // var_dump($data_product_theothang);
        return view("admin.thongke.thongke",compact('data_product_theothang'));
    }
}
