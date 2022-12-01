<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:students'],
            'matricNo' => ['required', 'string', 'max:255'],
            'phoneNo' => ['required', 'string', 'max:255'],
            'studCourse' => ['required', 'string', 'max:255'],
            'roomNo' => ['required', 'string', 'max:255'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'matricNo' => $input['matricNo'],
            'phoneNo' => $input['phoneNo'],
            'studCourse' => $input['studCourse'],
            'roomNo' => $input['roomNo'],

            'password' => Hash::make($input['password']),
        ]);
    }
}
