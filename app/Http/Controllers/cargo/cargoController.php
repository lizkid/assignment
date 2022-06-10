<?php

namespace App\Http\Controllers\cargo;

use App\Http\Controllers\Controller;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Imports\CargosImport;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class cargoController extends Controller
{
    public function create()
    {
        return view('cargo.index');
    }


    public function upload(Request $request)
    {
        $validate = $request->validate([
        'file'=>'required|mimes:csv,xls,xlx,xlsx'
        ]);

        $file = $request->file('file');

        config(['excel.import.startRow' => 4]);

        Excel::import(new  CargosImport(), $file);

        Session::flash('alert-success', 'saved successfully');

        return redirect('/cargo/create');
    }

    public function getAllCargos()
    {
        $result = DB::select('call getAllCargosSP()');

        return response()->json([
            'message'=>'retrived successfully',
            'result_code'=>'01',
            'data'=>$result
        ]);
    }

}
