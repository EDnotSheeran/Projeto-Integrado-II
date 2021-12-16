<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventParticipants;

class CertificateController extends Controller
{
    function index()
    {

        $participants = EventParticipants::with('event')->where(['user_id' => auth()->user()->id, ['checked_in_at', '!=', 'null']])->get();
        // return $participants;
        return view('certificate.index', compact('participants'));
    }
}
