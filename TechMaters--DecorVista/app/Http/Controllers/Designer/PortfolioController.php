<?php

namespace App\Http\Controllers\Designer;


use App\Http\Controllers\Controller;
use App\Models\Consultant;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\PortfolioImage;
use Illuminate\Support\Facades\Auth;
use Datatables;
class PortfolioController extends Controller
{
    public function index() {
            $portfolios = Portfolio::with(['designer', 'consultants'])
                ->where('designer_id', Auth::user()->id)
                ->get();
        
            return view('designer.portfolio.index', compact('portfolios'));
        } 
    
    public function create() {
        return view('designer.portfolio.create');
    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'portfolio_link' => 'required|url|max:255', // Validation for the portfolio link
            'main_image' => 'nullable|mimes:jpg,jpeg,png,gif|max:2048', // For main image
            'timeslots' => 'required|array', // Multiple time slots
            'timeslots.*' => 'required|date', // Each time slot must be a valid date
            'messages' => 'nullable|array', // Optional messages
            'messages.*' => 'nullable|string|max:255', // Max length for each message
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 'warning',
                'message' => $validator->errors()->first(),
            ]);
        }
    
        // Create Portfolio
        $portfolio = Portfolio::create([
            'designer_id' => auth()->id(), // Assuming the designer is authenticated
            'title' => $request->title,
            'description' => $request->description,
            'portfolio_link' => $request->portfolio_link, // Store portfolio link
        ]);
    
        // Handle Main Image and store its path in the portfolio
        if ($request->hasFile('main_image')) {
            $file = $request->file('main_image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('portfolio_images/main', $fileName, 'public');
    
            // Update the portfolio with the main image path
            $portfolio->update([
                'image_path' => $filePath,
            ]);
        }
    
        // Handle Consultation Slots (multiple slots)
        foreach ($request->timeslots as $index => $timeslot) {
            Consultant::create([
                'portfolio_id' => $portfolio->id,
                'available_at' => $timeslot,
                'message' => $request->messages[$index] ?? null, // Handle optional message
            ]);
        }
    
        return response()->json([
            'status' => 'success',
            'message' => 'Portfolio created successfully!',
        ]);
    }
    


    
    


}