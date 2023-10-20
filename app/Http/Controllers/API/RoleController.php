<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\BaseController;
use App\Http\Requests\RoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Role::get();
        $response = $this->sendResponseMessage($data);
        return $response;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $member = new Role([
            'name' => $request->input('name'),
        ]);
        $msg = ['message' => 'Thành viên đã được tạo thành công'];
        $response = $this->sendResponseMessage($member->save(),$msg);
        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Role::find($id);
        $response = $this->sendResponseMessage($data);
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
    public function update(RoleRequest $request, string $id)
    {
        $member = Role::find($id);
        $msg = ['message' => 'Cập nhật thành công'];
        $response = $this->sendResponseMessage($member&&$member->update($request->all()),$msg);
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $member = Role::find($id);
        $msg = ['message' => 'Vai trò đã được xoá thành công','data' => $member];
        $response = $this->sendResponseMessage($member !== null&&$member->delete(),$msg);
        return $response;
    }
}
