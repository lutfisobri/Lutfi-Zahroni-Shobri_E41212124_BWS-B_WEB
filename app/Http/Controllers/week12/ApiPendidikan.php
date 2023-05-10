<?php

namespace App\Http\Controllers\week12;

use App\Http\Controllers\Controller;
use App\Models\Pendidikan;

class ApiPendidikan extends Controller
{
    private $message = [
        'insert' => 'Data berhasil disimpan',
        'get' => 'Data berhasil diambil',
        'update' => 'Data berhasil diupdate',
        'delete' => 'Data berhasil didelete',
    ];

    protected function response($data, int $type = 0): array
    {
        if (is_int($data)) {
            $type = $data;
            $data = [];
        }

        if ($type == 0) {
            $msg = $this->message['get'];
        }
        if ($type == 1) {
            $msg = $this->message['insert'];
        }
        if ($type == 2) {
            $msg = $this->message['update'];
        }
        if ($type == 3) {
            $msg = $this->message['delete'];
        }

        $value = [
            'status' => 'success',
            'message' => $msg,
        ];

        if (!empty($data)) {
            $value['data'] = $data;
        }
        
        return response()->json(
            $value
        )->getData(true);
    }

    public function getAll()
    {
        return $this->response(Pendidikan::all());
    }

    public function get($id)
    {
        return $this->response(Pendidikan::find($id));
    }

    public function insert()
    {
        Pendidikan::create(request()->all());
        return $this->response(1);
    }

    public function update($id)
    {
        Pendidikan::find($id)->update(request()->all());
        return $this->response(2);
    }

    public function delete($id)
    {
        Pendidikan::find($id)->delete();
        return $this->response(3);
    }
}
