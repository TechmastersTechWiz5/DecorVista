<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
class ContactUsController extends Controller
{
    //
    public function index(Request $request)
    { 
    
        if ($request->ajax()) {    
            $ContactUss = ContactUs::get();    
            log::info($ContactUss);
    
            return DataTables::of($ContactUss)
                ->addIndexColumn()
                
                ->addColumn('action', function ($model) {
                    $editRoute = route('admin.blogs.edit', $model->id);
                    $detailRoute = route('admin.blogs.show', $model->id);
                    return '<div class="d-flex gap-2">
                        <a href="' . $detailRoute . '" class="btn btn-light btn-sm">
                            <iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon>
                        </a>
                        <a href="' . $editRoute . '" class="btn btn-soft-primary btn-sm">
                            <iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon>
                        </a>
                    </div>';
                })
                ->addColumn('status', function ($model) {
                    return view('admin.layouts.action.statustoggle', [
                        'status' => $model->status,
                        'id' => $model->id
                    ]);
                })
                ->rawColumns(['image', 'action', 'status'])
                ->make(true);
        }
    
        return view('admin.contactus.index');
    }

    public function show($id)
    {

        // Fetch the blog by ID
        $ContactUs = ContactUs::with(['billings', 'ContactUsdetails','users'])->find($id);
    
        // Check if the ContactUs was found
        if (!$ContactUs) {
            return response()->json([
                'status' => 'warning',
                'message' => 'ContactUs not found',
                'data' => null,
            ], 404);
        }
        return view(  'admin.ContactUss.show', compact('ContactUs'));
    }

    public function status(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => 'warning',
                    'message' => $validator->errors()->first(),
                ]);
            }
            $ContactUs = ContactUs::find($request->id);
            if ($ContactUs == null) {
                return response()->json([
                    'status' => 'warning',
                    'message' => 'ContactUs Not Found',
                ]);
            }
            $status = $ContactUs->status == 1 ? 2 : 1;
            $ContactUs->status  = $status;
            $ContactUs->save();
            return response()->json([
                'status' => 'success',
                'message' => 'ContactUs Status Updated successfully',
                'data' => null,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'data' => null,
            ], 500);
        }
    }



    
}
