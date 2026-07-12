<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Pemeriksaan Neurologi</title>
    <style>
        body { font-family: 'DejaVu Sans', sans-serif; font-size: 11px; margin: 0; padding: 20px; }
        .header { text-align: center; border-bottom: 2px solid #333; padding-bottom: 10px; margin-bottom: 15px; }
        .header h2 { margin: 0; font-size: 14px; text-transform: uppercase; }
        .header h3 { margin: 2px 0; font-size: 12px; }
        .header p  { margin: 2px 0; font-size: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th { background-color: #1a6faf; color: white; padding: 6px 8px; text-align: left; }
        td { padding: 5px 8px; border-bottom: 1px solid #ddd; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        .info-line { margin: 3px 0; font-size: 10px; }
        .footer { margin-top: 20px; text-align: right; font-size: 10px; }
        .badge { padding: 2px 6px; border-radius: 3px; font-size: 9px; }
        .badge-warning { background-color: #ffc107; color: #333; }
        .badge-success { background-color: #28a745; color: white; }
        .badge-info { background-color: #17a2b8; color: white; }
    </style>
</head>
<body>

    <div class="header">
        <h2>RS Bhayangkara Padang</h2>
        <h3>Laporan Pemeriksaan Poli Neurologi</h3>
        <?php if ($dari || $sampai): ?>
            <p>Periode: <?= $dari ? date('d/m/Y', strtotime($dari)) : 'Awal' ?> s/d <?= $sampai ? date('d/m/Y', strtotime($sampai)) : 'Akhir' ?></p>
        <?php else: ?>
            <p>Periode: Semua Data</p>
        <?php endif; ?>
        <?php if ($status): ?><p>Status: <?= $status ?></p><?php endif; ?>
    </div>

    <div class="info-line">Dicetak oleh: <strong><?= esc($dicetak_oleh) ?></strong></div>
    <div class="info-line">Tanggal Cetak: <strong><?= $tanggal_cetak ?></strong></div>
    <div class="info-line">Jumlah Data: <strong><?= count($pemeriksaan) ?> pemeriksaan</strong></div>

    <table>
        <thead>
            <tr>
                <th width="4%">No</th>
                <th width="12%">Tgl Periksa</th>
                <th width="10%">No. RM</th>
                <th width="16%">Nama Pasien</th>
                <th width="13%">Dokter</th>
                <th width="13%">Perawat</th>
                <th width="16%">Diagnosa</th>
                <th width="8%">Status</th>
                <th width="8%">Resep</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($pemeriksaan)): ?>
                <tr><td colspan="9" style="text-align:center;">Tidak ada data.</td></tr>
            <?php else: ?>
                <?php $no = 1; foreach ($pemeriksaan as $p): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= date('d/m/Y', strtotime($p['tanggal_pemeriksaan'])) ?></td>
                        <td><?= esc($p['no_rm']) ?></td>
                        <td><?= esc($p['nama_pasien']) ?></td>
                        <td><?= esc($p['nama_dokter'] ?? '-') ?></td>
                        <td><?= esc($p['nama_perawat'] ?? '-') ?></td>
                        <td><?= esc($p['nama_penyakit'] ?? '-') ?></td>
                        <td><?= $p['status'] ?></td>
                        <td><?= $p['status_resep'] ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <div class="footer">
        <p>Padang, <?= date('d/m/Y') ?></p>
        <p>Kepala Poli Neurologi</p>
        <br><br><br>
        <p>(__________________________)</p>
    </div>

</body>
</html>
