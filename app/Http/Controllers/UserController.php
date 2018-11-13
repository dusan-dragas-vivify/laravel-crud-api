<?php

namespace App\Http\Controllers;

use App\Repositories\IUserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    private $userRepo;

    public function __construct(IUserRepository $IUserRepository)
    {
        $this->userRepo = $IUserRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = $this->userRepo->index();
        if($response)
        {
            return $response;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $validatedData = $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'company' => 'required',
                'country' => 'required',
            ]);
        }catch (ValidationException $exception){
            return response()->json([
                'status'    => $exception->status,
                'message'   => $exception->getMessage()
            ], $exception->status);
        }

        $response = $this->userRepo->store($request);
        if($response)
        {
            return response()->json([
                'status' => 200,
                'message' => 'OK'
            ], 200);
        }else{
            return response()->json([
                'status'    => 500,
                'message'   => 'An error has occurred'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $response = $this->userRepo->show($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $response = $this->userRepo->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $response = $this->userRepo->destroy($id);
    }
}
