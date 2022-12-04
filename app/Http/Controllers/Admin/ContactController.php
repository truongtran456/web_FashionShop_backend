<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Menu\CreateFormRequest;
use App\Http\Services\Contact\ContactService;
use Illuminate\Http\Request;

class ContactController
{
    protected $contact;

    public function __construct(ContactService $contact)
    {
//        $this->user_home=$user_home;
        $this->contact=$contact;
//        $this->productService = $productService;
    }
    public function index()
    {
        return view('admin.contacts.content', [//truyền tới view
            'title' => 'Những Người Muốn Liên Hệ',
            'contacts' => $this->contact->show()

        ]);
    }

    public function destroy(Request $request)
    {
        $result = $this->contact->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công bình luận'
            ]);
        }

        return response()->json([ 'error' => true ]);
    }

}
