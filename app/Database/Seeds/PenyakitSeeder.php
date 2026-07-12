<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PenyakitSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_penyakit' => 'Stroke Iskemik',
                'keterangan'    => 'Stroke yang disebabkan oleh penyumbatan aliran darah ke otak.',
            ],
            [
                'nama_penyakit' => 'Stroke Hemoragik',
                'keterangan'    => 'Stroke yang disebabkan oleh pecahnya pembuluh darah di otak.',
            ],
            [
                'nama_penyakit' => 'Epilepsi',
                'keterangan'    => 'Gangguan saraf yang menyebabkan kejang berulang.',
            ],
            [
                'nama_penyakit' => 'Migrain',
                'keterangan'    => 'Sakit kepala berdenyut parah yang sering disertai mual dan kepekaan terhadap cahaya.',
            ],
            [
                'nama_penyakit' => 'Parkinson',
                'keterangan'    => 'Gangguan sistem saraf progresif yang mempengaruhi gerakan tubuh.',
            ],
            [
                'nama_penyakit' => 'Neuropati Perifer',
                'keterangan'    => 'Kerusakan saraf di luar otak dan sumsum tulang belakang.',
            ],
            [
                'nama_penyakit' => 'Meningitis',
                'keterangan'    => 'Peradangan pada selaput pelindung otak dan sumsum tulang belakang.',
            ],
            [
                'nama_penyakit' => 'Vertigo',
                'keterangan'    => 'Sensasi berputar atau pusing yang dapat disebabkan oleh gangguan saraf.',
            ],
            [
                'nama_penyakit' => 'Alzheimer',
                'keterangan'    => 'Gangguan otak yang menyebabkan penurunan daya ingat dan fungsi kognitif.',
            ],
            [
                'nama_penyakit' => 'Neuralgia Trigeminal',
                'keterangan'    => 'Nyeri kronis yang mempengaruhi saraf trigeminal pada wajah.',
            ],
        ];

        $this->db->table('penyakit')->insertBatch($data);
    }
}
