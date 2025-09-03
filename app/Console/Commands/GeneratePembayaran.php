<?php
namespace App\Console\Commands;

use App\Models\Pembayaran;
use Illuminate\Console\Command;

class GeneratePembayaran extends Command
{
    protected $signature   = 'pembayaran:generate';
    protected $description = 'Generate pembayaran otomatis setiap tanggal 3';

    public function handle()
    {
        // Ambil tanggal hari ini
        $today = now()->toDateString();

        // Cek apakah sudah ada data di tanggal 3 bulan ini
        $exists = Pembayaran::whereDate('tanggal', $today)->exists();

        if (! $exists) {
            Pembayaran::create([
                'keamanan'   => 101120,
                'lingkungan' => 40000,
                'tanggal'    => $today,
                'total'      => 101120 + 40000,
                'status'     => 'belum terbayar',
            ]);

            $this->info("Pembayaran tanggal $today berhasil dibuat.");
        } else {
            $this->info("Pembayaran tanggal $today sudah ada.");
        }
    }
}
