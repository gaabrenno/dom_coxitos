<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $countUser = User::all()->count();
        $usersData = User::select([
            DB::raw('YEAR(created_at) as years'),
            DB::raw('COUNT(*) as total'),
        ])
        ->groupBy('years')
        ->orderBy('years', 'asc')
        ->get();

        foreach($usersData as $user){
            $years[] = $user->years;
            $total[] = $user->total;
        }

        $userLabel = "'Comparativo de cadastro de usuários'";
        $yearsUser = implode(',', $years);
        $totalUser = implode(',', $total);

        return view('admin.dashboard', compact('countUser', 'userLabel', 'yearsUser', 'totalUser'));
    }
}
