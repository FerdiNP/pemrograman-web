<?php

namespace App\Http\Controllers\Api;

use App\Models\Member;
use App\Http\Controllers\Controller;
use App\Http\Resources\MemberResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
  /**
  * index/get all
  *
  * @return void
  */
  public function index() {
    $members = Member::latest()->paginate(5);

    return new MemberResource(true, 'List Data Member', $members);
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
        'nama_member'        =>  'required',
        'alamat_member'      =>  'required',
        'jenis_kelamin'      =>  'required',
        'no_telpon'          =>  'required',
      ]);

      if ($validator->fails()) {
          return response()->json($validator->errors(), 422);
      }

      $member = Member::create([
        'nama_member'     =>  $request->nama_member,
        'alamat_member'   =>  $request->alamat_member,
        'jenis_kelamin'   =>  $request->jenis_kelamin,
        'no_telpon'       =>  $request->no_telpon,
      ]);

      return new MemberResource(true, 'Data Member Berhasil Ditambahkan!', $member);
  }

  /**
   * show/get by id
   *
   * @param  mixed $id
   * @return void
   */
  public function show($id)
  {
    $member = Member::find($id);

    if (!$member) {
        return response()->json([
            'success' => false,
            'message' => 'Data Member Tidak Ditemukan!',
            'data'    => null,
        ], 404);
    }

    return new MemberResource(true, 'Detail Data Member!', $member);
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
        'nama_member'        =>  'required',
        'alamat_member'      =>  'required',
        'jenis_kelamin'      =>  'required',
        'no_telpon'          =>  'required',
      ]);

      if ($validator->fails()) {
          return response()->json($validator->errors(), 422);
      }

      $member = Member::find($id);

      $member->update([
        'nama_member'     =>  $request->nama_member,
        'alamat_member'   =>  $request->alamat_member,
        'jenis_kelamin'   =>  $request->jenis_kelamin,
        'no_telpon'       =>  $request->no_telpon,
      ]);

      return new MemberResource(true, 'Data Member Berhasil Diubah!', $member);
  }

  /**
   * destroy/delete
   *
   * @param  mixed $id
   * @return void
   */
  public function destroy($id)
  {
      $member = Member::find($id);

      $member->delete();

      return new MemberResource(true, 'Data Member Berhasil Dihapus!', null);
  }
}
