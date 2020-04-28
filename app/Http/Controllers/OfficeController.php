<?php

namespace App\Http\Controllers;


use App\Office;
use App\PhoneNumber;
use Faker\Provider\Base;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class OfficeController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if($request->has('text')){
            $offices = Office::where('user_id', auth()->user()->id)->where($request['field'],'LIKE','%'.$request['text'].'%')->orderBy('id','DESC')->paginate(30);
        }else{
            $offices = Office::where('user_id', auth()->user()->id)->orderBy('id','DESC')->paginate(30);
        }
        return view('office.list', compact('offices'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('office.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate(request(), [
            'office_name' => 'required|string',
            'phone[]'=>'numeric',

        ]);
//        dd($request->all());
        Office::create([
            'office_name' => $request['office_name'],
            'city_name' => $request['city_name'],
            'activity' => $request['activity'],
            'expert_name' => $request['expert_name'],
            'manager_name' => $request['manager_name'],
            'sell_model' => $request['sell_model'],
            'description' => $request['description'],
            'brand' => $request['brand'],
            'address' => $request['address'],
            'user_id' => auth()->user()->id,
        ]);
        foreach ($request->input('name') as $key => $value) {
            if (!(is_null($value)&&is_null($request->input('phone')[$key]))) {
                PhoneNumber::create([
                    'phone' => $request->input('phone')[$key],
                    'name' => $request->input('name')[$key],
                    'office_id' => Office::get()->last()->id,
                ]);
            }
        }
        return redirect(route('office.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Office $office
     * @return \Illuminate\Http\Response
     */
    public function show(Office $office)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Office $office
     * @return \Illuminate\Http\Response
     */
    public function edit(Office $office)
    {
        //
        return view('office.edit', compact('office'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Office $office
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Office $office)
    {
        //
        $this->validate(request(), [
            'office_name' => 'required|string',
            'phone[]'=>'numeric',
        ]);
        $office->PhoneNumbers()->delete();
        foreach ($request->input('name') as $key => $value) {
            if (!is_null($value)) {
                PhoneNumber::create([
                    'phone' => $request->input('phone')[$key],
                    'name' => $request->input('name')[$key],
                    'office_id' => $office->id,
                ]);
            }
        }

        $office->update($request->all());
        return redirect(route('office.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Office $office
     * @return \Illuminate\Http\Response
     */
    public function destroy(Office $office)
    {
        //
        $office->PhoneNumbers()->delete();
        $office->delete();
        return redirect()->back();
    }

    public function all(Request $request)
    {
        //
        if (Gate::allows('see_all_offices')) {
            if($request->has('text')) {
                $offices = Office::where($request['field'],'LIKE','%'.$request['text'].'%')->orderBy('id', 'DESC')->paginate(30);

            }else {
                $offices = Office::orderBy('id', 'DESC')->paginate(30);

            }
            return view('office.list_all', compact('offices'));
        } else {
            return abort(401);

        }
    }



}
