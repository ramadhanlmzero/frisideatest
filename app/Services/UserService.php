<?php

namespace App\Services;

use App\Models\User;
use Hash;

class UserService
{
    public function index()
    {
        $result = User::get();

        return $result;
    }

    public function show($id)
    {
        $result = User::find($id);

        return $result;
    }

    public function store($data)
    {
        $result = User::create($data);

        return $result;
    }

    public function update($id, $data)
    {
        $result = $this->show($id);

        if ($result) {
            $result->update($data);
        }
        else {
            $result = false;
        }

        return $result;
    }

    public function delete($id)
    {
        $result = $this->show($id);

        if ($result) {
            $result = $result->delete();
        } 
        else {
            $result = false;
        }

        return $result;
    }

    public function showByColumn($name, $value)
    {
        $result = User::where($name, $value)->first();

        return $result;
    }

    public function auth($data)
    {
        $result = [];

        $user = $this->showByColumn('email', $data['email']);

        if (!$user) {
            $result = (object) [
                'status' => false,
                'message' => 'Username salah!',
                'data' => []
            ];

            return $result;
        }
        
        if ($data['nim'] != $user->nim) {
            $result = (object) [
                'status' => false,
                'message' => 'Password salah!',
                'data' => []
            ];

            return $result;
        }

        $result = (object) [
            'status' => true,
            'message' => 'Login berhasil!',
            'data' => $user,
            'token' => $user->createToken('ApiToken')->plainTextToken
        ];

        return $result;
    }
}