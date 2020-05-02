<?php

namespace App\Http\Controllers;

use App\Address;
use App\Country;
use App\State;
use App\City;
use App\User;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index($userId)
    {

        $data = [];
        $data['user'] = User::findOrFail($userId);
        $data['addresses'] = Address::where('userId', $userId)->get();
        $data['cities'] = [];
        $data['states'] = [];
        $data['countries'] = [];
        foreach ($data['addresses'] as $address) {
            $data['cities'][] = City::findOrFail($address->getCityId());
        }
        foreach ($data['cities'] as $city) {
            $data['states'][] = State::findOrFail($city->getStateId());
        }
        foreach ($data['states'] as $state) {
            $data['countries'][] = Country::findOrFail($state->getCountryId());
        }
        return view('address.index')->with('data', $data);
    }


    public function create($userId)
    {
        $data = [];
        $data['user'] = User::findOrFail($userId);
        $data['countries'] = Country::all();
        $data['states'] = State::all();
        $data['cities'] = City::all();
        return view('address.create')->with('data', $data);
    }

    public function store(Request $request, $userId)
    {
        $request['userId'] = $userId;
        Address::validate($request);
        $attributes = $request->only(['userId', 'cityId', 'deliveryAddress', 'postalCode']);
        Address::create($attributes);

        return back()->with('success', true);
    }

    public function edit($userId, $addressId)
    {
        $data = [];
        $data['user'] = User::findOrFail($userId);
        $data['address'] = Address::findOrFail($addressId);
        $data['countries'] = Country::all();
        $data['states'] = State::all();
        $data['cities'] = City::all();
        $data['city'] = City::findOrFail($data['address']->getCityId());
        $data['state'] = State::findOrFail($data['city']->getStateId());
        $data['country'] = Country::findOrFail($data['state']->getCountryId());

        return view('address.edit')->with('data', $data);
    }

    public function update(Request $request, $userId, $addressId)
    {
        $request['userId'] = $userId;
        Address::validate($request);
        $address = Address::findOrFail($addressId);
        echo $request['cityId'];
        $address->update($request->only(['userId', 'cityId', 'deliveryAddress', 'postalCode']));

        return redirect()->route('address.index', $userId);
    }

    public function destroy($userId, $addressId)
    {
        Address::destroy($addressId);

        return redirect()->route('address.index', $userId);
    }
}
