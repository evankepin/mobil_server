<?php

namespace App\Models;

use CodeIgniter\Model;

class MobilModel extends Model
{
    Protected $table = 'tb_mobil'; 
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'nama_mobil', 'tipe_mobil', 'tahun_mobil', 'plat_nomor', 'warna_mobil', 'harga_sewa_per_hari', 'status_mobil', 'created_at'];


    public function getMobil()
    {    
        return $this->findAll();
    }
    // Method untuk menganmbil data barang berdasarkan id
    public function getMobilById($id)

    {
        return $this->find($id);
    }
    // Method untuk menyimpan data baru atau memperbarui data yang sudah ada
        public function saveMobil($data)
    {
        return $this->save($data);
    }
    // Method untuk memperbarui data Pelanggan yang sudah ada
    public Function updateMobil($id, $data)
    {
        return $this->update($id, $data);
    }
    // Method untuk menghapus data barang berdasarkan id
    public function deleteMobil($id)
    {
        return $this->delete($id);
    }
}