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
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
    'vardas' => ['required', 'string', 'max:255'],
    'pavarde' => ['required', 'string', 'max:255'],
    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    'password' => $this->passwordRules(),
    'roleid' => ['required', 'integer', 'exists:roles,id'],
])->validate();


        return User::create([
    'vardas' => $input['vardas'],
    'pavarde' => $input['pavarde'],
    'email' => $input['email'],
    'password' => Hash::make($input['password']),
    'roleid' => $input['roleid'],
]);

    }
}
