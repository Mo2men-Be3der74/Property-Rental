<?php

namespace App\Http\Controllers;
use app\Http\Requests\SearchRequest;
use Illuminate\Http\Request;
use App\Models\Flat;
class HomeController extends Controller
{
   public function index(){
      $flats = Flat::latest()->get();
      return view('homepage.home', compact('flats'));
   }

   public function search(Request $request)
    {
        return view('searchPage.search');
   }
}
