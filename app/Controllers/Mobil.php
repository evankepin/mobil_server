<?php

namespace App\Controllers;

use App\Models\MobilModel;
use CodeIgniter\RESTful\ResourceController;
class Mobil extends ResourceController
{
    protected $MobilModel;

    public function __construct()
    {
        $this->MobilModel = new MobilModel();
    }

    public function index()
    {
        $data_Mobil = $this->mobilModel->findAll();
        return $this->respond($data_mobil, 200, ['Content-Type' => 'application/json']);
    }
    
    public function create()
    {
        $input_data = $this->request->getJSON(true);
        if ($input_data) {
        $data = [
                'nama_mobil'           => $input_data['nama_mobil'] ?? '',
                'tipe_mobil'           => $input_data['tipe_mobil'] ?? '',
                'tahun_mobil'          => $input_data['tahun_mobil'] ?? '',
                'plat_nomor'           => $input_data['plat_nomor'] ?? '',
                'warna_mobil'          => $input_data['warna_mobil'] ?? '',
                'harga_sewa_per_hari'  => $input_data['harga_sewa_per_hari'] ?? '',
                'status_mobil'         => $input_data['status_mobil'] ?? ''
                ];

            if ($this->mobilModel->saveMobil($data)) {
                return $this->respondCreated(
                    ['status' => 'success', 'message' => 'Mobil berhasil ditambahkan']
                )->setContentType('application/json');
            } else {
                return $this->fail(
                    'Gagal menambah mobil', 
                    400
                )->setContentType('application/json');
            }
        } else {
            return $this->fail(
                'Invalid JSON input', 
                400
            )->setContentType('application/json');
            }

    }
    public function show($id = null)
    {
        $mobilmodel = new MobilModel();

        $mobil = $mobilmodel->getMobilById($id);

        return $this->response->setJSON($mobil);
    }
    
    public function getMobil()
    {
        $mobilModel = new MobilModel(); // Corrected variable name to match conventions

        $mobils = $mobilModel->getMobil(); // Changed to match the correct variable name

        return $this->response->setJSON($mobils);
    }


    public function update($id = null)
    {
        $input_data = $this->request->getJSON(true);

        if ($input_data) {
            $data = [
                'nama_mobil'           => $input_data['nama'] ?? '',
                'tipe_mobil'           => $input_data['alamat'] ?? '',
                'tahun_mobil'          => $input_data['no_hp'] ?? '',
                'plat_nomor'           => $input_data['username'] ?? '',
                'warna_mobil'          => $input_data['password'] ?? '',
                'harga_sewa_per_hari'  => $input_data['harga_sewa_per_hari'] ?? '',
                'status_mobil'         => $input_data['status_mobil'] ?? ''
            ];

            if ($this->mobilModel->update($id, $data)) {
                return $this->respond(['status' => 'success', 'message' => 'Mobil berhasil diperbarui'], 200, ['Content-Type' => 'application/json']);
            } else {
                return $this->fail('Gagal memperbarui mobil', 400, ['Content-Type' => 'application/json']);
            }
        } else {
            return $this->fail('Invalid JSON input', 400, ['Content-Type' => 'application/json']);
        }
    }
    public function delete($id = null)
    {
        if ($this->mobilModel->delete($id)) {
            return $this->respondDeleted(['status' => 'success', 'message' => 'Mobil berhasil dihapus'], 200, ['Content-Type' => 'application/json']);
        } else {
            return $this->fail('Gagal menghapus mobil', 400, ['Content-Type' => 'application/json']);
        }
    }
}