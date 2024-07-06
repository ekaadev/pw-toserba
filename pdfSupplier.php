<?php
// Aktifkan pelaporan kesalahan
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Sesuaikan jalur ke autoload.php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/controller/Connection.php';
require_once __DIR__ . '/controller/SupplierController.php';

session_start();

$suppliers = new SupplierController();
$supplier = $suppliers->index();

use Mpdf\Mpdf;

try {
    // Buat instance mPDF dengan konfigurasi tempDir
    $mpdf = new Mpdf([
        'tempDir' => '/opt/lampp/htdocs/pw-toserba/vendor/mpdf/mpdf/tmp',
    ]);

    // data
    $html = '<h1>Supplier Report</h1>';
    $html .= '<table border="1" cellpadding="5" cellspacing="0" style="width: 100%;">';
    $html .= '<thead><tr><th>Nama</th><th>Alamat</th><th>Email</th></tr></thead>';
    $html .= '<tbody>';

    foreach ($supplier as $item) {
        $html .= '<tr>';
        $html .= '<td>' . htmlspecialchars($item['nama']) . '</td>';
        $html .= '<td>' . htmlspecialchars($item['alamat']) . '</td>';
        $html .= '<td>' . htmlspecialchars($item['email']) . '</td>';
        $html .= '</tr>';
    }

    $html .= '</tbody></table>';

    // Buat PDF dengan mPDF
    $mpdf->WriteHTML($html);
    $mpdf->Output('supplier_report.pdf', 'I');
} catch (\Mpdf\MpdfException $e) {
    // Tangani kesalahan mPDF
    echo 'Kesalahan mPDF: ' . $e->getMessage();
} catch (Exception $e) {
    // Tangani kesalahan umum
    echo 'Kesalahan: ' . $e->getMessage();
}
?>
