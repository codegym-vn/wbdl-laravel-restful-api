<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    function index()
    {
        $customers = Customer::all();
        return response()->json([
            "status" => "success",
            "customers" => $customers],
            200);
    }

    function store(Request $request)
    {
        try {
            $customer = new Customer();
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->address = $request->address;
            $customer->save();
            return response()->json([
                "status" => "success",
                "message" => "Create customer successfully"
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => $e->getMessage()
            ], 500);
        }
    }

    function detail($id)
    {
        try {
            $customer = Customer::find($id);
            if (empty($customer)) {
                return response()->json([
                    "status" => "error",
                    "message" => "Customer not found"
                ], 404);
            }

            return response()->json([
                "status" => "success",
                "customer" => $customer
            ], 200);
        }catch (\Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => $e->getMessage()
            ], 500);
        }

    }

    function update(Request $request, $id) {
        try {
            $customer = Customer::find($id);
            if (empty($customer)) {
                return response()->json([
                    "status" => "error",
                    "message" => "Customer not found"
                ], 404);
            }
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->address = $request->address;
            $customer->save();
            return response()->json([
                "status" => "success",
                "message" => "Update customer successfully"
            ], 201);
        }catch (\Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => $e->getMessage()
            ], 500);
        }

    }

    function destroy($id) {
        try {
            $customer = Customer::find($id);
            if (empty($customer)) {
                return response()->json([
                    "status" => "error",
                    "message" => "Customer not found"
                ], 404);
            }
            $customer->delete();
            return response()->json([
                "status" => "success",
                "message" => "Delete customer successfully"
            ], 202);
        }catch (\Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => $e->getMessage()
            ], 500);
        }
    }
}
