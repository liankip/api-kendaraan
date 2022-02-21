<?php

namespace App\Repositories;

use App\Models\Kendaraan;
use App\Repositories\KendaraanRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class KendaraanRepository implements KendaraanRepositoryInterface
{
    public function allCollectionKendaraan()
    {
        return Kendaraan::all();
    }

    public function allCollectionPenjualanKendaraan()
    {
        return Kendaraan::all();
    }

    public function allCollectionPenjualanPerkendaraan()
    {
        return Kendaraan::all();
    }
}
