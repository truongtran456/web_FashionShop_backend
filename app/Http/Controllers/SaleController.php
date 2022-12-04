<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Sale\SaleService;

class SaleController extends Controller
{
    protected $saleService;

    public function __construct(SaleService $saleService)
    {
        $this->saleService = $saleService;
    }

    public function index($id = '', $slug = '')
    {
//        kiểm tra xem có tồn tại không để xuất ra
        $sale = $this->saleService->show($id);

        return view('sales.content', [
            'title' => $sale->name,
            'sale' => $sale
        ]);
    }
}
