<?php

namespace App\Controllers;

use App\Models\contractModel;
use App\Models\PlayerModel;  // Jika Anda ingin mengaitkan dengan model Player
use App\Models\teamModel;    // Jika Anda ingin mengaitkan dengan model Team

class ContractController extends BaseController
{
    protected $contractModel;
    protected $playerModel;
    protected $teamsModel;

    public function __construct()
    {
        $this->contractModel = new contractModel();
        $this->playerModel = new PlayerModel();  // Model untuk player
        $this->teamsModel = new teamModel();      // Model untuk team
    }

    // READ: Menampilkan semua data kontrak
    public function index()
    {
        $data['contracts'] = $this->contractModel->findAll();
        return view('contracts/index', $data);
    }

    // CREATE: Menambahkan data kontrak baru
    public function create()
    {
        // Menampilkan data pemain dan tim untuk form
        $data['players'] = $this->playerModel->findAll();
        $data['teams'] = $this->teamsModel->findAll();
        return view('contracts/create', $data);
    }

    public function store()
    {
        $this->contractModel->save([
            'player_id' => $this->request->getPost('player_id'),
            'team_id' => $this->request->getPost('team_id'),
            'start_date' => $this->request->getPost('start_date'),
            'end_date' => $this->request->getPost('end_date'),
            'salary' => $this->request->getPost('salary'),
        ]);
        return redirect()->to('/contracts');
    }

    // EDIT: Form untuk mengedit data kontrak
    public function edit($id)
    {
        $data['contract'] = $this->contractModel->find($id);
        $data['players'] = $this->playerModel->findAll();
        $data['teams'] = $this->teamsModel->findAll();
        return view('contracts/edit', $data);
    }

    public function update($id)
    {
        $this->contractModel->update($id, [
            'player_id' => $this->request->getPost('player_id'),
            'team_id' => $this->request->getPost('team_id'),
            'start_date' => $this->request->getPost('start_date'),
            'end_date' => $this->request->getPost('end_date'),
            'salary' => $this->request->getPost('salary'),
        ]);
        return redirect()->to('/contracts');
    }

    // DELETE: Menghapus data kontrak
    public function delete($id)
    {
        $this->contractModel->delete($id);
        return redirect()->to('/contracts');
    }
}