<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\BaseController;
use App\Models\Member;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Member::get();
        if ($data) {
            $response = $this->sendResponse($data);
        } else {
            $msg = ['message' => 'Có lỗi xảy ra'];
            $response = $this->sendError($msg);
        }
        return $response;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string',
            'address' => 'required|string|max:255',
        ]);
        $member = new Member([
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
        ]);
        if ($member->save()) {
            $msg = ['message' => 'Thành viên đã được tạo thành công'];
            $response = $this->sendResponse($msg);
        } else {
            $msg = ['message' => 'Có lỗi xảy ra'];
            $response = $this->sendError($msg);
        }
        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Member::find($id);
        if ($data) {
            $response = $this->sendResponse($data);
        } else {
            $msg = ['message' => 'Có lỗi xảy ra'];
            $response = $this->sendError($msg);
        }
        return $response;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
//        $request->validate([
//            'username' => 'required|string|max:255',
//            'password' => 'required|string|max:255',
//            'name' => 'required|string|max:255',
//            'email' => 'required|email|max:255',
//            'phone' => 'required|string',
//            'address' => 'required|string|max:255',
//        ]);
//        dd("cc");

        $member=Member::find($id);
        if ($member) {
            $member->update($request->all());
            $msg = ['message' => 'Cập nhật thành công','data'=>$member];
            $response = $this->sendResponse($msg);
        } else {
            $msg = ['message' => 'Có lỗi xảy ra'];
            $response = $this->sendError($msg);
        }
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $member = Member::find($id);
        if ($member->delete()) {
            $data = ['message' => 'Thành viên đã được tạo thành công','data'=>$member];
            $response = $this->sendResponse($data);
        } else {
            $msg = ['message' => 'Có lỗi xảy ra'];
            $response = $this->sendError($msg);
        }
        return $response;
    }
}
