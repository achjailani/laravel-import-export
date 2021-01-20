<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ItemImport;
use Maatwebsite\Excel\Facades\Excel;

class ItemController extends Controller
{
    public function import(Request $request) {
        if(!$this->isType($request->file('import-file')->getClientOriginalExtension())) {
            return redirect()->back()->with('failed', 'File type is not supported !!!');
        }
        Excel::import(new ItemImport, $request->file('import-file'));
        return redirect()->back()->with('success', 'All data has been successfully imported!');
    }

    private function isType(string $str) {
        $type  = [
            'xlsx',
            'xls',
            'xlsm',
            'xltm',
            'xltx',
            'csv'
        ];

        if(in_array($str, $type)) {
            return true;
        }
        return false;
    }
}
