<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {

        $data = Employee::all();
        // dd($data);
        return view('datapeserta', compact('data'));
    }
    public function tambahdata()
    {
        return view('tambahdata');
    }
    public function insertdata(Request $request){

    // dd($request -> all());
      /* $data = */ Employee::create($request -> all());
    // //    if($request -> hasFile('foto')){
    // //        $request -> file('foto') -> move('fotopeserta/', $request -> file('foto')->getClientOriginalName());
    // //        $data -> foto = $request -> file('foto') -> getClientOriginalName();
    // //        $data -> save();
    //    }
       return redirect() -> route('peserta') -> with('success', 'Berhasil menambah Data baru!');
    }
    public function editdata($id){
        $data = Employee::find($id);
        // dd($data);
        return view('editdata', compact('data'));
    }
    public function updatedata(Request $request, $id){
        $data = Employee::find($id);
        $data -> update($request -> all());
        return redirect() -> route('peserta') -> with('success', 'Update berhasil!');
    }
    public function deletedata($id){
        $data = Employee::find($id);
        $data -> delete();
        return redirect() -> route('peserta') -> with('success', 'Data anda telah terhapus!');
    }
}
