<?php

namespace App\Repositories;

use App\Models\Kendaraan;
use App\Models\Mobil;
use App\Models\Order;
use Illuminate\Support\Collection;

class KendaraanRepository implements KendaraanRepositoryInterface
{
    public function allCollectionStokKendaraan()
    {
        $kendaraanStok = new Collection();
        foreach (Kendaraan::all() as $data) {
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

    public function addKendaraan($request)
    {
        $addStok = new Mobil;

        $addStok->mb_mesin = $request->mesin;
        $addStok->mb_kapasistas_penumpang = $request->kapasitas;
        $addStok->mb_tipe = $request->tipe;
        $addStok->stok = $request->stok;
        $addStok->terjual = $request->terjual;

        $addStok->save();

        $return = [
            'mesin' => $addStok->mb_mesin,
            'kapaitas_penumpang' => $addStok->mb_kapasistas_penumpang,
            'tipe' => $addStok->mb_tipe,
            'stok' => $addStok->stok,
            'terjual' => $addStok->terjual
        ];

        return $return;
    }

    public function editKendaraan($request, $id)
    {
        $deKendaraan = Kendaraan::find($id);

        $deKendaraan->mb_mesin = $request->mesin;
        $deKendaraan->mb_kapasistas_penumpang = $request->kapasitas;
        $deKendaraan->mb_tipe = $request->tipe;
        $deKendaraan->stok = $deKendaraan->stok + $request->stok;

        $deKendaraan->save();


        $return = [
            'mesin' => $deKendaraan->mb_mesin,
            'kapaitas_penumpang' => $deKendaraan->mb_kapasistas_penumpang,
            'tipe' => $deKendaraan->mb_tipe,
            'stok' => $deKendaraan->stok,
        ];

        return $return;
    }

    public function orderKendaraan($request)
    {
        $deKendaraan = Kendaraan::find($request->id_kendaraan);
        $orKendaraan = new Order();

        $orKendaraan->nama_kendaraan = $deKendaraan->kn_nama;

        switch ($deKendaraan->kendaraanable_type) {
            case "App\Models\Motor":
                $orKendaraan->tipe_kendaraan = 0;
                break;

            case "App\Models\Mobil":
                $orKendaraan->tipe_kendaraan = 1;
                break;
        }

        $orKendaraan->warna_kendaraan = $deKendaraan->kn_warna;
        $orKendaraan->harga_kendaraan = $deKendaraan->kn_harga;
        $orKendaraan->subtotal = $deKendaraan->kn_harga;
        $orKendaraan->quantity = $request->quantity;
        $orKendaraan->total = $deKendaraan->kn_harga * $request->quantity;

        $deKendaraan->kendaraanable->stok = $deKendaraan->kendaraanable->stok - $request->quantity;
        $deKendaraan->kendaraanable->terjual = $deKendaraan->kendaraanable->terjual + $request->quantity;

        $orKendaraan->save();
        $deKendaraan->kendaraanable->save();

        $return = [
            'nama' => $orKendaraan->nama_kendaraan,
            'tipe' => $orKendaraan->tipe_kendaraan,
            'warna' => $orKendaraan->warna_kendaraan,
            'harga' => $orKendaraan->harga_kendaraan,
            'subtotal' => $orKendaraan->subtotal,
            'quantity' => $orKendaraan->quantity,
            'total' => $orKendaraan->total
        ];

        return $return;
    }

    public function allCollectionPenjualanKendaraan()
    {
        $kendaraanPenjualan = new Collection();
        foreach (Kendaraan::all() as $data) {
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
        foreach (Order::all() as $data) {
            switch ($data->tipe_kendaraan) {
                case 0:
                    $data->tipe_kendaraan = "Motor";
                    break;
                case 1:
                    $data->tipe_kendaraan = "Mobil";
                    break;
            }

            $kendaraanPerPenjualan->push((object)[
                'id' => $data->id,
                'nama' => $data->nama_kendaraan,
                'tipe' => $data->tipe_kendaraan,
                'warna' => $data->warna_kendaraan,
                'harga' => $data->harga_kendaraan,
                'subtotal' => $data->subtotal,
                'quantity' => $data->quantity,
                'total' => $data->total,
            ]);

        }

        $grouped = $kendaraanPerPenjualan->groupBy('tipe');

        return $grouped->all();
    }
}
