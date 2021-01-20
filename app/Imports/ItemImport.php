<?php

namespace App\Imports;

use App\Models\Item;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;

class ItemImport implements ToModel, WithHeadingRow
{

    public $i=0;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if(!empty($row['kode'])) {
            if(!Item::where('kode', $row['kode'])->first()) {
                return new Item([
                    'kode'      => $row['kode'],
                    'nama'      => $row['nama'],
                    'jenis'     => $row['jenis'],
                    'deskripsi' => $row['deskripsi'],
                    'harga'     => $row['harga'],
                    'qty'       => $row['qty'],
                    'berat'     => $row['berat'],
                ]);
            }
        }
    }

}
