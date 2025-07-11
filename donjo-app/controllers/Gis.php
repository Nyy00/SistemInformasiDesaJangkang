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
 * Hak Cipta 2016 - 2024 Perkumpulan Desa Digital Terbuka (https://opendesa.id)
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
 * @copyright Hak Cipta 2016 - 2024 Perkumpulan Desa Digital Terbuka (https://opendesa.id)
 * @license   http://www.gnu.org/licenses/gpl.html GPL V3
 * @link      https://github.com/OpenSID/OpenSID
 *
 */

use App\Enums\AgamaEnum;
use App\Enums\JenisKelaminEnum;
use App\Enums\PekerjaanEnum;
use App\Enums\PendidikanKKEnum;
use App\Enums\PendidikanSedangEnum;
use App\Enums\StatusKawinEnum;
use App\Enums\StatusPendudukEnum;
use App\Models\Area;
use App\Models\Bantuan;
use App\Models\Garis;
use App\Models\Lokasi;
use App\Models\Pembangunan;
use App\Models\Penduduk;
use App\Models\PendudukStatus;
use App\Models\Persil;
use App\Models\Wilayah;

defined('BASEPATH') || exit('No direct script access allowed');

class Gis extends Admin_Controller
{
    public $modul_ini           = 'pemetaan';
    public $sub_modul_ini       = 'peta';
    public $kategori_pengaturan = 'Peta';
    private $filterSearch       = [];
    private $advanceSearch      = [];

    public function __construct()
    {
        parent::__construct();
        isCan('b');
    }

    public function index(): void
    {
        $filterPenduduk = array_merge($this->filterSearch, $this->advanceSearch);

        foreach ($filterPenduduk as $key => $session) {
            $data[$key] = $session;
        }
        $aksesTerbatas      = Wilayah::treeAccess();
        $data['list_dusun'] = Wilayah::select(['dusun'])->distinct('dusun')->whereIn('dusun', $aksesTerbatas->keys())->get()->toArray();
        if (isset($filterPenduduk['dusun'])) {
            $data['dusun']   = $filterPenduduk['dusun'];
            $data['list_rw'] = Wilayah::select(['rw', 'dusun'])->distinct('rw')->where(['dusun' => urldecode((string) $data['dusun'])])->get()->filter(static fn ($q) => $aksesTerbatas->get($q->dusun)->get($q->rw))->toArray();
            if (isset($filterPenduduk['rw'])) {
                $data['rw']      = $filterPenduduk['rw'];
                $data['list_rt'] = Wilayah::where(['dusun' => urldecode((string) $data['dusun']), 'rw' => urldecode((string) $data['rw'])])->rt()->get()->filter(static function ($q) use ($aksesTerbatas) {
                    $rw = $aksesTerbatas->get($q->dusun)->get($q->rw);

                    return $rw ? $rw->where('rt', $q->rt)->count() : null;
                })->toArray();
                $data['rt'] = $filterPenduduk['rt'] ?? '';
            } else {
                $data['rw'] = '';
            }
        } else {
            $data['dusun'] = '';
            $data['rw']    = '';
            $data['rt']    = '';
        }

        $filterPenduduk['dusun']      = $data['dusun'];
        $filterPenduduk['rw']         = $data['rw'];
        $filterPenduduk['rt']         = $data['rt'];
        $data['list_status_penduduk'] = PendudukStatus::get()->toArray();
        $data['list_jenis_kelamin']   = JenisKelaminEnum::all();
        $data['wilayah']              = Wilayah::where('zoom', '>', 0)->get()->toArray();
        $data['lokasi']               = Lokasi::activeLocationMap();
        $data['garis']                = Garis::activeGarisMap();
        $data['area']                 = Area::activeAreaMap();
        $data['lokasi_pembangunan']   = Pembangunan::activePembangunanMap();
        $data['penduduk']             = Penduduk::activeMap($filterPenduduk);
        $data['dusun_gis']            = Wilayah::dusun()->whereIn('dusun', $aksesTerbatas->keys())->get()->toArray();
        $data['rw_gis']               = Wilayah::rw()->get()->filter(static function ($q) use ($aksesTerbatas): bool {
            $result = false;
            $dusun  = $aksesTerbatas->get($q->dusun);
            if ($dusun) {
                return (bool) $dusun->get($q->rw);
            }

            return $result;
        })->toArray();
        $data['rt_gis'] = Wilayah::rt()->get()->filter(static function ($q) use ($aksesTerbatas): bool {
            $result = false;
            $dusun  = $aksesTerbatas->get($q->dusun);
            if ($dusun) {
                $rw = $dusun->get($q->rw);
                if ($rw) {
                    $result = (bool) $rw->where('rt', $q->rt);
                }
            }

            return $result;
        })->toArray();
        $data['list_ref']     = unserialize(STAT_PENDUDUK);
        $data['list_bantuan'] = collect(unserialize(STAT_BANTUAN))->toArray() + Bantuan::selectRaw('nama, CONCAT(50,id) as lap')->pluck('nama', 'lap')->toArray();
        $data['persil']       = Persil::activeMap();

        view('admin.gis.maps', $data);
    }

    public function clear(): void
    {
        $this->session->unset_userdata([
            'cari', 'filter', 'sex',
            'dusun', 'rw', 'rt',
            'agama', 'umur_min', 'umur_max', 'pekerjaan_id',
            'status', 'status_kawin', 'pendidikan_sedang_id', 'pendidikan_kk_id', 'status_penduduk',
            'layer_penduduk', 'layer_keluarga', 'layer_rtm', 'advance_search',
        ]);
        $this->index();
    }

    public function filter(): void
    {
        $this->filterSearch = $this->input->post();
        $this->session->unset_userdata('advance_search');
        $this->index();
    }

    public function ajax_adv_search(): void
    {
        $listSearch = $this->session->userdata('advance_search');

        foreach ($listSearch as $key => $item) {
            $data[$key] = $item;
        }

        $data['input_umur']           = true;
        $data['list_agama']           = AgamaEnum::all();
        $data['list_pendidikan']      = PendidikanSedangEnum::all();
        $data['list_pendidikan_kk']   = PendidikanKKEnum::all();
        $data['list_pekerjaan']       = PekerjaanEnum::all();
        $data['list_status_kawin']    = StatusKawinEnum::all();
        $data['list_status_penduduk'] = StatusPendudukEnum::all();
        $data['form_action']          = ci_route('gis.adv_search_proses');

        view('admin.penduduk.ajax_adv_search_form', $data);
    }

    public function adv_search_proses(): void
    {
        $this->advanceSearch = $this->validasi_pencarian($this->input->post());
        $this->session->set_userdata('advance_search', $this->advanceSearch);
        $this->index();
    }

    private function validasi_pencarian(array $post)
    {
        $data['umur_min']             = bilangan($post['umur_min']);
        $data['umur_max']             = bilangan($post['umur_max']);
        $data['pekerjaan_id']         = $post['pekerjaan_id'];
        $data['status']               = $post['status'];
        $data['status_kawin']         = $post['status_kawin'];
        $data['agama']                = $post['agama'];
        $data['pendidikan_sedang_id'] = $post['pendidikan_sedang_id'];
        $data['pendidikan_kk_id']     = $post['pendidikan_kk_id'];
        $data['status_penduduk']      = $post['status_penduduk'];
        $data['umur']                 = $post['umur'];

        return $data;
    }
}
