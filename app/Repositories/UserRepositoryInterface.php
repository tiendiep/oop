<?php

namespace App\Repositories;

use App\Models\Users;
use App\Models\Member;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    public function all(): Collection;

    public function create(array $data): Users;

    public function findById($id): Users;

    public function update($id, array $data): Users;

    public function delete($id): void;

    public function search($name = null, $cityName = null, $date = null, $districtName = null, $orderBy = 'name', $direction = 'asc'): Collection;
}
