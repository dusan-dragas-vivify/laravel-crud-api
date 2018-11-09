<?php
/**
 * Created by PhpStorm.
 * User: Vivify
 * Date: 11/9/18
 * Time: 9:46 AM
 */

namespace App\Repositories;

interface IUserRepository
{
    public function index();
    public function store($data);
    public function show($id);
    public function update($data, $id);
    public function destroy($id);

}