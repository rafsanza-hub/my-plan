<?php

namespace App\Controllers;

use App\Models\DashboardModel;

use App\Models\GoalModel;   

class Dashboard extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $dashboardModel = new DashboardModel();

        $data = [
            'totalpemasukan' => $dashboardModel->getTotalpemasukan(),
            'totalpengeluaran' => $dashboardModel->getTotalpengeluaran(),
            'saldo' => $dashboardModel->getSaldo(),
            'total_transaksi' => $dashboardModel->getTotalTransaksi(),
            'pengeluaran_bulanan' => $dashboardModel->getPengeluaranBulanan(),
            'transactions' => $dashboardModel->getRecentTransactions(),
            'selisih' => $dashboardModel->getSelisih(),
        ];
        $goalModel = new GoalModel();
        $data['goals'] = $goalModel->getGoal();

        return view('dashboard/index', $data);
    }
}
