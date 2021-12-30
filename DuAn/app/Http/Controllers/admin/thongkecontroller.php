<?php

namespace App\Http\Controllers\admin;

use App\detail_order;
use App\Http\Controllers\Controller;
use App\order;
use App\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class thongkecontroller extends Controller
{
    public function thongke()
    {
        $mathangbancham=$this->mathangbancham();
        $mathangbanchay = $this->mathangbanchay();
        $data_product_theocategory = $this->thongketheocategory();
        $data_product_theobrand = $this->thongketheobrand();
        $data_product_theothang = $this->thongketheothang();
        return view("admin.thongke.thongke",compact('data_product_theothang', 'data_product_theocategory', 'data_product_theobrand', 'mathangbanchay', 'mathangbancham'));
    }

    public function thongketheothang()
    {
        $data_product_theothang = [];
        $data_detail_oder = detail_order::all();
        $data_order = order::all();
        $data_product = products::all();
        for ($i = 1; $i <= 12; $i++) {
            $total = 0;
            for ($j = 0; $j < count($data_order); $j++) {
                $month = date('m', strtotime($data_order[$j]->day));
                if ($i == $month) {
                    for ($h = 0; $h < count($data_detail_oder); $h++) {
                        if ($data_detail_oder[$h]->id_order == $data_order[$j]->id) {

                            for ($k = 0; $k < count($data_product); $k++) {
                                if ($data_product[$k]->id == $data_detail_oder[$h]->id_product) {
                                    $total = (int)$total + ((int)$data_detail_oder[$h]->amount) * ((int)$data_product[$k]->price);
                                }
                            }
                        }
                    }
                }
            }
            $data_product_theothang[$i] = $total;
        }
        return $data_product_theothang;
    }

    public function thongketheobrand()
    {
        $data_product_theobrand = [
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0,
        ];
        $data_detail_oder = detail_order::all();
        $data_product = products::all();
        foreach ($data_product as $i) {
            foreach ($data_detail_oder as $j) {
                if ($i->id == $j->id_product) {
                    if ($i->brand == 1) {
                        $data_product_theobrand[1] += (int)$j->amount * (int)$i->price;
                    }
                    if ($i->brand == 2) {
                        $data_product_theobrand[2] += (int)$j->amount * (int)$i->price;
                    }
                    if ($i->brand == 3) {
                        $data_product_theobrand[3] += (int)$j->amount * (int)$i->price;
                    }
                    if ($i->brand == 4) {
                        $data_product_theobrand[4] += (int)$j->amount * (int)$i->price;
                    }
                    if ($i->brand == 5) {
                        $data_product_theobrand[5] += (int)$j->amount * (int)$i->price;
                    }
                }
            }
        }
        return $data_product_theobrand;
    }

    public function thongketheocategory()
    {
        $data_product_theocategory = [
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0,
        ];
        $data_detail_oder = detail_order::all();
        $data_product = products::all();
        foreach ($data_product as $i) {
            foreach ($data_detail_oder as $j) {
                if ($i->id == $j->id_product) {
                    if ($i->category == 1) {
                        $data_product_theocategory[1] += (int)$j->amount * (int)$i->price;
                    }
                    if ($i->category == 2) {
                        $data_product_theocategory[2] += (int)$j->amount * (int)$i->price;
                    }
                    if ($i->category == 3) {
                        $data_product_theocategory[3] += (int)$j->amount * (int)$i->price;
                    }
                    if ($i->category == 4) {
                        $data_product_theocategory[4] += (int)$j->amount * (int)$i->price;
                    }
                    if ($i->category == 5) {
                        $data_product_theocategory[5] += (int)$j->amount * (int)$i->price;
                    }
                }
            }
        }
        return $data_product_theocategory;
    }

    public function mathangbanchay(){
        $mathangbanchay = detail_order::select('id_product', detail_order::raw('SUM(amount) as total'))->groupBy('id_product')->orderBy('total', 'desc')->limit(3)->get();
        $data_product = products::all();
        foreach ($mathangbanchay as  $i) {
            foreach ($data_product as $j) {
                if($i->id_product==$j->id){
                    $i->name=$j->name;
                }
            }
        }
        return $mathangbanchay;
    }

    public function mathangbancham()
    {
        $mathangbancham = detail_order::select('id_product', detail_order::raw('SUM(amount) as total'))->groupBy('id_product')->orderBy('total')->limit(3)->get();
        $data_product = products::all();
        foreach ($mathangbancham as  $i) {
            foreach ($data_product as $j) {
                if ($i->id_product == $j->id) {
                    $i->name = $j->name;
                }
            }
        }
        return $mathangbancham;
    }
}
