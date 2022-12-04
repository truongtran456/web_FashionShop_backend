<?php

namespace App\Http\Services\Sale;


use App\Models\Menu;
use App\Models\Sale;
use Illuminate\Support\Facades\Session;

class SaleAdminService
{
    public function getMenu()
    {
        return Menu::where('active', 1)->get();
    }

    protected function isValidPrice($request)//check giá tiền
    {
        if ($request->input('price') != 0 && $request->input('price_sale') != 0//nếu cả 2 #0 mới kiểm tra
            && $request->input('price_sale') >= $request->input('price')//giảm >= gốc thì sẽ xuất lỗi
        ) {
            Session::flash('error', 'Giá giảm phải nhỏ hơn giá gốc');
            return false;
        }//nếu giá gốc=0 mà giảm #0 thì lỗi
        if ($request->input('price_sale') != 0 && (int)$request->input('price') == 0) {
            Session::flash('error', 'Vui lòng nhập giá gốc');
            return false;
        }

        return  true;
    }

    public function insert($request)
    {
        $isValidPrice = $this->isValidPrice($request);//hàm này sai thì mới thực hiện
        if ($isValidPrice === false) return false;

        try {
            $request->except('_token');
            Sale::create($request->all());

            Session::flash('success', 'Thêm Sản phẩm thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm Sản phẩm lỗi');
            \Log::info($err->getMessage());
            return  false;
        }

        return  true;
    }

    public function get()
    {
        return Sale::with('menu')//goi menu bên product
        ->orderByDesc('id')->paginate(15);
    }

    public function update($request, $sale)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false) return false;

        try {
            $sale->fill($request->input());//update
            $sale->save();//save
            Session::flash('success', 'Cập nhật thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Có lỗi vui lòng thử lại');
            \Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function delete($request)
    {
//        kiểm tra xem tồn tại id không
        $sale = Sale::where('id', $request->input('id'))->first();
        if ($sale) {
            $sale->delete();
            return true;
        }

        return false;
    }
}
