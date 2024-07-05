<?php
// Aktifkan pelaporan kesalahan
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Sesuaikan jalur ke autoload.php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/controller/BuyController.php';

session_start();

$buy = new BuyController();
$value = $buy->detailHeader();
$data = $buy->detail();

$total = 0;

use Mpdf\Mpdf;

try {
    // Buat instance mPDF dengan konfigurasi tempDir
    $mpdf = new Mpdf([
        'tempDir' => '/opt/lampp/htdocs/pw-toserba/vendor/mpdf/mpdf/tmp',
    ]);
    
    // Data untuk PDF
    $html = '<h1>Detail Pembelian</h1>';
    $html .= '<p>ID Pembelian : ' . htmlspecialchars($value['id']) . '</p>';
    $html .= '<p>ID Supplier : ' . htmlspecialchars($value['id_supplier']) . '</p>';

    $html .= '<table border="1" cellpadding="5" cellspacing="0" style="width: 100%;">';
    $html .= '<thead><tr><th>Id Barang</th><th>Nama</th><th>Harga</th><th>Jumlah</th><th>Subtotal</th></tr></thead>';

    $html .= '<tbody>';

    foreach ($data as $item) {
        $subtotal = $item['harga'] * $item['jumlah'];
        $total += $subtotal;

        $html .= '<tr>';
        $html .= '<td>' . htmlspecialchars($item['id']) . '</td>';
        $html .= '<td>' . htmlspecialchars($item['nama']) . '</td>';
        $html .= '<td>' . htmlspecialchars($item['harga']) . '</td>';
        $html .= '<td>' . htmlspecialchars($item['jumlah']) . '</td>';
        $html .= '<td>' . htmlspecialchars($subtotal) . '</td>';
        $html .= '</tr>';
    }

    $html .= '</tbody></table>';

    $html .= '<p>Total : ' . htmlspecialchars($total) . '</p>';

    // Buat PDF dengan mPDF
    $mpdf->WriteHTML($html);
    $mpdf->Output('detail_pembelian.pdf', 'I');
} catch (\Mpdf\MpdfException $e) {
    // Tangani kesalahan mPDF
    echo 'Kesalahan mPDF: ' . $e->getMessage();
} catch (Exception $e) {
    // Tangani kesalahan umum
    echo 'Kesalahan: ' . $e->getMessage();
}
?>
