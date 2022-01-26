<?php

namespace App\Controllers;

use App\Models\ProdukModel;

class Product extends BaseController
{
    protected $ProdukModel;

    public function __construct()
    {
        $this->ProdukModel = new ProdukModel();
    }

    public function index()
    {
        $data = [
            'produk' => $this->ProdukModel->getProduk()
        ];
        return view('dashboard', $data);
    }

    public function getJSON()
    {
        $produk = $this->ProdukModel->getProduk();
        if (count($produk) == 0) {
            $url = 'https://gist.githubusercontent.com/FastPrintProg3/dec91c65f573d09a6e7836c65ae54e73/raw';
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($curl);
            curl_close($curl);

            $result = json_decode($result, true);

            foreach ($result as $data) {
                $this->ProdukModel->insert([
                    'id_produk' => $data['id_produk'],
                    'nama_produk' => $data['nama_produk'],
                    'kategori' => $data['kategori'],
                    'harga' => $data['harga'],
                    'status' => $data['status'],
                ]);
            }
        }
        return redirect()->to('/');
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Produk',
            'validation' => \Config\Services::validation(),
            'status' => $this->ProdukModel->getProduk()
        ];

        return view('create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'nama_produk' => 'required',
            'harga' => 'numeric'
        ])) {
            return redirect()->back()->withInput();
        }

        $this->ProdukModel->insert([
            'nama_produk' => $this->request->getVar('nama_produk'),
            'kategori' => $this->request->getVar('kategori'),
            'harga' => $this->request->getVar('harga'),
            'status' => $this->request->getVar('status'),
        ]);

        return redirect()->to('/product');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Produk',
            'produk' => $this->ProdukModel->getIdProduk($id),
            'validation' => \Config\Services::validation()
        ];

        return view('edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'nama_produk' => 'required',
            'harga' => 'numeric'
        ])) {
            return redirect()->back()->withInput();
        }

        $this->ProdukModel->save([
            'id_produk' => $id,
            'nama_produk' => $this->request->getVar('nama_produk'),
            'kategori' => $this->request->getVar('kategori'),
            'harga' => $this->request->getVar('harga'),
            'status' => $this->request->getVar('status')
        ]);

        return redirect()->to('/product');
    }

    public function delete($id)
    {
        $this->ProdukModel->delete($id);

        return redirect()->to('/product');
    }
}
