<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeRoom;

use Auth;
use DataTables;
use URL;
use Helper;
use Image;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $room = TypeRoom::all();
        if (request()->ajax()) {
            $data = TypeRoom::get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('id_wisma', function ($row) {
                    return $row->wisma->name;
                })
                
                ->addColumn('action', function ($row) {
                    return '
                            <a class="btn btn-success btn-sm btn-icon waves-effect waves-themed" href="' . route('room.edit', $row->uuid) . '"><i class="fal fa-edit"></i></a>
                            <a class="btn btn-danger btn-sm btn-icon waves-effect waves-themed delete-btn" data-url="' . URL::route('room.destroy', $row->uuid) . '" data-id="' . $row->uuid . '" data-token="' . csrf_token() . '" data-toggle="modal" data-target="#modal-delete"><i class="fal fa-trash-alt"></i></a>';
                })
                ->removeColumn('id')
                ->removeColumn('uuid')
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('room.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $wisma = Wisma::all()->pluck('name', 'uuid');
        return view('room.create', compact('wisma'));
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
            'id_wisma' => 'required',
            'room_type' => 'required',
            'name' => 'required',
            'price' => 'required',
            'facility' => 'required',
            'photo' => 'required',
        ];

        $messages = [
            '*.required' => 'Field tidak boleh kosong !',
            '*.min' => 'Nama tidak boleh kurang dari 2 karakter !',
        ];

        $this->validate($request, $rules, $messages);
        // dd($request->all());

        $room = new TypeRoom();
        $room->id_wisma = $request->id_wisma;
        $room->room_type = $request->room_type;
        $room->name = $request->name;
        $room->price = $request->price;
        $room->facility = $request->facility;

        if($request->hasfile('photo')){
            $path = public_path().'/photo'.'/kamar'.'/';
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
                
                $room->photo = $filename[$i];
                $room->save();
            }
        }

        toastr()->success('New Room Type Added', 'Success');
        return redirect()->route('room.index');
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
        $room = TypeRoom::uuid($id);
        $wisma = Wisma::all()->pluck('name', 'uuid');
        return view('room.edit', compact('room', 'wisma'));
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
            'id_wisma' => 'required',
            'room_type' => 'required',
            'name' => 'required',
            'price' => 'required',
            'facility' => 'required',
            'photo' => 'required',
        ];

        $messages = [
            '*.required' => 'Field tidak boleh kosong !',
            '*.min' => 'Nama tidak boleh kurang dari 2 karakter !',
        ];

        $this->validate($request, $rules, $messages);
        // dd($request->all());

        $room = TypeRoom::uuid($id);
        $room->id_wisma = $request->id_wisma;
        $room->room_type = $request->room_type;
        $room->name = $request->name;
        $room->price = $request->price;
        $room->facility = $request->facility;
        $room->photo = $request->photo;

        $room->save();


        toastr()->success('Room Type Edited', 'Success');
        return redirect()->route('room.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = TypeRoom::uuid($id);
        $room->delete();

        toastr()->success('Room Type Deleted', 'Success');
        return redirect()->route('room.index');
    }
}
