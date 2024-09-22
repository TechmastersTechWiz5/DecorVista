<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
class OrderController extends Controller
{
    //
    public function index(Request $request)
    { 
    
        if ($request->ajax()) {    
            $orders = Order::with(['billings', 'orderdetails','users'])->get();    
            log::info($orders);
    
            return DataTables::of($orders)
                ->addIndexColumn()
                ->addColumn('customer_name', function ($model) {
                    return $model->users ? $model->users->name : '-';
                })
                ->addColumn('action', function ($model) {
                    $detailRoute = route('admin.orders.show', $model->id);
                    return '<div class="d-flex gap-2">
                        <a href="' . $detailRoute . '" class="btn btn-light btn-sm">
                            <iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon>
                        </a>
                        
                    </div>';
                })
                ->addColumn('status', function ($model) {
                    return view('admin.layouts.action.statustoggle', [
                        'status' => $model->status,
                        'id' => $model->id
                    ]);
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }
    
        return view('admin.orders.index');
    }

    public function show($id)
    {

        // Fetch the blog by ID
        $order = Order::with(['billings', 'orderdetails','users'])->find($id);
    
        // Check if the order was found
        if (!$order) {
            return response()->json([
                'status' => 'warning',
                'message' => 'order not found',
                'data' => null,
            ], 404);
        }
        return view(  'admin.orders.show', compact('order'));
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
            $Order = Order::find($request->id);
            if ($Order == null) {
                return response()->json([
                    'status' => 'warning',
                    'message' => 'Order Not Found',
                ]);
            }
            $status = $Order->status == 1 ? 2 : 1;
            $Order->status  = $status;
            $Order->save();
            return response()->json([
                'status' => 'success',
                'message' => 'Order Status Updated successfully',
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
