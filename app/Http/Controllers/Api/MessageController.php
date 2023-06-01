<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMessageRequest;
use App\Models\Message;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => "required|string|min:2|max:255",
            'email' => "required|email|min:8|max:255",
            'text' => "required|string|min:8|max:2000",
            'apartment_id' => "required"
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()]);
        }
        $message = Message::create($data);
        return response()->json(['success' => true]);
    }
}
