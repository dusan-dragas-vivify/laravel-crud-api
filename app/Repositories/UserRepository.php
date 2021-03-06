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
        try{
            return $response = DB::insert('INSERT INTO users (first_name, last_name, email, password, company, country, created_at, updated_at) 
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
        }catch (\Exception $exception) {
            return response()->json([
                'status'    => $exception->getCode(),
                'message'   => $exception->getMessage()
            ]);
        }
    }

    public function index()
    {
        return $response = DB::select('SELECT * FROM users');
    }

    public function show($id)
    {
        return $response = DB::select("SELECT * FROM users WHERE id=$id");
    }

    public function update($data, $id)
    {
        $data = json_decode($data->getContent(), true);
        return $response = DB::table('users')->where('id', $id)->update($data);
    }

    public function destroy($id)
    {
        return $response = DB::delete("DELETE FROM users WHERE id=$id");
    }


}