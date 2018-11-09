<?php
/**
 * Created by PhpStorm.
 * User: Vivify
 * Date: 11/9/18
 * Time: 9:45 AM
 */

namespace App\Repositories;


use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserRepository implements IUserRepository
{
    public function store($data)
    {
        // TODO validation
        // TODO hash password
        $response = DB::insert('INSERT INTO users (first_name, last_name, email, password, company, country, created_at, updated_at) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)',
            [
                $data->first_name,
                $data->last_name,
                $data->email,
                Hash::make($data->password),
                $data->company,
                $data->country,
                Carbon::now(),
                Carbon::now()
            ]
        );

        return $response;
    }

    public function index()
    {
        $response = DB::select('SELECT * FROM users');
        return $response;
    }

    public function show($id)
    {
        $response = DB::select("SELECT * FROM users WHERE id=$id");
        return $response;
    }

    public function update($data, $id)
    {
        // TODO: Implement update() method.
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }


}