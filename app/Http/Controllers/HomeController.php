<?php

namespace App\Http\Controllers;
use app\Http\Requests\SearchRequest;
use Illuminate\Http\Request;
use App\Models\Flat;
class HomeController extends Controller
{
   public function index(){
      $flats = Flat::latest()->paginate(4);
      return view('homepage.home', compact('flats'));
   }


public function search(Request $request)
{
    // 1. PHP Server-Side Validation
    $request->validate([
        'location' => 'nullable|string|max:100',
    ]);

    // Start building the query
    $query = Flat::query();

    // 2. Search for similar locations using 'LIKE'
    if ($request->filled('location')) {
        $searchTerm = trim($request->location);
        
        // Finds any location containing the search term (e.g., "Dubai" matches "Downtown Dubai")
        $query->where('location', 'LIKE', '%' . $searchTerm . '%');
    }

    // 3. Get results with pagination (12 items per page) and keep search query in pagination links
    $flats = $query->latest()->paginate(12)->withQueryString();

    return view('search.search', compact('flats'));
}

}
