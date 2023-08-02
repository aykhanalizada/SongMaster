<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersonRequest;
use Illuminate\Database\Schema\IndexDefinition;
use Illuminate\Http\Request;
use App\Models\Person;

class PersonController extends Controller
{

    public function index()
    {
        $data = Person::all();
        return view('contacts.index')-> with('people', $data);
    }
    public function create()
    {

        return view("contacts.create");
    }
    public function store(StorePersonRequest $request)
    {
        $fname = $request->first_name;
        $lname = $request->last_name;
        $father = $request->father_name;
        $bdate = $request->birth_date;
        $cstatus = $request->civil_status == 'Evli' ? '1' : '0';



        Person::create([
            "first_name" => $fname,
            "last_name" => $lname,
            "father_name" => $father,
            "birth_date" => $bdate,
            "civil_status" => $cstatus,
        ]);
        return redirect(route('person.index'))->with('success', 'Person has been created successfully.');
    }





    public function delete($id)
    {
        $data = Person::find($id);

        if ($data) {
            $data->delete();
        }

        return redirect(route('person.index'))->with('success', 'Person has been deleted successfully.');
    }



    function show($id)
    {
        $data = Person::find($id);

        if (!$data) {
            return abort('404');
        }
        return view('contacts.edit', ['data' => $data]);
    }

public function update(StorePersonRequest $req)
{
    $data = Person::find($req->id);

    if (!$data) {
        abort('404');
    }
        $data->first_name = $req->first_name;
        $data->last_name = $req->last_name;
        $data->father_name = $req->father_name;
        $data->birth_date = $req->birth_date;
        $data->civil_status = $req->civil_status;
        $data->save();

        return redirect(route('person.index'))->with('success', 'Person has been updated successfully.');
    }





}
