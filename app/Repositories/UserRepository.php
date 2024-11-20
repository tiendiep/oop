<?php

namespace App\Repositories;

use App\Models\Users;
use App\Models\City;
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
        $query->join('city as city1', 'user.city_id', '=', 'city1.id')
              ->where('city1.citynameVn', 'like', '%' . $cityName . '%');
    }

    if ($districtName) {
        $query->join('district as district1', 'user.district_id', '=', 'district1.id')
              ->where('district1.districtVn', 'like', '%' . $districtName . '%');
    }

    if ($date) {
        $query->whereYear('date', '=', $date);
    }

    $query->join('city as city2', 'user.city_id', '=', 'city2.id')
          ->join('district as district2', 'user.district_id', '=', 'district2.id')
          ->select('user.*', 'city2.citynameVn as city_name', 'district2.districtVn as district_name');

    if (in_array($orderBy, ['name', 'city_name', 'district_name', 'date'])) {
        $query->orderBy($orderBy, $direction);
    }

    $users = $query->get();

    return $users;
}


    }

