<?php

namespace App\Controllers;

use App\Models\TransfersModel;
use App\Models\TeamModel;
use App\Models\PlayerModel;

class TransfersController extends BaseController
{
    protected $transfersModel;
    protected $teamModel;
    protected $playerModel;

    public function __construct()
    {
        $this->transfersModel = new TransfersModel();
        $this->teamModel = new TeamModel();
        $this->playerModel = new PlayerModel();
    }

    // READ: Menampilkan semua transfer
    public function index()
    {
        $data['transfers'] = $this->transfersModel
            ->select('transfers.*, 
                      p.name as player_name, 
                      t1.name as from_team_name, 
                      t2.name as to_team_name')
            ->join('players as p', 'p.id = transfers.player_id')
            ->join('teams as t1', 't1.id = transfers.from_team_id')
            ->join('teams as t2', 't2.id = transfers.to_team_id')
            ->findAll();

        return view('transfers/index', $data);
    }

    // CREATE: Menambahkan transfer baru
    public function create()
    {
        $data['players'] = $this->playerModel->findAll();
        $data['teams'] = $this->teamModel->findAll();
        return view('transfers/create', $data);
    }

    public function store()
    {
        $this->transfersModel->save([
            'player_id' => $this->request->getPost('player_id'),
            'from_team_id' => $this->request->getPost('from_team_id'),
            'to_team_id' => $this->request->getPost('to_team_id'),
            'transfer_fee' => $this->request->getPost('transfer_fee'),
            'transfer_date' => $this->request->getPost('transfer_date'),
        ]);
        return redirect()->to('/transfers');
    }

    // EDIT: Form untuk mengedit transfer
    public function edit($id)
    {
        $data['transfer'] = $this->transfersModel->find($id);
        $data['players'] = $this->playerModel->findAll();
        $data['teams'] = $this->teamModel->findAll();
        return view('transfers/edit', $data);
    }

    public function update($id)
    {
        $this->transfersModel->update($id, [
            'player_id' => $this->request->getPost('player_id'),
            'from_team_id' => $this->request->getPost('from_team_id'),
            'to_team_id' => $this->request->getPost('to_team_id'),
            'transfer_fee' => $this->request->getPost('transfer_fee'),
            'transfer_date' => $this->request->getPost('transfer_date'),
        ]);
        return redirect()->to('/transfers');
    }

    // DELETE: Menghapus transfer
    public function delete($id)
    {
        $this->transfersModel->delete($id);
        return redirect()->to('/transfers');
    }
}