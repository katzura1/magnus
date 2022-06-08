<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class PesertaController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Registrasi'
        ];
        return view('pages.peserta.index', $data);
    }

    public function save(Request $request)
    {
        $data_validator = [
            'nama' => 'required|string|max:255|unique:pesertas,nama,NULL,id,deleted_at,NULL',
            'jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan',
            'hobi' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'telp' => 'required|digits_between:10,14',
            'username' => 'required|string|max:10|unique:pesertas,username,NULL,id,deleted_at,NULL',
            'password' => 'required|string|min:7|max:255',
        ];

        $validator = Validator::make($request->all(), $data_validator);

        if ($validator->fails()) {
            $response = [
                'code' => 500,
                'status' => 'error',
                'message' => $validator->errors()->all(),
                'data' => [],
            ];
        } else {
            $id = $request->input('id');
            $request['nama'] = ucfirst($request->input('nama'));
            try {
                DB::beginTransaction();
                $peserta = Peserta::updateOrCreate(['id' => $id], $request->all());
                DB::commit();
                $response = [
                    'code' => 200,
                    'status' => 'success',
                    'message' => 'Data berhasil disimpan',
                    'data' => $peserta,
                ];
            } catch (\Exception $e) {
                DB::rollback();
                $response = [
                    'code' => 500,
                    'status' => 'error',
                    'message' => $e->getMessage(),
                    'data' => [],
                ];
            }
        }
        return response()->json($response);
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        $peserta = Peserta::find($id);
        if ($peserta) {
            try {
                DB::beginTransaction();
                $peserta->delete();
                DB::commit();
                $response = [
                    'code' => 200,
                    'status' => 'success',
                    'message' => 'Data berhasil dihapus',
                    'data' => $peserta,
                ];
            } catch (\Exception $e) {
                DB::rollback();
                $response = [
                    'code' => 500,
                    'status' => 'error',
                    'message' => $e->getMessage(),
                    'data' => [],
                ];
            }
        } else {
            $response = [
                'code' => 404,
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
                'data' => [],
            ];
        }
        return response()->json($response);
    }

    public function data(Request $request)
    {
        $peserta = Peserta::all();
        $response = [
            'code' => 200,
            'status' => 'success',
            'message' => 'Data berhasil diambil',
            'data' => $peserta,
        ];
        return response()->json($response);
    }
}
