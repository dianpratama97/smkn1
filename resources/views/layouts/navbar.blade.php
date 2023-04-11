<ul class="nav">
    <li class="nav-item {{ set_active('dashboard') }}">
        <a href="{{ route('dashboard.index') }}">
            <i class="fas fa-home"></i>
            <p>Dashboard</p>
        </a>
    </li>

    {{-- Master Data --}}
    @can('manage_masterM')
        <li
            class="nav-item {{ set_active(['agama.index', 'jurusan.index', 'kelas.index', 'kelas.create', 'kelas.edit', 'kelas.show']) }}">
            <a data-toggle="collapse" href="#menu-master-data">
                <i class="fas fa-layer-group"></i>
                <p>Menu Master Data</p>
                <span class="caret"></span>
            </a>
            <div class="collapse" id="menu-master-data">
                <ul class="nav nav-collapse">
                    @can('manage_agama')
                        <li class="{{ set_active('agama.index') }}">
                            <a href="{{ route('agama.index') }}">
                                <span class="sub-item">Agama</span>
                            </a>
                        </li>
                    @endcan

                    @can('manage_jurusan')
                        <li class="{{ set_active('jurusan.index') }}">
                            <a href="{{ route('jurusan.index') }}">
                                <span class="sub-item labels">jurusan</span>
                            </a>
                        </li>
                    @endcan
                    @can('manage_kelas')
                        <li class="{{ set_active('kelas.index') }}">
                            <a href="{{ route('kelas.index') }}">
                                <span class="sub-item labels">kelas</span>
                            </a>
                        </li>
                    @endcan
                    @can('manage_mapel')
                        <li class="{{ set_active(['mapel.index']) }}">
                            <a href="{{ route('mapel.index') }}">
                                <span class="sub-item">Data Mata Pelajaran</span>
                            </a>
                        </li>
                    @endcan
                    @can('manage_kelulusan')
                        <li class="{{ set_active('kelulusan.index') }}">
                            <a href="{{ route('kelulusan.index') }}">
                                <span class="sub-item labels">Data Kelulusan Kelas 12</span>
                            </a>
                        </li>
                    @endcan
                </ul>
            </div>
        </li>
    @endcan

    {{-- Data Pengguna --}}
    @can('manage_penggunaM')
        <li
            class="nav-item {{ set_active(['guru.index', 'guru.create', 'guru.edit', 'guru.show', 'siswa.index', 'siswa.create', 'siswa.edit', 'siswa.show', 'kepsek.index', 'kepsek.create', 'kepsek.edit', 'kepsek.show']) }}">
            <a data-toggle="collapse" href="#menu-data-pengguna">
                <i class="fas fa-users"></i>
                <p>Data Pengguna</p>
                <span class="caret"></span>
            </a>
            <div class="collapse" id="menu-data-pengguna">
                <ul class="nav nav-collapse">
                    @can('manage_guru')
                        <li class="{{ set_active('guru.index') }}">
                            <a href="{{ route('guru.index') }}">
                                <span class="sub-item">Guru Guru</span>
                            </a>
                        </li>
                    @endcan
                    @can('manage_siswa')
                        <li class="{{ set_active('siswa.index') }}">
                            <a href="{{ route('siswa.index') }}">
                                <span class="sub-item">Data Siswa</span>
                            </a>
                        </li>
                    @endcan
                </ul>
            </div>
        </li>
    @endcan


    {{-- E-Learning --}}
    @can('manage_elearningM')
        <li
            class="nav-item {{ set_active(['tugas.index', 'tugas.create', 'tugas.edit', 'tugas.show', 'tugas.indexGuru']) }}">
            <a data-toggle="collapse" href="#e-learning">
                <i class="fas fa-layer-group"></i>
                <p>E-Learning</p>
                <span class="caret"></span>
            </a>
            <div class="collapse" id="e-learning">
                <ul class="nav nav-collapse">
                    @can('manage_tugas')
                        <li class="{{ set_active(['tugas.index', 'tugas.create', 'tugas.edit', 'tugas.show']) }}">
                            <a href="{{ route('tugas.index') }}">
                                <span class="sub-item">Tugas Guru</span>
                            </a>
                        </li>
                    @endcan
                    @can('manage_tugasSiswa')
                        <li class="{{ set_active(['tugas.index', 'tugas.create', 'tugas.edit', 'tugas.show']) }}">
                            <a href="{{ route('tugasSiswa.index') }}">
                                <span class="sub-item">Tugas Siswa</span>
                            </a>
                        </li>
                    @endcan
                </ul>
            </div>
        </li>
    @endcan

    {{-- Link: Cms-Menu Kategori --}}
    @can('manage_cmsM')
        <li
            class="nav-item {{ set_active([
                'kategori.index',
                'kategori.create',
                'kategori.edit',
                'kategori.show',
                'tags.index',
                'tags.create',
                'tags.edit',
                'tags.show',
                'posts.index',
                'posts.create',
                'posts.edit',
                'posts.show',
                'filemanager.index',
            ]) }}">
            <a data-toggle="collapse" href="#menu-cms">
                <i class="fas fa-layer-group"></i>
                <p>Menu CMS</p>
                <span class="caret"></span>
            </a>
            <div class="collapse" id="menu-cms">
                <ul class="nav nav-collapse">
                    @can('manage_kategori')
                        <li class="{{ set_active('kategori.index') }}">
                            <a href="{{ route('kategori.index') }}">
                                <span class="sub-item">Kategori</span>
                            </a>
                        </li>
                    @endcan
                    @can('manage_tags')
                        <li class="{{ set_active('tags.index') }}">
                            <a href="{{ route('tags.index') }}">
                                <span class="sub-item">Tags</span>
                            </a>
                        </li>
                    @endcan
                    @can('manage_posts')
                        <li class="{{ set_active('posts.index') }}">
                            <a href="{{ route('posts.index') }}">
                                <span class="sub-item">Post</span>
                            </a>
                        </li>
                    @endcan
                    @can('manage_gallery')
                        <li class="{{ set_active('gallery.index') }}">
                            <a href="{{ route('gallery.index') }}">
                                <span class="sub-item">Gallery Sekolah</span>
                            </a>
                        </li>
                    @endcan
                    @can('manage_video')
                        <li class="{{ set_active('video.index') }}">
                            <a href="{{ route('video.index') }}">
                                <span class="sub-item">Video Sekolah</span>
                            </a>
                        </li>
                    @endcan
                    {{--
                         @can('manage_managementM')
                          <li class="{{ set_active('filemanager.index') }}">
                        <a href="{{ route('filemanager.index') }}">
                            <span class="sub-item">File Management</span>
                        </a>
                    </li> 
                     @endcan
                     --}}

                </ul>
            </div>
        </li>
    @endcan

    {{-- User Management --}}
    @can('manage_managementM')
        {{-- Link: Cms-Menu User Magagement --}}
        <li
            class="nav-item {{ set_active(['roles.index', 'roles.create', 'roles.edit', 'roles.show', 'users.index', 'users.create', 'users.edit', 'users.show']) }}">
            <a data-toggle="collapse" href="#menu-userM">
                <i class="fas fa-users"></i>
                <p>User Management</p>
                <span class="caret"></span>
            </a>
            <div class="collapse" id="menu-userM">
                <ul class="nav nav-collapse">
                    @can('manage_roles')
                        <li class="{{ set_active('roles.index') }}">
                            <a href="{{ route('roles.index') }}">
                                <span class="sub-item">Role</span>
                            </a>
                        </li>
                    @endcan
                    @can('manage_users')
                        <li class="{{ set_active('users.index') }}">
                            <a href="{{ route('users.index') }}">
                                <span class="sub-item">User</span>
                            </a>
                        </li>
                    @endcan

                </ul>
            </div>
        </li>
    @endcan

    {{-- menu informasi --}}
    @can('manage_informasiM')
        <li class="nav-item {{ set_active(['ppdb.index']) }}">
            <a data-toggle="collapse" href="#menu-informasi">
                <i class="fas fa-layer-group"></i>
                <p>Menu Informasi</p>
                <span class="caret"></span>
            </a>
            <div class="collapse" id="menu-informasi">
                <ul class="nav nav-collapse">
                    @can('manage_informasi')
                        <li class="{{ set_active('informasi.index') }}">
                            <a href="{{ route('informasi.index') }}">
                                <span class="sub-item">Informasi</span>
                            </a>
                        </li>
                    @endcan
                    @can('manage_jurusanBlog')
                        <li class="{{ set_active('jurusanBlog.index') }}">
                            <a href="{{ route('jurusanBlog.index') }}">
                                <span class="sub-item">Setting Jurusan Blog</span>
                            </a>
                        </li>
                    @endcan
                    @can('manage_akademikBlog')
                        <li class="{{ set_active('akademikBlog.index') }}">
                            <a href="{{ route('akademikBlog.index') }}">
                                <span class="sub-item">Setting Akademik</span>
                            </a>
                        </li>
                    @endcan
                    @can('manage_waKepsek')
                        <li class="{{ set_active('waKepsek.index') }}">
                            <a href="{{ route('waKepsek.index') }}">
                                <span class="sub-item">Setting Wakil Kepala Sekolah</span>
                            </a>
                        </li>
                    @endcan
                    @can('manage_settingM')
                        <li class="{{ set_active('setting.index') }}">
                            <a href="{{ route('setting.index') }}">
                                <span class="sub-item">Setting</span>
                            </a>
                        </li>
                    @endcan
                    @can('manage_alumni')
                        <li class="{{ set_active('alumni.index') }}">
                            <a href="{{ route('alumni.index') }}">
                                <span class="sub-item">Data Alumi</span>
                            </a>
                        </li>
                    @endcan
                </ul>
            </div>
        </li>
    @endcan


    {{-- Area Menu Siswa --}}
    @can('manage_tugasSiswa')
    @endcan


    {{-- Link: Keluar Aplikasi --}}
    <li class="nav-item" style="background-color: rgb(28, 205, 1)">
        <a class="dropdown-item " href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt text-white"></i>
            <p class="text-white">Keluar</p>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
    </li>
</ul>
