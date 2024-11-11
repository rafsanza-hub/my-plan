<?php

namespace App\Models;

use \CodeIgniter\Model;

class DashboardModel extends Model
{
    protected $table = 'transactions';
    protected $primaryKey = 'id';



    public function getPengeluaranBulanan()
    {
        return $this->table('transaksi')
            ->selectSum('amount', 'total_pengeluaran')
            ->where('user_id', user_id())
            ->where('type', 'pengeluaran')
            ->where('MONTH(date)', date('m'))
            ->where('YEAR(date)', date('Y'))
            ->get()->getRowArray();
    }

    public function getTotalTransaksi()
    {
        $db = \Config\Database::connect();
        return $db->table('transactions')->where('user_id', user_id())->countAllResults();
    }

    public function getTotalpemasukan()
    {
        
        return $this->db->table('transactions')
            ->where('user_id', user_id())
            ->where('type', 'pemasukan')
            ->selectSum('amount')
            ->get()
            ->getRow()
            ->amount ?? 0;
    }


    public function getTotalpengeluaran()
    {
        
        return $this->db->table('transactions')
            ->where('user_id', user_id())
            ->where('type', 'pengeluaran')
            ->selectSum('amount')
            ->get()
            ->getRow()
            ->amount ?? 0;
    }

    public function getSaldo()
    {
        return $this->getTotalpemasukan() - $this->getTotalpengeluaran();
    }

    public function getRecentTransactions()
    {
        
        return $this->db->table('transactions')
            ->select('transactions.*, categories.name as category_name')
            ->join('categories', 'categories.id = transactions.category_id', 'left')
            ->orderBy('date', 'DESC')
            ->limit(5)
            ->where('transactions.user_id', user_id())
            ->get()
            ->getResultArray();
    }

    public function getSelisih()
    {
        $totalPemasukan = $this->getTotalpemasukan();
        $totalPengeluaran = $this->getTotalpengeluaran();

        if ($totalPemasukan == 0) {
            return 0; 
        }

        $rasio = ($totalPengeluaran / $totalPemasukan) * 100;
        return $rasio;
    }
}
