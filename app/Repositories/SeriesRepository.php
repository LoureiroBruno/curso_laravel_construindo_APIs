<?php

namespace App\Repositories;

use App\Http\Requests\SeriesFormRequestCreate;
use App\Http\Requests\SeriesFormRequestUpdate;
use Illuminate\Http\Request;
use App\Models\Series;

interface SeriesRepository
{
    public function add(SeriesFormRequestCreate $request): Series;
    public function update(SeriesFormRequestUpdate $request, Series $series);
}