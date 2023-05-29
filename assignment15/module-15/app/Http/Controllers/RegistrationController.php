<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationFormRequest;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    function register(RegistrationFormRequest $request){
        // Validation has already been done by the RegistrationFormRequest

        // Retrieve the validated form data
        $validatedData = $request->validated();

        // Perform the registration logic using the validated data
        // For example, create a new user in the database

        return "Registration successful";
    }
}
