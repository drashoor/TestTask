<?php

namespace App\Http\Controllers;

use App\Inquiry;

class InquiryController extends Controller
{

    public function index()
    {
        $data['objects'] = Inquiry::paginate(20);

        return View('inquiry.index', $data);
    }
}
