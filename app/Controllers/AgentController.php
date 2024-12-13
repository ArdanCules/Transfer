<?php

namespace App\Controllers;

use App\Models\AgentModel;  // Pastikan nama model sesuai dengan file model yang digunakan

class AgentController extends BaseController
{
    protected $agentModel;

    public function __construct()
    {
        // Inisialisasi model di dalam konstruktor
        $this->agentModel = new AgentModel();
    }

    // READ: Menampilkan semua data agen
    public function index()
    {
        $data['agents'] = $this->agentModel->findAll();
        return view('agents/index', $data);
    }

    // CREATE: Menambahkan data agen baru
    public function create()
    {
        return view('agents/create');
    }

    public function store()
    {
        $this->agentModel->save([
            'name' => $this->request->getPost('name'),
            'contact_info' => $this->request->getPost('contact_info'),
        ]);
        return redirect()->to('/agents');
    }

    // EDIT: Form untuk mengedit data agen
    public function edit($id)
    {
        $data['agent'] = $this->agentModel->find($id);
        return view('agents/edit', $data);
    }

    public function update($id)
    {
        $this->agentModel->update($id, [
            'name' => $this->request->getPost('name'),
            'contact_info' => $this->request->getPost('contact_info'),
        ]);
        return redirect()->to('/agents');
    }

    // DELETE: Menghapus data agen
    public function delete($id)
    {
        $this->agentModel->delete($id);
        return redirect()->to('/agents');
    }
}
