<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortalController extends Controller
{
    /**
     * Show the company portal homepage.
     */
    public function index()
    {
        return view('portal.home');
    }

    /**
     * About page
     */
    public function about()
    {
        return view('portal.about');
    }

    /**
     * Services page
     */
    public function services()
    {
        return view('portal.services');
    }

    /**
     * Contact page
     */
    public function contact()
    {
        return view('portal.contact');
    }
}
