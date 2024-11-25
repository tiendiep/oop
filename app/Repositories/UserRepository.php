<?php

namespace App\Repositories;

use App\Models\Users;
use App\Models\City;
use App\Models\Member;
use App\Models\District;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements UserRepositoryInterface
{
    public function all(): Collection
    {

        return Users::all();
    }

    public function create(array $data): Users
    {
        return Users::create($data);
    }

    public function findById($id): Users
    {
        return Users::findOrFail($id);
    }

    public function update($id, array $data): Users
    {
        $user = $this->findById($id);
        $user->update($data);
        return $user;
    }

    public function delete($id): void
    {
        $user = $this->findById($id);
        $user->delete();
    }

   
    public function search($name = null, $cityName = null, $date = null, $districtName = null, $orderBy = 'name', $direction = 'asc'): Collection
{
    $query = Users::query();

    if ($name) {
        $query->where('name', 'like', '%' . $name . '%');
    }

    if ($cityName) {
        $query->join('addresses', 'addresses.user_id', '=', 'user.id')
        ->join('districts', 'addresses.district_id', '=', 'districts.id')
        ->join('cities', 'cities.id', '=', 'districts.city_id')
        ->where('cities.citynameVn', 'like', '%' . $cityName . '%') 
        ->select('user.*')
        ->get();
    }

    if ($districtName) {
        $query->join('addresses', 'addresses.user_id', '=', 'user.id')
        ->join('districts', 'addresses.district_id', '=', 'districts.id')
        ->join('cities', 'cities.id', '=', 'districts.city_id')
        ->where('districts.districtVn', 'like', '%' . $districtName . '%')
        ->select('user.*')
        ->get();
    }

    if ($date) {
        $query->whereYear('date', '=', $date);
    }

    $query->join('addresses as a', 'user.id', '=', 'a.user_id')
    ->join('districts as d1', 'a.district_id', '=', 'd1.id')
    ->join('cities as c1', 'd1.city_id', '=', 'c1.id')
    ->select('user.id as user_id', 'user.name', 'user.gender', 'user.date', 'c1.citynameVn as city_name', 'd1.districtVn as district_name');

    if (in_array($orderBy, ['name', 'city_name', 'district_name', 'date'])) {
        $query->orderBy($orderBy, $direction);
    }

    $users = $query->get();

    return $users;
}


    }

