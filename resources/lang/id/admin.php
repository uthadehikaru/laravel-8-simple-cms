<?php

$translation = [

    /*
    |--------------------------------------------------------------------------
    | Bahasa Indonesia
    |--------------------------------------------------------------------------
    */

    'create' => [
        'fail'          => 'Gagal membuat data.',
        'success'       => 'Data berhasil disimpan.'
    ],
    'csrf_error'        => 'Waktu anda telah habis untuk memproses data, silahkan coba lagi',
    'datatables' => [   // DataTables, files can be found @ https://datatables.net/plug-ins/i18n/
        'sInfo'         => 'Menampilkan _START_ sampai _END_ dari _TOTAL_ data',
        'sInfoEmpty'    => 'Menampilkan 0 sampai 0 dari 0 data',
        'sInfoFiltered' => '(Menyaring dari _MAX_ total data)',
        'sInfoPostFix'  => '',
        'sLengthMenu'   => 'Menampilkan _MENU_ data',
        'sProcessing'   => '<div class="overlay"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg></span></div>',
        'sSearch'       => 'Cari:',
        'sUrl'          => '',
        'sZeroRecords'  => 'Tidak ada data yang ditemukan',
        'oPaginate' => [
            'sFirst'    => 'Pertama',
            'sLast'     => 'Terakhir',
            'sNext'     => 'Selanjutnya',
            'sPrevious' => 'Sebelumnya'
        ]
    ],
    'delete' => [
        'fail'          => 'Gagal menghapus data',
        'self'          => 'Kamu tidak bisa mendapatkan semua yang kamu inginkan',
        'success'       => 'Data berhasil dihapus.'
    ],
    'empty'             => 'Belum ada data yang tersedia, ingin membuat data baru?',
    'invalid'           => 'Kamu harus mengatur file .env untuk bisa melihat Dasbor.',
    'fields' => [
        'created_at'    => 'Dibuat pada',
        'deleted_at'    => 'Dihapus pada',
        'no'            => 'Tidak',
        'published_at'  => 'Dipublikasikan pada',
        'reset'         => 'Atur Ulang',
        'save'          => 'Simpan',
        'updated_at'    => 'Diperbaharui pada',
        'uploaded'      => 'Berkas Terunggah',
        'yes'           => 'Ya',
        'thumbnail'    => 'Gambar',
    ],
    'last_login'        => 'Terakhir Login',
    'none'              => 'Tidak ada',
    'ops' => [
        'confirmation'  => 'Apakah kamu yakin?',
        'create'        => 'Buat',
        'delete'        => 'Hapus',
        'edit'          => 'Ubah',
        'modified'      => 'Diubah pada',
        'name'          => 'Aksi',
        'order'         => 'Urutan',
        'show'          => 'Tampilkan'
    ],
    'root'              => 'Dashbor',
    'submit'            => 'Kirim',
    'title'             => 'Pengaturan',
    'update' => [
        'fail'          => 'Gagal memperbaharui data',
        'success'       => 'Data berhasil diubah.'
    ],
    'save' => 'Simpan'
];

return createTranslation(require __DIR__ . DIRECTORY_SEPARATOR . 'resources.php', $translation);
