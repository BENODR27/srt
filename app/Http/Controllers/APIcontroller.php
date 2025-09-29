<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;


class APIcontroller extends Controller
{
    public function index()
    {
        // Logic to retrieve all users
        $users = User::all();

        // Send a JSON response
        return response()->json($users);
    }

    public function store(Request $request)
    {
        // Logic to create a new user

        // Send a JSON response
        return response()->json(['message' => 'User created successfully'], 201);
    }

    public function update(Request $request, $id)
    {
        // Logic to update an existing user

        // Send a JSON response
        return response()->json(['message' => 'User updated successfully']);
    }

    public function destroy($id)
    {
        // Logic to delete an existing user

        // Send a JSON response
        return response()->json(['message' => 'User deleted successfully']);
    }

}
