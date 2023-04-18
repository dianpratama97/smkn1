<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AgamaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KepsekController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KelmapelController;
use App\Http\Controllers\WaKepsekController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\KelulusanController;
use App\Http\Controllers\TugasSiswaController;
use App\Http\Controllers\FileManagerController;
use App\Http\Controllers\JurusanBlogController;
use App\Http\Controllers\KepegawaianController;
use App\Http\Controllers\AkademikBlogController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SklController;
use App\Http\Controllers\VideoController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [BlogController::class, 'index'])->name('blog.index');
Route::get('/login-sekolah', [BlogController::class, 'menu'])->name('blog.menu');

Route::get('/berita/list', [BlogController::class, 'berita'])->name('berita.list');
Route::get('/alumni/list', [BlogController::class, 'alumni'])->name('alumni.list');

Route::get('/berita/{slug}', [BlogController::class, 'bacaBerita'])->name('berita.detail');



Route::get('/gallery/foto', [GalleryController::class, 'foto'])->name('gallery.foto');
Route::get('/video/list', [VideoController::class, 'list'])->name('video.list');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    //setting
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard.index');
    Route::resource('/jurusanBlog', JurusanBlogController::class);
    Route::resource('/akademikBlog', AkademikBlogController::class);
    Route::resource('/waKepsek', WaKepsekController::class);

    Route::resource('/setting', SettingController::class);

    //Kategori
    Route::get('/kategori/select', [KategoriController::class, 'select'])->name('kategori.select');

    Route::resource('/kategori', KategoriController::class);

    //Tag
    Route::resource('/tags', TagController::class)->except(['show']); //untuk menghilangkan show
    Route::get('/tags/select', [TagController::class, 'select'])->name('tags.select');

    //post
    Route::resource('/posts', PostController::class);

    Route::group(['prefix' => 'filemanager'], function () {
        //file-manager
        Route::get('/index', [FileManagerController::class, 'index'])->name('filemanager.index');
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });

    //role
    Route::get('/roles/select', [RoleController::class, 'select'])->name('roles.select');
    Route::resource('/roles', RoleController::class);

    //user
    Route::resource('/users', UserController::class)->except(['show']);
    Route::post('/userImport', [UserController::class, 'import'])->name('user.import');

    //profile
    Route::get('/myProfile/{user_id}', [ProfileController::class, 'index'])->name('myProfile.index');
    Route::get('/myProfile/ganti-password/{user_id}', [ProfileController::class, 'gantiPassword'])->name('myProfile.gantiPassword');
    Route::post('/getKabupaten', [ProfileController::class, 'getKabupaten'])->name('getKabupaten');
    Route::post('/getKecamatan', [ProfileController::class, 'getKecamatan'])->name('getKecamatan');
    Route::post('/getDesa', [ProfileController::class, 'getDesa'])->name('getDesa');

    Route::put('/myProfile/update/{user_id}', [ProfileController::class, 'update'])->name('myProfile.update');
    Route::put('/myProfile/updatePassword/{user_id}', [ProfileController::class, 'updatePassword'])->name('myProfile.updatePassword');

    // agama
    Route::resource('/agama', AgamaController::class);
    //jurusan
    Route::resource('/jurusan', JurusanController::class);
    //kelas
    Route::resource('/kelas', KelasController::class)->names('kelas')->parameters(['kelas' => 'kelas']);

    //guru
    Route::resource('/guru', GuruController::class);
    Route::get('/guru/info/{id}', [GuruController::class, 'show']);
    //siswa
    Route::get('siswa/hapus/{id}', [SiswaController::class, 'hapus'])->name('hapus');

    Route::get('/siswa/kelas10', [SiswaController::class, 'kelas10'])->name('siswa.kelas10');
    Route::get('/siswa/kelas11', [SiswaController::class, 'kelas11'])->name('siswa.kelas11');
    Route::get('/siswa/kelas12', [SiswaController::class, 'kelas12'])->name('siswa.kelas12');

    Route::get('/siswa/kelas10_dkv', [SiswaController::class, 'kelas10_dkv'])->name('siswa10.dkv');
    Route::get('/siswa/kelas10_tkj', [SiswaController::class, 'kelas10_tkj'])->name('siswa10.tkj');
    Route::get('/siswa/kelas10_lp', [SiswaController::class, 'kelas10_lp'])->name('siswa10.lp');
    Route::get('/siswa/kelas10_tsm', [SiswaController::class, 'kelas10_tsm'])->name('siswa10.tsm');

    Route::get('/siswa/kelas11_mm', [SiswaController::class, 'kelas11_mm'])->name('siswa11.mm');
    Route::get('/siswa/kelas11_tkj', [SiswaController::class, 'kelas11_tkj'])->name('siswa11.tkj');
    Route::get('/siswa/kelas11_pkm', [SiswaController::class, 'kelas11_pkm'])->name('siswa11.pkm');
    Route::get('/siswa/kelas11_tbsm', [SiswaController::class, 'kelas11_tbsm'])->name('siswa11.tbsm');

    Route::get('/siswa/kelas12_mm', [SiswaController::class, 'kelas12_mm'])->name('siswa12.mm');
    Route::get('/siswa/kelas12_tkj', [SiswaController::class, 'kelas12_tkj'])->name('siswa12.tkj');
    Route::get('/siswa/kelas12_pkm', [SiswaController::class, 'kelas12_pkm'])->name('siswa12.pkm');
    Route::get('/siswa/kelas12_tbsm', [SiswaController::class, 'kelas12_tbsm'])->name('siswa12.tbsm');

    Route::resource('siswa', SiswaController::class);

    //mapel
    Route::resource('/mapel', MapelController::class);
    Route::post('/mapel/import', [MapelController::class, 'import'])->name('mapel.import');


    //tugas dari guru
    Route::get('/tugas/indexGuru', [TugasController::class, 'indexGuru'])->name('tugas.indexGuru');
    Route::get('/tugas/cek_tugas/{cek_id}', [TugasController::class, 'cek'])->name('tugas.cek_tugas');
    Route::get('/tugas/cek/{id_tugas}', [TugasController::class, 'cekTugas'])->name('tugas.cek');
    Route::resource('/tugas', TugasController::class)->parameters(['tugas' => 'tugas']);
    //tugas siswa
    Route::get('/tugasSiswa/detail/{id}', [TugasSiswaController::class, 'detail'])->name('tugasSiswa.detail');
    Route::resource('/tugasSiswa', TugasSiswaController::class);

    //materi
    Route::resource('/materi', MateriController::class);

    //alumni
    Route::resource('/alumni', AlumniController::class);
    Route::post('/alumni/import', [AlumniController::class, 'import'])->name('alumni.import');
    //informasi dashboar
    Route::resource('/informasi', InformasiController::class);

    Route::get('/kartu-pelajar/{user_id}', [UserController::class, 'kartu'])->name('user.kartu');

    Route::post('/kelulusan/hapusAll', [KelulusanController::class, 'hapusAll'])->name('kelulusan.hapusAll');
    Route::resource('/kelulusan', KelulusanController::class);
    Route::post('/kelulusan/import', [KelulusanController::class, 'import'])->name('kelulusan.import');
    Route::get('/kelulusan/hasil/{nisn}', [KelulusanController::class, 'status_lulus']);

    Route::resource('/skl', SklController::class);
    Route::post('multipleusersdelete', [SklController::class, 'deleteAll']);

    Route::resource('/gallery', GalleryController::class);
    Route::resource('/video', VideoController::class);
});
