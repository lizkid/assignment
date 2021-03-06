<?php

namespace App\Http\Controllers\Cargo;

use App\Http\Controllers\Controller;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Imports\CargosImport;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class CargoController extends Controller
{
    public function create()
    {
        return view('cargo.index');
    }


    public function upload(Request $request)
    {
        $validate = $request->validate([
        'file'=>'required|mimes:xls,xlx,xlsx|max:10000'
        ]);

        $file = $request->file('file');

        try {

            Excel::import(new  CargosImport(), $file);

            Session::flash('alert-success', 'saved successfully');

            return redirect('/cargo');

        }

        catch (\Throwable $exception)
        {
            Log::error($exception);

            Session::flash('alert-danger', 'failed: Server error to insert record, Please make sure all required fields
            are filled');

            return redirect('/cargo');
        }


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
