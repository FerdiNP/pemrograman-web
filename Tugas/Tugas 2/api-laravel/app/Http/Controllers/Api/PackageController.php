<?php

namespace App\Http\Controllers\Api;

use App\Models\Package;
use App\Http\Controllers\Controller;
use App\Http\Resources\PackageResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

  class PackageController extends Controller
  {
    /**
    * index/get all
    *
    * @return void
    */
    public function index() {
      $packages = Package::latest()->paginate(5);

      return new PackageResource(true, 'List Data Paket', $packages);
    }

    /**
     * store/post/create
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'nama_paket'        =>  'required',
          'jenis_paket'       =>  'required',
          'deskripsi_paket'   =>  'required',
          'harga_paket'       =>  'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $package = Package::create([
          'nama_paket'        =>  $request->nama_paket,
          'jenis_paket'       =>  $request->jenis_paket,
          'deskripsi_paket'   =>  $request->deskripsi_paket,
          'harga_paket'       =>  $request->harga_paket,
        ]);

        return new PackageResource(true, 'Data Paket Berhasil Ditambahkan!', $package);
    }

    /**
     * show/get by id
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
      $package = Package::find($id);

      if (!$package) {
          return response()->json([
              'success' => false,
              'message' => 'Data Paket Tidak Ditemukan!',
              'data'    => null,
          ], 404);
      }

      return new PackageResource(true, 'Detail Data Paket!', $package);
    }

    /**
     * update/put
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
          'nama_paket'        =>  'required',
          'jenis_paket'       =>  'required',
          'deskripsi_paket'   =>  'required',
          'harga_paket'       =>  'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $package = Package::find($id);

        $package->update([
          'nama_paket'        =>  $request->nama_paket,
          'jenis_paket'       =>  $request->jenis_paket,
          'deskripsi_paket'   =>  $request->deskripsi_paket,
          'harga_paket'       =>  $request->harga_paket,
        ]);

        return new PackageResource(true, 'Data Package Berhasil Diubah!', $package);
    }

    /**
     * destroy/delete
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        $package = Package::find($id);

        $package->delete();

        return new PackageResource(true, 'Data Paket Berhasil Dihapus!', null);
    }
  }
