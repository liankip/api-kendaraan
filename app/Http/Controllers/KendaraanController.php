<?php

namespace App\Http\Controllers;

use App\Repositories\KendaraanRepositoryInterface;

class KendaraanController extends Controller
{
    private KendaraanRepositoryInterface $kendaraanRepository;

    public function __construct(KendaraanRepositoryInterface $kendaraanRepository)
    {
        $this->kendaraanRepository = $kendaraanRepository;
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function collectionKendaraan(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => "Data show successfully",
            'data' => $this->kendaraanRepository->allCollectionKendaraan()
        ]);
    }

    public function collectionPenjualanKendaraan(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => "Data show successfully",
            'data' => $this->kendaraanRepository->allCollectionPenjualanKendaraan()
        ]);
    }

    public function collectionPenjualanPerkendaraan(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => "Data show successfully",
            'data' => $this->kendaraanRepository->allCollectionPenjualanPerkendaraan()
        ]);
    }
}
