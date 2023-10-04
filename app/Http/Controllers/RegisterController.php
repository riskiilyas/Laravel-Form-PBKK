<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class RegisterController extends Controller
{
    public function home()
    {
        $users = User::all(); // Retrieve all users from the 'users' table
    
        return view('welcome', compact('users'));
    }


    public function index() {
        return view('register');
    }

    public function store(Request $request)
{
    // Validate the input
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'address' => 'required',
        'email' => 'required|email',
        'age' => 'required|numeric|min:17|max:100',
        'height' => 'required|numeric|min:100',
        'credit' => 'required|numeric|between:2.50,99.99',
        'image' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Max 2MB
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $fileName = time() . '.' . $request->image->extension();
    $request->image->storeAs('public/images', $fileName);

    $user = new User;
    $user->name = $request->input('name');
    $user->address = $request->input('address');
    $user->email = $request->input('email');
    $user->age = $request->input('age');
    $user->height = $request->input('height');
    $user->credit = $request->input('credit');
    $user->image_path = $fileName; // Store the image path

    // Save the user to the database
    $user->save();


    // // Redirect to a page to display the data, including the image
    // return view('registration-success', [
    //     'imagePath' => $fileName,
    //     'name' => $request->input('name'),
    //     'address' => $request->input('address'),
    //     'email' => $request->input('email'),
    //     'age' => $request->input('age'),
    //     'height' => $request->input('height'),
    //     'credit' => $request->input('credit'),
    //     'successMessage' => 'Registration successful!'
    // ]);
    $users = User::all(); // Retrieve all users from the 'users' table
    
    return view('welcome', compact('users'));    
}
}
