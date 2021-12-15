<?php

namespace App\Http\Controllers;

use App\Models\Repository;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::where('role', '=', 'USER')->count();
        $dosen = User::where('role', '=', 'DOSEN')->count();
        $repository = Repository::count();
        
        return view('pages.dashboard', compact('user', 'dosen', 'repository'));
    }
}
