<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    // Action
    public function index(Request $request){
        $useres = [
          ['id'=>1,'nom'=>'akkaoui','prenom'=>'hamza','specialite'=>'GI2'],
          ['id'=>2,'nom'=>'chakiri','prenom'=>'yassin','specialite'=>'GI1'],
          ['id'=>3,'nom'=>'anassi','prenom'=>'hamid','specialite'=>'GC1'],
          ['id'=>4,'nom'=>'baqal','prenom'=>'manar','specialite'=>'GEER1'],
          ['id'=>5,'nom'=>'alaoui','prenom'=>'walid','specialite'=>'GM1']
        ];
        return view('home',compact('useres'));
    }
}
