<?php

namespace App\Http\Controllers;

use App\Repositories\KendaraanRepositoryInterface;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    private KendaraanRepositoryInterface $kendaraanRepository;

    public function __construct(KendaraanRepositoryInterface $kendaraanRepository)
    {
        $this->kendaraanRepository = $kendaraanRepository;
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function collectionStokKendaraan(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => "Data show successfully",
            'data' => $this->kendaraanRepository->allCollectionStokKendaraan()
        ]);
    }

    public function addKendaraan(Request $request)
    {
        return response()->json([
            'success' => true,
            'message' => "Data successfully created",
            'data' => $this->kendaraanRepository->addKendaraan($request)
        ]);
    }

    public function editKendaraan(Request $request, $id)
    {
        return response()->json([
            'success' => true,
            'message' => "Data successfully updated",
            'data' => $this->kendaraanRepository->editKendaraan($request, $id)
        ]);
    }

    public function orderKendaraan(Request $request)
    {
        return response()->json([
            'success' => true,
            'message' => "Order successfully created",
            'data' => $this->kendaraanRepository->orderKendaraan($request)
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
