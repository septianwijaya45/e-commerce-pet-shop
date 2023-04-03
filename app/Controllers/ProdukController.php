<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdukModel;

class ProdukController extends BaseController
{
    protected $produk;
    public function __construct()
    {
        $this->produk = new ProdukModel();
    }

    public function index()
    {
        $data = [
            'title'     => 'Master Produk',
            'validation'    => \Config\Services::validation(),
            'produk'    => $this->produk->findAll()
        ];

        return view('produk/index', $data);
    }

    public function insert()
    {
        $data = [
            'title'     => 'Add Master Produk',
            'validation'    => \Config\Services::validation(),
        ];

        return view('produk/insert', $data);
    }

    public function store()
    {
        $this->validation->setRules([
            'nama'          => 'required',
            'kategori'      => 'required',
            'netto'         => 'required',
            'satuan'        => 'required',
            'stok'          => 'required',
            'harga'         => 'required'
        ], [
            'nama'   => [
                'required'  => 'Nama Produk Harus Diisi!'
            ],
            'kategori'   => [
                'required'  => 'Kategori Produk Harus Dipilih!'
            ],
            'netto'   => [
                'required'  => 'Netto Produk Harus Diisi!'
            ],
            'satuan'   => [
                'required'  => 'Satuan Produk Harus Diisi!'
            ],
            'stok'   => [
                'required'  => 'Stok Produk Harus Diisi!'
            ],
            'harga'   => [
                'required'  => 'Harga Produk Harus Diisi!'
            ],
        ]);

        if(!$this->validation->withRequest($this->request)->run()){
            session()->setFlashdata('error-header', 'Failed to adding data!');
            return redirect()->back()->withInput()->with('error', $this->validation->getErrors());
        };

        $this->produk->insert([
            'nama'          => $this->request->getVar('nama'),
            'kategori'      => $this->request->getVar('kategori'),
            'netto'         => $this->request->getVar('netto'),
            'satuan'        => $this->request->getVar('satuan'),
            'stok'          => $this->request->getVar('stok'),
            'harga'         => $this->request->getVar('harga'),
        ]);

        session()->setFlashdata('success', 'Success Adding Data Produk!');

        return redirect()->to('/produk');
    }

    public function edit($id)
    {
        $produk = $this->produk->find($id);
        $data = [
            'title'     => 'Detail Produk '.$produk['nama'],
            'produk'    => $produk
        ];

        return view('produk/insert', $data);
    }

    public function update($id)
    {
        $this->validation->setRules([
            'nama'          => 'required',
            'kategori'      => 'required',
            'netto'         => 'required',
            'satuan'        => 'required',
            'stok'          => 'required',
            'harga'         => 'required'
        ], [
            'nama'   => [
                'required'  => 'Nama Produk Harus Diisi!'
            ],
            'kategori'   => [
                'required'  => 'Kategori Produk Harus Dipilih!'
            ],
            'netto'   => [
                'required'  => 'Netto Produk Harus Diisi!'
            ],
            'satuan'   => [
                'required'  => 'Satuan Produk Harus Diisi!'
            ],
            'stok'   => [
                'required'  => 'Stok Produk Harus Diisi!'
            ],
            'harga'   => [
                'required'  => 'Harga Produk Harus Diisi!'
            ],
        ]);

        if(!$this->validation->withRequest($this->request)->run()){
            session()->setFlashdata('error-header', 'Failed to adding data!');
            return redirect()->back()->withInput()->with('error', $this->validation->getErrors());
        };

        $this->produk->update($id, [
            'nama'          => $this->request->getVar('nama'),
            'kategori'      => $this->request->getVar('kategori'),
            'netto'         => $this->request->getVar('netto'),
            'satuan'        => $this->request->getVar('satuan'),
            'stok'          => $this->request->getVar('stok'),
            'harga'         => $this->request->getVar('harga'),
        ]);

        session()->setFlashdata('success', 'Success Edit Data Produk!');

        return redirect()->back();
    }

    public function delete($id)
    {
        $produk = $this->produk->find($id);
        if($produk){
            $this->produk->delete($id);
            session()->setFlashdata('success-delete', 'Berhasil Hapus data!');
            return redirect()->to(url_to('produk'));
        }else{
            session()->setFlashdata('error', 'Gagal Menghapus data! Mungkin data sudah terhapus! silahkan reflesh page!');
            return redirect()->to(url_to('produk'));
        }
    }
}
