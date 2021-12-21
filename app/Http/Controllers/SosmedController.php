<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MediaSocial;

use Auth;
use DataTables;
use URL;
use Helper;
use Image;

class SosmedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sosmed = MediaSocial::all();
        if (request()->ajax()) {
            $data = MediaSocial::get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('sosmed', function($row){
                    switch ($row->sosmed) {
                        case 'instagram' :
                            return '<span class="badge badge-primary">Instagram</span>';
                            break;
                        case 'whatsapp' :
                            return '<span class="badge badge-primary">Whatsapp</span>';
                            break;
                        case 'facebook' :
                            return '<span class="badge badge-primary">Facebook</span>';
                            break;
                    }
                })
                ->addColumn('action', function ($row) {
                    return '
                            <a class="btn btn-success btn-sm btn-icon waves-effect waves-themed" href="' . route('sosmed.edit', $row->uuid) . '"><i class="fal fa-edit"></i></a>
                            <a class="btn btn-danger btn-sm btn-icon waves-effect waves-themed delete-btn" data-url="' . URL::route('sosmed.destroy', $row->uuid) . '" data-id="' . $row->uuid . '" data-token="' . csrf_token() . '" data-toggle="modal" data-target="#modal-delete"><i class="fal fa-trash-alt"></i></a>';
                })
                ->removeColumn('id')
                ->removeColumn('uuid')
                ->rawColumns(['action','sosmed'])
                ->make(true);
        }

        return view('sosmed.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sosmed.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'sosmed' => 'required',
            'name' => 'required',
        ];

        $messages = [
            '*.required' => 'Field tidak boleh kosong !',
            '*.min' => 'Nama tidak boleh kurang dari 2 karakter !',
        ];

        $this->validate($request, $rules, $messages);
        // dd($request->all());

        $sosmed = new MediaSocial();
        $sosmed->sosmed = $request->sosmed;
        $sosmed->name = $request->name;
        $sosmed->save();

        toastr()->success('New Sosmed Added', 'Success');
        return redirect()->route('sosmed.index');
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
        $sosmed = MediaSocial::uuid($id);
        return view('sosmed.edit', compact('sosmed'));
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
            'sosmed' => 'required',
            'name' => 'required',
        ];

        $messages = [
            '*.required' => 'Field tidak boleh kosong !',
            '*.min' => 'Nama tidak boleh kurang dari 2 karakter !',
        ];

        $this->validate($request, $rules, $messages);
        // dd($request->all());

        $sosmed = MediaSocial::uuid($id);
        $sosmed->sosmed = $request->sosmed;
        $sosmed->name = $request->name;
        $sosmed->save();

        toastr()->success('Sosmed Edited', 'Success');
        return redirect()->route('sosmed.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sosmed = MediaSocial::uuid($id);
        $sosmed->delete();

        toastr()->success('Sosmed Deleted', 'Success');
        return redirect()->route('sosmed.index');
    }
}
