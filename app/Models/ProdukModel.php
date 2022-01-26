<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    protected $allowedFields = ['nama_produk', 'kategori', 'harga', 'status'];

    public function getProduk()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('produk');
        $builder->where(['status' => 'bisa dijual']);
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function getIdProduk($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('produk');
        $builder->where(['id_produk' => $id]);
        $query = $builder->get()->getRowArray();
        return $query;
    }
}
