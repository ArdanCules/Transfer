<?php

namespace App\Controllers;

use App\Models\CountryModel;

class CountryController extends BaseController
{
    protected $countryModel;

    public function __construct()
    {
        $this->countryModel = new CountryModel();
    }

    // READ: Menampilkan semua data negara
    public function index()
    {
        $data['countries'] = $this->countryModel->findAll();
        return view('countries/index', $data);
    }

    // CREATE: Menambahkan data negara baru
    public function create()
    {
        return view('countries/create');
    }

    public function store()
    {
        $this->countryModel->save([
            'name' => $this->request->getPost('name'),
            'continent' => $this->request->getPost('continent'),
        ]);
        return redirect()->to('/countries');
    }

    // EDIT: Form untuk mengedit data negara
    public function edit($id)
    {
        $data['country'] = $this->countryModel->find($id);
        return view('countries/edit', $data);
    }

    public function update($id)
    {
        $this->countryModel->update($id, [
            'name' => $this->request->getPost('name'),
            'continent' => $this->request->getPost('continent'),
        ]);
        return redirect()->to('/countries');
    }

    // DELETE: Menghapus data negara
    public function delete($id)
    {
        $this->countryModel->delete($id);
        return redirect()->to('/countries');
    }
}