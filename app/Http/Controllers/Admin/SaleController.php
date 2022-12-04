<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Services\Sale\SaleAdminService;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    protected $saleService;

      public function __construct(SaleAdminService $saleService)
      {
          $this ->saleService = $saleService;
      }

    public function index()//list
    {
        return view('admin.sale.list', [//goi ra list
            'title' => 'Danh Sách Sản Phẩm',
            'sales' => $this->saleService->get()
        ]);
    }

    public function create()
    {
        return view('admin.sale.add', [
            'title' => 'Thêm Sản Phẩm Khuyến Mãi Mới',
            'menus' => $this->saleService->getMenu()
        ]);
    }

    public function store(ProductRequest $request)
    {
        $this->saleService->insert($request);

        return redirect()->back();
    }

    public function show(Sale $sale)
    {
        return view('admin.sale.edit', [
            'title' => 'Chỉnh Sửa Sản Phẩm',
            'sale' => $sale,
            'menus' => $this->saleService->getMenu()
        ]);
    }


    public function update(Request $request, Sale $sale)
    {
        $result = $this->saleService->update($request, $sale);
        if ($result) {
            return redirect('/admin/sales/list');//tới trang list
        }

        return redirect()->back();//trả về trang xử lí
    }


    public function destroy(Request $request)
    {
        $result = $this->saleService->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công sản phẩm'
            ]);
        }

        return response()->json([ 'error' => true ]);
    }
}
