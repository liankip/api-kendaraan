<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface KendaraanRepositoryInterface
{
    public function allCollectionStokKendaraan();

    public function addKendaraan(Request $request);

    public function editKendaraan(Request $request, $id);

    public function orderKendaraan(Request $request);

    public function allCollectionPenjualanKendaraan();

    public function allCollectionPenjualanPerkendaraan();
}
