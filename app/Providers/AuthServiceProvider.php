<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage_settings', function ($user) {
            return $user->hasAnyPermission([
                'setting_show',
                'setting_create',
                'setting_update',
                'setting_detail',
                'setting_delete'
            ]);
        });

        Gate::define('manage_posts', function ($user) {
            return $user->hasAnyPermission([
                'post_show',
                'post_create',
                'post_update',
                'post_detail',
                'post_delete'
            ]);
        });

        Gate::define('manage_kategori', function ($user) {
            return $user->hasAnyPermission([
                'kategori_show',
                'kategori_create',
                'kategori_update',
                'kategori_detail',
                'kategori_delete'
            ]);
        });
        Gate::define('manage_tags', function ($user) {
            return $user->hasAnyPermission([
                'tag_show',
                'tag_create',
                'tag_update',
                'tag_delete'
            ]);
        });
        Gate::define('manage_roles', function ($user) {
            return $user->hasAnyPermission([
                'role_show',
                'role_create',
                'role_update',
                'role_detail',
                'role_delete'
            ]);
        });
        Gate::define('manage_users', function ($user) {
            return $user->hasAnyPermission([
                'user_show',
                'user_create',
                'user_update',
                'user_detail',
                'user_delete'
            ]);
        });
        Gate::define('manage_agama', function ($user) {
            return $user->hasAnyPermission([
                'agama_show',
                'agama_create',
                'agama_update',
                'agama_delete'
            ]);
        });
    
        
        Gate::define('manage_jurusan', function ($user) {
            return $user->hasAnyPermission([
                'jurusan_show',
                'jurusan_create',
                'jurusan_update',
                'jurusan_detail',
                'jurusan_delete'
            ]);
        });
        Gate::define('manage_kelas', function ($user) {
            return $user->hasAnyPermission([
                'kelas_show',
                'kelas_create',
                'kelas_update',
                'kelas_detail',
                'kelas_delete'
            ]);
        });

 
        Gate::define('manage_guru', function ($user) {
            return $user->hasAnyPermission([
                'guru_show',
                'guru_create',
                'guru_update',
                'guru_detail',
                'guru_delete'
            ]);
        });
        Gate::define('manage_siswa', function ($user) {
            return $user->hasAnyPermission([
                'siswa_show',
                'siswa_create',
                'siswa_update',
                'siswa_detail',
                'siswa_delete'
            ]);
        });

        Gate::define('manage_kelulusan', function ($user) {
            return $user->hasAnyPermission([
                'kelulusan_show',
                'kelulusan_create',
                'kelulusan_update',
                'kelulusan_detail',
                'kelulusan_delete'
            ]);
        });

        Gate::define('manage_mapel', function ($user) {
            return $user->hasAnyPermission([
                'mapel_show',
                'mapel_create',
                'mapel_update',
                'mapel_detail',
                'mapel_delete'
            ]);
        });

        Gate::define('manage_tugas', function ($user) {
            return $user->hasAnyPermission([
                'tugas_show',
                'tugas_create',
                'tugas_update',
                'tugas_detail',
                'tugas_delete'
            ]);
        });
        Gate::define('manage_tugasSiswa', function ($user) {
            return $user->hasAnyPermission([
                'tugasSiswa_show',
                'tugasSiswa_create',
                'tugasSiswa_update',
                'tugasSiswa_detail',
                'tugasSiswa_delete'
            ]);
        });


        Gate::define('manage_fileManagement', function ($user) {
            return $user->hasAnyPermission([
                'fileManagement_show',
                'fileManagement_create',
                'fileManagement_update',
                'fileManagement_detail',
                'fileManagement_delete'
            ]);
        });

        Gate::define('manage_jurusanBlog', function ($user) {
            return $user->hasAnyPermission([
                'jurusanBlog_show',
                'jurusanBlog_create',
                'jurusanBlog_update',
                'jurusanBlog_detail',
                'jurusanBlog_delete'
            ]);
        });

        Gate::define('manage_akademikBlog', function ($user) {
            return $user->hasAnyPermission([
                'akademikBlog_show',
                'akademikBlog_create',
                'akademikBlog_update',
                'akademikBlog_detail',
                'akademikBlog_delete'
            ]);
        });

        Gate::define('manage_waKepsek', function ($user) {
            return $user->hasAnyPermission([
                'waKepsek_show',
                'waKepsek_create',
                'waKepsek_update',
                'waKepsek_detail',
                'waKepsek_delete'
            ]);
        });

        Gate::define('manage_alumni', function ($user) {
            return $user->hasAnyPermission([
                'alumni_show',
                'alumni_create',
                'alumni_update',
                'alumni_detail',
                'alumni_delete'
            ]);
        });

        Gate::define('manage_informasi', function ($user) {
            return $user->hasAnyPermission([
                'informasi_show',
                'informasi_create',
                'informasi_update',
                'informasi_detail',
                'informasi_delete'
            ]);
        });
        Gate::define('manage_gallery', function ($user) {
            return $user->hasAnyPermission([
                'gallery_show',
                'gallery_create',
                'gallery_update',
                'gallery_detail',
                'gallery_delete'
            ]);
        });

        Gate::define('manage_video', function ($user) {
            return $user->hasAnyPermission([
                'video_show',
                'video_create',
                'video_update',
                'video_detail',
                'video_delete'
            ]);
        });


        Gate::define('manage_masterM', function ($user) {
            return $user->hasAnyPermission([
                'masterM_aktif',
            ]);
        });
        
        Gate::define('manage_penggunaM', function ($user) {
            return $user->hasAnyPermission([
                'penggunaM_aktif',
            ]);
        });

        Gate::define('manage_elearningM', function ($user) {
            return $user->hasAnyPermission([
                'elearningM_aktif',
            ]);
        });
        Gate::define('manage_cmsM', function ($user) {
            return $user->hasAnyPermission([
                'cmsM_aktif',
            ]);
        });
        Gate::define('manage_managementM', function ($user) {
            return $user->hasAnyPermission([
                'managementM_aktif',
            ]);
        });
        Gate::define('manage_settingM', function ($user) {
            return $user->hasAnyPermission([
                'settingM_aktif',
            ]);
        });
        Gate::define('manage_informasiM', function ($user) {
            return $user->hasAnyPermission([
                'informasiM_aktif',
            ]);
        });
    }
}
