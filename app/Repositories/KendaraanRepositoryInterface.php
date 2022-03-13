<?php

namespace App\Repositories;

interface KendaraanRepositoryInterface
{
    public function allCollectionStokKendaraan();

    public function allCollectionPenjualanKendaraan();

    public function allCollectionPenjualanPerkendaraan();
}
