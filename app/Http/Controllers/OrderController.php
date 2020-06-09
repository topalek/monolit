<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function orderView(Request $request) {
        if ($request->ajax()) {
            $validate = Validator::make($request->all(), [
                'name' => 'required|string',
                'phone' => 'required|numeric|digits_between:7,13'
            ]);

            if ($validate->fails()) {
                return response()
                    ->json([
                        'status' => 500,
                        'message' => 'invalid_data'
                    ], 500);
            }

            $data = [
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'page_url' => $request->input('id'),
            ];

            Mail::send('emails.order-view-apartment', $data, function ($message) {
                $message->from('support@monolit.sale', 'MONOLIT');
                $message->to('monolit.sale18@gmail.com');
            });

            return response()
                ->json([
                    'status' => 200,
                    'message' => 'success'
                ], 200);
        }
        abort(503);
    }

    public function contacts(Request $request) {
        if ($request->ajax()) {
            $validate = Validator::make($request->all(), [
                'name' => 'required|string',
                'email' => 'required|email',
                'message' => 'required'
            ]);

            if ($validate->fails()) {
                return response()
                    ->json([
                        'status' => 500,
                        'message' => 'invalid_data'
                    ], 500);
            }

            $data = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'messages' => $request->input('message'),
            ];

            Mail::send('emails.contacts', $data, function ($message) {
                $message->from('support@monolit.sale', 'MONOLIT');
                $message->to('monolit.sale18@gmail.com');
            });

            return response()
                ->json([
                    'status' => 200,
                    'message' => 'success'
                ], 200);
        }
        abort(503);
    }
}
