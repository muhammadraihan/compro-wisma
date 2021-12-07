<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisma;

use Auth;
use DataTables;
use DB;
use File;
use Hash;
use Image;
use Response;
use URL;

class WismaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wisma = Wisma::all();
        if (request()->ajax()) {
            $data = Wisma::get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '
                            <a class="btn btn-success btn-sm btn-icon waves-effect waves-themed" href="' . route('wisma.edit', $row->uuid) . '"><i class="fal fa-edit"></i></a>
                            <a class="btn btn-danger btn-sm btn-icon waves-effect waves-themed delete-btn" data-url="' . URL::route('wisma.destroy', $row->uuid) . '" data-id="' . $row->uuid . '" data-token="' . csrf_token() . '" data-toggle="modal" data-target="#modal-delete"><i class="fal fa-trash-alt"></i></a>';
                })
                ->removeColumn('id')
                ->removeColumn('uuid')
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('wisma.index');
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('wisma.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        $rules = [
            'name' => 'required',
            'address' => 'required',
            'telephone' => 'required',
        ];

        $messages = [
            '*.required' => 'Field tidak boleh kosong !',
            '*.min' => 'Nama tidak boleh kurang dari 2 karakter !',
        ];

        $this->validate($request, $rules, $messages);
        // dd($request->all());

        $wisma = new Wisma();
        $wisma->name = $request->name;
        $wisma->address = $request->address;
        $wisma->telephone = $request->telephone;

        $image = $request->file('photo');
    
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);
    
        return response()->json(['success'=>$imageName]);
        

        // toastr()->success('New Wisma Added', 'Success');
        // return redirect()->route('wisma.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $wisma = Wisma::uuid($id);
        return view('wisma.edit', compact('wisma'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'address' => 'required',
            'telephone' => 'required',
            'photo' => 'required',
        ];

        $messages = [
            '*.required' => 'Field tidak boleh kosong !',
            '*.min' => 'Nama tidak boleh kurang dari 2 karakter !',
        ];

        $this->validate($request, $rules, $messages);
        // dd($request->all());

        $wisma = Wisma::uuid($id);
        $wisma->name = $request->name;
        $wisma->address = $request->address;
        $wisma->telephone = $request->telephone;

        if($request->hasfile('photo')){
            $path = public_path().'/photo'.'/wisma'.'/';
            if (!File::exists($path)) {
                File::makeDirectory($path,0775,true,true);
            }
            $file = $request->file('photo');
            

            for ($i=0; $i <count($file) ; $i++) { 
                // dd($file[$i]->getClientOriginalExtension());
                $filename[$i] = md5(uniqid(mt_rand(),true)).'.'.$file[$i]->getClientOriginalExtension();
                $resize = Image::make($file[$i]);
                $resize->resize(800,600, function($constrain){
                    $constrain->aspectRatio();
                })->save($path.$filename[$i]);
                
                $wisma->photo = $filename[$i];
                $wisma->save();
            }
        }

        toastr()->success('Wisma Edited', 'Success');
        return redirect()->route('wisma.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wisma = Wisma::uuid($id);
        $wisma->delete();

        toastr()->success('Wisma Deleted', 'Success');
        return redirect()->route('wisma.index');
    }
}
