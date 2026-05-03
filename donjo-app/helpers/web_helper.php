<?php

/*
 *
 * File ini bagian dari:
 *
 * OpenSID
 *
 * Sistem informasi desa sumber terbuka untuk memajukan desa
 *
 * Aplikasi dan source code ini dirilis berdasarkan lisensi GPL V3
 *
 * Hak Cipta 2009 - 2015 Combine Resource Institution (http://lumbungkomunitas.net/)
 * Hak Cipta 2016 - 2025 Perkumpulan Desa Digital Terbuka (https://opendesa.id)
 *
 * Dengan ini diberikan izin, secara gratis, kepada siapa pun yang mendapatkan salinan
 * dari perangkat lunak ini dan file dokumentasi terkait ("Aplikasi Ini"), untuk diperlakukan
 * tanpa batasan, termasuk hak untuk menggunakan, menyalin, mengubah dan/atau mendistribusikan,
 * asal tunduk pada syarat berikut:
 *
 * Pemberitahuan hak cipta di atas dan pemberitahuan izin ini harus disertakan dalam
 * setiap salinan atau bagian penting Aplikasi Ini. Barang siapa yang menghapus atau menghilangkan
 * pemberitahuan ini melanggar ketentuan lisensi Aplikasi Ini.
 *
 * PERANGKAT LUNAK INI DISEDIAKAN "SEBAGAIMANA ADANYA", TANPA JAMINAN APA PUN, BAIK TERSURAT MAUPUN
 * TERSIRAT. PENULIS ATAU PEMEGANG HAK CIPTA SAMA SEKALI TIDAK BERTANGGUNG JAWAB ATAS KLAIM, KERUSAKAN ATAU
 * KEWAJIBAN APAPUN ATAS PENGGUNAAN ATAU LAINNYA TERKAIT APLIKASI INI.
 *
 * @package   OpenSID
 * @author    Tim Pengembang OpenDesa
 * @copyright Hak Cipta 2009 - 2015 Combine Resource Institution (http://lumbungkomunitas.net/)
 * @copyright Hak Cipta 2016 - 2025 Perkumpulan Desa Digital Terbuka (https://opendesa.id)
 * @license   http://www.gnu.org/licenses/gpl.html GPL V3
 * @link      https://github.com/OpenSID/OpenSID
 *
 */

use App\Models\TeksBerjalan;

if (! function_exists('teks_berjalan')) {
    /**
     * Ambil data teks berjalan
     *
     * @param int $tipe
     * @param int $limit
     */
    function teks_berjalan($tipe = null, $limit = null)
    {
        $teks = TeksBerjalan::status(1);

        if ($tipe) {
            $teks = $teks->tipe(3);
        }

        if ($limit) {
            $teks = $teks->limit($limit);
        }

        return $teks->get();
    }
}

if (! function_exists('menu_anjungan')) {
    /**
     * Ambil data teks berjalan
     *
     * @param int $tipe
     * @param int $limit
     */
    function menu_anjungan($tipe = null, $limit = null)
    {
        $teks = TeksBerjalan::status(1);

        if ($tipe) {
            $teks = $teks->tipe(3);
        }

        if ($limit) {
            $teks = $teks->limit($limit);
        }

        return $teks->get();
    }
}

/**
 * icon menu anjungan
 *
 * Mengembalikan path lengkap untuk icon menu anjungan
 *
 * @param mixed $nama_file
 */
function icon_menu_anjungan(?string $nama_file): string
{
    if ($nama_file && is_file(FCPATH . LOKASI_ICON_MENU_ANJUNGAN . $nama_file)) {
        return base_url(LOKASI_ICON_MENU_ANJUNGAN . $nama_file);
    }

    if ($nama_file && is_file(base_path("Modules/Anjungan/Views/assets/images/icon/" . $nama_file))) {
        return module_asset('anjungan', 'images/icon/' . $nama_file);
    }

    if ($nama_file && is_file(base_path("Modules/Anjungan/Views/assets/images/" . $nama_file))) {
        return module_asset('anjungan', 'images/' . $nama_file);
    }

    $base_name = $nama_file ? pathinfo($nama_file, PATHINFO_FILENAME) : '';
    if ($base_name && is_file(base_path("Modules/Anjungan/Views/assets/images/icon/" . $base_name . '.png'))) {
        return module_asset('anjungan', 'images/icon/' . $base_name . '.png');
    }

    return module_asset('anjungan', 'images/menu.png');
}
