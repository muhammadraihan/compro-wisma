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

        return view('pages.home', compact('sosmed', 'room', 'wisma', 'about'));
    }


    public function wisma($id)
    {
        $wisma = Wisma::uuid($id);
        $room = TypeRoom::all()->where('id_wisma', 'like', $wisma->uuid);
        return view('pages.wisma', compact('wisma', 'room'));
    }

    public function tipeWisma()
    {
        $wisma = Wisma::all();
        return view('pages.tipe-wisma', compact('wisma'));
    }

    public function about()
    {
        $about = About::all();
        return view('pages.about', compact('about'));
    }

    public function kamar($id)
    {
        $getRoom = TypeRoom::uuid($id);
        $room = TypeRoom::all()->where('id_wisma', 'like', $getRoom);
        return view('pages.wisma', compact('getRoom, room'));
    }

    public function order($id)
    {
        $telephone = Wisma::uuid($id);
        $wismaSPBU = Wisma::all()->where('telephone', 'like', $telephone);
        return view('pages.order', compact('telephone, wismaSPBU'));
    }
}
