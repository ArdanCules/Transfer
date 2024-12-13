<?php

namespace App\Controllers;

use App\Models\LeaguesModel;
use App\Models\CountryModel;

class LeaguesController extends BaseController
{
    protected $leaguesModel;
    protected $countryModel;

    public function __construct()
    {
        $this->leaguesModel = new LeaguesModel();
        $this->countryModel = new CountryModel(); // Untuk mendapatkan data negara
    }

    // READ: Menampilkan semua data liga
    public function index()
    {
        $data['leagues'] = $this->leaguesModel
            ->select('Leagues.*, countries.name as country_name')
            ->join('countries', 'countries.id = Leagues.country_id')
            ->findAll();
        return view('leagues/index', $data);
    }

    // CREATE: Menambahkan data liga baru
    public function create()
    {
        $data['countries'] = $this->countryModel->findAll();
        return view('leagues/create', $data);
    }

    public function store()
    {
        $this->leaguesModel->save([
            'name' => $this->request->getPost('name'),
            'country_id' => $this->request->getPost('country_id'),
        ]);
        return redirect()->to('/leagues');
    }

    // EDIT: Form untuk mengedit data liga
    public function edit($id)
    {
        $data['league'] = $this->leaguesModel->find($id);
        $data['countries'] = $this->countryModel->findAll();
        return view('leagues/edit', $data);
    }

    public function update($id)
    {
        $this->leaguesModel->update($id, [
            'name' => $this->request->getPost('name'),
            'country_id' => $this->request->getPost('country_id'),
        ]);
        return redirect()->to('/leagues');
    }

    // DELETE: Menghapus data liga
    public function delete($id)
    {
        $this->leaguesModel->delete($id);
        return redirect()->to('/leagues');
    }
}