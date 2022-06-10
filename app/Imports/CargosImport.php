<?php

namespace App\Imports;

use App\Models\Cargo;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Facades\Excel;

class CargosImport implements ToModel, WithHeadingRow, WithCalculatedFormulas
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Cargo([
            'cargo_no'     => $row['cargo_no'],
            'cargo_type'    => $row['cargo_type'],
            'cargo_size' => $row['cargo_size'],
            'weight'     => $row['weight_kg'],
            'remarks'    => $row['remarks'],
            'wharfage' => $row['wharfage_usd'],
            'penalty'     => $row['penalty_days'],
            'storage'    => $row['storage_usd'],
            'electricity' => $row['electricity_usd'],
            'destuffing'     => $row['destuffingusd'],
            'lifting'    => $row['lifting_usd'],
        ]);


    }


}
