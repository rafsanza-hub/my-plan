<?php

namespace App\Models;

use CodeIgniter\Model;

class ReportModel extends Model
{
    protected $table = 'transactions'; // Nama tabel
    protected $primaryKey = 'id'; // Kunci utama
    protected $allowedFields = ['user_id', 'category_id', 'date', 'description', 'amount', 'type', 'created_at'];

    /**
     * Mendapatkan data laporan untuk pengguna tertentu.
     *
     * @param int $userId
     * @return object|null
     */
    public function getReportData($userId)
    {
        return $this->select('
                SUM(CASE WHEN type = "pemasukan" THEN amount ELSE 0 END) as total_income,
                SUM(CASE WHEN type = "pengeluaran" THEN amount ELSE 0 END) as total_expense
            ')
            ->where('user_id', $userId)
            ->first();
    }
}
