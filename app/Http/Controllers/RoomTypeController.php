<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeRoom;
use App\Models\Wisma;

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
                ->editColumn('photo', function($row){
                    $url = asset('photo');
                    return '<image style="width: 150px; height: 150px;"  src="'.$url.'/'.$row->photo.'" alt="">';
                })
                ->editColumn('price',function($row){
                    return $row->price ? 'Rp.'.' '.number_format($row->price,2) : '' ;
                })
                ->editColumn('room_type', function($row){
                    switch ($row->room_type) {
                        case 'kamar-hotel' :
                            return '<span class="badge badge-primary">Kamar Hotel</span>';
                            break;
                        case 'aula' :
                            return '<span class="badge badge-primary">Aula</span>';
                            break;
                        case 'room-meeting' :
                            return '<span class="badge badge-primary">Room Meeting</span>';
                            break;
                        case 'ruko' :
                            return '<span class="badge badge-primary">Ruko</span>';
                            break;
                    }
                })
                ->addColumn('action', function ($row) {
                    return '
                            <a class="btn btn-success btn-sm btn-icon waves-effect waves-themed" href="' . route('room.edit', $row->uuid) . '"><i class="fal fa-edit"></i></a>
                            <a class="btn btn-danger btn-sm btn-icon waves-effect waves-themed delete-btn" data-url="' . URL::route('room.destroy', $row->uuid) . '" data-id="' . $row->uuid . '" data-token="' . csrf_token() . '" data-toggle="modal" data-target="#modal-delete"><i class="fal fa-trash-alt"></i></a>';
                })
                ->removeColumn('id')
                ->removeColumn('uuid')
                ->rawColumns(['action','photo','room_type'])
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
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ];

            $messages = [
                '*.required' => 'Field tidak boleh kosong !',
                '*.min' => 'Nama tidak boleh kurang dari 2 karakter !',
            ];

            $this->validate($request, $rules, $messages);
            // dd($request->all());

            $price = $request->price;
            $formattedprice = str_replace(',', '', $price);

            $room = new TypeRoom();
            $room->id_wisma = $request->id_wisma;
            $room->room_type = $request->room_type;
            $room->name = $request->name;
            $room->price = $formattedprice;
            $room->facility = $request->facility;
            $room->photo = $request->photo;

            if ($image = $request->file('photo')) {
                $destinationPath = 'photo/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $room->photo = "$profileImage";
            }

            $room->save();

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
        ];

        $messages = [
            '*.required' => 'Field tidak boleh kosong !',
            '*.min' => 'Nama tidak boleh kurang dari 2 karakter !',
        ];

        $this->validate($request, $rules, $messages);
        // dd($request->all());

        $price = $request->price;
        $formattedprice = str_replace(',', '', $price);

        $room = TypeRoom::uuid($id);
        if($request->hasFile('photo')){

            // user intends to replace the current image for the category.  
            // delete existing (if set)
        
            if($oldImage = $room->photo) {
        
                unlink(public_path('photo/') . $oldImage);
            }
        
            // save the new image
            $image = $request->file('photo');
            $destinationPath = 'photo/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $room->photo = "$profileImage";
        }

        $room->id_wisma = $request->id_wisma;
        $room->room_type = $request->room_type;
        $room->name = $request->name;
        $room->price = $formattedprice;
        $room->facility = $request->facility;

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
        $photo = public_path('photo/').$room->photo;
        if(file_exists($photo)){
            unlink($photo);
        }
        $room->delete();

            toastr()->success('Room Type Deleted', 'Success');
            return redirect()->route('room.index');
    }
}
