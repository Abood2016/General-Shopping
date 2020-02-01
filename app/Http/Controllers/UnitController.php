<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UnitController extends Controller
{

    public function index()
    {
        $units = Unit::OrderBy('id', 'desc')->paginate(env('PAGINATION_COUNT'));
        return view('admin.units.units')->with([
            'units' => $units
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'unit_name' => 'required',
            'unit_code' => 'required',
        ]);

        $unit = new Unit();
        $unit->unit_name = $request->input('unit_name');
        $unit->unit_code = $request->input('unit_code');
        $unit->save();

        Session::flash('message', ' Unit ' . $unit->unit_name . ' has been added');
        return \redirect()->back();
    }

    public function update(Request $request)
    {
        $request->validate([
            'unit_name' => 'required',
            'unit_id' => 'required',
            'unit_code' => 'required',
        ]);

        //intval like casting id must be only int
        $unit_id = intval($request->input('unit_id'));

        $unit = Unit::find($unit_id);
        $unit->unit_name = $request->input('unit_name');
        $unit->unit_code = $request->input('unit_code');
        $unit->save();

        Session::flash('message', ' Unit ' . $unit->unit_name . ' has been Updated');
        return \redirect()->back();
    }

    public function delete(Request $request)
    {
        if (is_null($request->input('unit_id')) || empty($request->input('unit_id'))) {
            Session::flash('message', ' Unit ID is required');
            return \redirect()->back();
        }

        $id = $request->input('unit_id');
        Unit::destroy($id);
        Session::flash('message', ' Unit has been deleted');
        return \redirect()->back();
    }
}
