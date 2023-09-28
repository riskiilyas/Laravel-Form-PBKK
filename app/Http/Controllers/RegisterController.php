<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index() {
        return view('register');
    }

    // public function store(Request $request) {

    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|unique:users',
    //         'password' => 'required|string|min:8',
    //         'profile_picture' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Max 2MB
    //     ]);

    //     return redirect()->route('register.view')->with('success', 'Registration successful!')->with('request', $request);
    // }

    public function store(Request $request)
{
    // Validate the input
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'address' => 'required',
        'email' => 'required|email',
        'age' => 'required|numeric|min:17|max:100',
        'height' => 'required|numeric|min:100',
        'credit' => 'required|numeric|between:2.50,99.00',
        'image' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Max 2MB
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $fileName = time() . '.' . $request->image->extension();
    $request->image->storeAs('public/images', $fileName);

    // // Handle image upload
    // if ($request->hasFile('image')) {
    //     $imagePath = $request->file('image')->store('profile_images', 'public');
    // } else {
    //     $imagePath = null;
    // }

    // Save other user data to the database (e.g., User model)

    // Redirect to a page to display the data, including the image
    return view('registration-success', [
        'imagePath' => $fileName,
        'name' => $request->input('name'),
        'address' => $request->input('address'),
        'email' => $request->input('email'),
        'age' => $request->input('age'),
        'height' => $request->input('height'),
        'credit' => $request->input('credit'),
        'successMessage' => 'Registration successful!'
    ]);}
}
