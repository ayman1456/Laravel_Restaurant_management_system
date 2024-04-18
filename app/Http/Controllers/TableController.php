<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    function table(){
        $tables= Table::latest()->get();
        return view('backend.table', compact('tables'));
    }
    function editTable($id) {
        $tables= Table::latest()->get();
        $editedTable = Table::find($id);
        return view('backend.table', compact('tables', 'editedTable'));
    }
    function deleteTable($id) {
        Table::find($id)->delete();
        return back();
    }

    function saveTable(Request $req,$id=null){
    
        $req->validate([
            'name' => 'required|unique:tables,name,'. $id
        ]);


       $table= Table::findOrNew($id);
       $table->name=$req->name;

       $table->save();
       return back();
    }
}
