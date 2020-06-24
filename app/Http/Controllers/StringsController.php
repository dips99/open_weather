<?php

namespace App\Http\Controllers;

use App\Repositories\StringsService;

use Illuminate\Http\Request;

class StringsController extends Controller
{

    protected $strSvc;
    public function __construct(StringsService $strSvc)
    {
      $this->strSvc = $strSvc;
    } 

    public function index()
    {
      return view('palindrome');
    }

    public function check_palindrome(Request $request)
    {    
        $str = $request->input('str_palindrome');
        $response = $this->strSvc->str_palindrome($str);
        return view('stringcheck')->with('res',$response);
	  }

}