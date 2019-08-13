<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;

class SearchController extends Controller
{
    public function getResults(Request $request)
    {
        $query = $request->input('query');
        
        if (!$query)
        {
            return redirect()->route('/');
        }

        $users = User::where('name', 'LIKE', "%{$query}%")
                        ->orWhere('username', 'LIKE', "%{$query}%")
                        ->simplePaginate(5);

        return view('search.results')->with('users', $users);
    }
}
