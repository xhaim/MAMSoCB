<?php

namespace App\Http\Controllers;

use App\Models\Registry;
use App\Models\Association;
use Illuminate\Http\Request;

class Dash extends Controller
{
    public function showRowCount()
    {
        // Get the count of rows from the Registry model
        $rowCount = Registry::count();
        $GeneratedrowCount = Registry::whereNotNull('generated_id')->count();
        $AssocrowCount = Association::count();

        // Pass the count to the view
        return view('dashboard', compact('rowCount','AssocrowCount','GeneratedrowCount'));
    }




}
