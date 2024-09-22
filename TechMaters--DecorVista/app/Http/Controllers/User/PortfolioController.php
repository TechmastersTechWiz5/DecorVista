<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\PortfolioImage;  
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Validator;
use Auth;

class PortfolioController extends Controller
{
    //
    public function index()
    {
        $status = 1;
        $portfolios = Portfolio::with('designer')
                    ->where('status', $status)
                    ->get();
        log::info("Portfolio Data".$portfolios);

        return view('users.portfolio-archive', compact('portfolios'));
    }
    public function show($id)
    {
        $status = 1;
        $portfolio =  Portfolio::with(['designer','consultants'])
        ->where('status', $status)
        ->find($id);   
        log::info("Portfolio Detail Data".$portfolio);

    
        if (!$portfolio) {
            return response()->json([
                'status' => 'warning',
                'message' => 'portfolio not found',
                'data' => null,
            ], 404);
        }
        return view('users.portfolio-details', compact('portfolio'));
    }
}
