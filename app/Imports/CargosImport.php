<?php

namespace App\Imports;

use App\Models\Cargo;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class CargosImport implements ToModel, WithHeadingRow, WithValidation
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

    public function rules(): array
    {
        return [
            'cargo_no' =>'required',
            'cargo_type'    => 'required',
            'cargo_size' => 'required',
            'weight'     => 'required',
            'remarks'    => 'required',
            'wharfage' => 'required',
            'penalty'     => 'required',
            'storage'    => 'required',
            'electricity' => 'required',
            'destuffing'     => 'required',
            'lifting'    => 'required',
        ];
    }
}
