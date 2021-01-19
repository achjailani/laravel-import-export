<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ItemImport;
use Maatwebsite\Excel\Facades\Excel;

class ItemController extends Controller
{
    public function import(Request $request) {
        Excel::import(new ItemImport, $request->file('import-file'));
        return redirect()->back()->with('success', 'All data has been successfully imported!');
    }
}
