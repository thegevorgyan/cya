<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Website;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    public function show()
    {
        $username = Auth::user()->name;
        $websites = DB::table('websites')
        ->orderBy('id', 'desc')
        ->where('username', '=', $username)
        ->get();
        
        return view('home', ['websites' => $websites, 'username' => $username]); 
    }
	
	public function add()
    {
        return view('add');
    }

    public function edit($id)
    {
        $website_row = DB::table('websites')
        ->where(['id'=> $id, 'username' => Auth::user()->name])       
        ->get();

        if(count($website_row) == 1){
            return view('edit', [ 'websiteRow' => $website_row ]);
        } else{
            abort(403);
        }       
    }

}
