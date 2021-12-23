<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\MediaSocial;
use App\Models\TypeRoom;
use App\Models\Wisma;
use App\Models\About;


class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sosmed = MediaSocial::all();
        $wisma = Wisma::all();
        $about = About::all();
        $room = TypeRoom::all();

        return view('pages.home', compact( 'sosmed', 'room', 'wisma', 'about'));
    }


    public function wisma()
    {
        $wisma = Wisma::all();
        return view('pages.tipe-wisma');
    }

    public function about()
    {
        $about = About::all();
        return view('pages.about');
    }

    public function kamar()
    {
        $getRoom = TypeRoom::uuid($id);
        $room = TypeRoom::all()->where('id_wisma', 'like', $getRoom );
        return view('pages.spbu-batangtoru', compact('getRoom, room'));
    }

    public function order()
    {
        $telephone = Wisma::uuid($id);
        $wismaSPBU = Wisma::all()->where('telephone', 'like' $telephone);
        return view('pages.order', compact('telephone, wismaSPBU'));
    }
}
