<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Backend\Admin\CommonController;
use Illuminate\Http\Request;
use App\Models\Module;
use App\User;
use Auth;


class StatisticsController extends CommonController
{
    public $path ='admin.modules.statistics.';

    protected function validators(array $data)
    {
        return Validator::make($data, [
            'title' => ['required', 'string', 'max:100', 'unique:modules'],
            'slug' => ['required', 'string', 'max:100', 'unique:modules']
        ]);
    }

    public function list()
    {
        $Modules = Module::get();
        return view($this->path."list")->with(['Modules' => $Modules]);
    }

    public function create()
    {
        return view($this->path."create");
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
