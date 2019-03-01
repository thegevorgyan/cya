<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {

    return view('admin.admin');
    }

    public function stat()
    {
      
        $stat = DB::table('received_data')
        ->orderBy('id', 'desc')
        ->get();
    //    return view('admin.stat', ['stat' => $stat]);
    return view('admin.stat', ['stat' => $stat]);
  // return $stat;
       
    }

    public function stor()
    {
        $stor = DB::table('stored_data')
        ->orderBy('id', 'desc')
        ->get();
    //    return view('admin.stor', ['stor' => $stor]);

        return view('admin.stor', ['stor' => $stor]);
    }

    public function cache()
    {
        $cache = DB::table('caches')
        ->orderBy('id', 'desc')
        ->get();

        return view('admin.cache', ['cache' => $cache]);
    }

    public function destroy(Request $request)
    {
        $id_groups = $request->input('id');
        $name = $request->input('name');
        foreach ($id_groups as $key => $value) {
            switch($name){
                case 'stat':
                    DB::table('received_data')
                    ->where('id', '=', $value)
                    ->delete(); 
                break;
                case 'stor':
                    DB::table('stored_data')
                    ->where('id', '=', $value)
                    ->delete(); 
                break;
                case 'cache':
                    DB::table('caches')
                    ->where('id', '=', $value)
                    ->delete(); 
                break;
                default:
                    return 'There is not such a table';
                break;       
            }        
        }
    }  

}
