<?php
/**
 * Created by PhpStorm.
 * User: Vivify
 * Date: 11/9/18
 * Time: 9:45 AM
 */

namespace App\Repositories;


use Illuminate\Support\Facades\DB;

class UserRepository implements IUserRepository
{
    public function store($data)
    {
        // TODO validation
        $response = DB::insert('INSERT INTO users (first_name, last_name, email, password, company, country) 
        VALUES (?, ?, ?, ?, ?, ?)', [$data->first_name, $data->last_name, $data->email, $data->password, $data->company, $data->country]);

        return $response;
    }


    public function index()
    {
        $response = DB::select('SELECT * FROM users');
        return $response;
    }

    public function show($id)
    {
        // TODO: Implement show() method.
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