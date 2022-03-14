<?php

namespace App\Repositories;

use App\Models\Kendaraan;
use Illuminate\Support\Collection;

class KendaraanRepository implements KendaraanRepositoryInterface
{
    public function allCollectionStokKendaraan()
    {
        $kendaraanStok = new Collection();
        foreach(Kendaraan::all() as $data)
        {
            if ($data->kendaraanable) {
                $kendaraanStok->push((object)[
                    'id' => $data->id,
                    'nama' => $data->kn_nama,
                    'warna' => $data->kn_warna,
                    'harga' => $data->kn_harga,
                    'stok' => $data->kendaraanable->stok
                ]);
            }
        }

        return $kendaraanStok;
    }

    public function allCollectionPenjualanKendaraan()
    {
        $kendaraanPenjualan = new Collection();
        foreach(Kendaraan::all() as $data)
        {
            if ($data->kendaraanable) {
                $kendaraanPenjualan->push((object)[
                    'id' => $data->id,
                    'nama' => $data->kn_nama,
                    'warna' => $data->kn_warna,
                    'terjual' => $data->kendaraanable->terjual
                ]);
            }
        }

        return $kendaraanPenjualan;
    }

    public function allCollectionPenjualanPerkendaraan()
    {
        $kendaraanPerPenjualan = new Collection();
        foreach(Kendaraan::all() as $data)
        {
            if ($data->kendaraanable) {
                $kendaraanPerPenjualan->push((object)[
                    'id' => $data->id,
                    'nama' => $data->kn_nama,
                    'warna' => $data->kn_warna,
                    'harga' => $data->kn_harga,
                    'terjual' => $data->kendaraanable->terjual,
                    'total' => $data->kn_harga * $data->kendaraanable->terjual,
                    'as' => $data->kendaraanable_type
                ]);
            }
        }

        $grouped = $kendaraanPerPenjualan->groupBy('as');

        return $grouped->all();
    }
}
