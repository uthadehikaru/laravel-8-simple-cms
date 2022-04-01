<?php

return [

    /*
    |--------------------------------------------------------------------------
    | English Application App Specific Resources
    |--------------------------------------------------------------------------
    */

    'article' => [
        'create' => 'Buat Artikel',
        'edit'   => 'Ubah Artikel',
        'fields' => [
            'category_id'  => 'Kategori',
            'content'      => 'Konten',
            'description'  => 'Deskripsi',
            'published_at' => 'Dipublikasi pada',
            'title'        => 'Artikel Judul',
        ],
        'index'  => 'Artikel',
        'show'   => 'Tampilkan Artikel'
    ],
    'category' => [
        'create' => ' Buat Kategori',
        'edit'   => ' Ubah Kategori',
        'fields' => [
            'article_count' => 'Jumlah Artikel',
            'description'   => 'Deskripsi',
            'title'         => 'Judul Kategori'
        ],
        'index'  => 'Kategori',
        'show'   => ' Tampilkan Kategori'
    ],
    'dashboard' => [
        'fields' => [
            'alexa_local'     => 'Alexa Local',
            'alexa_world'     => 'Alexa World',
            'average_time'    => 'Average Time',
            'bounce_rate'     => 'Bounce Rate',
            'browsers'        => 'Browsers',
            'chart_country'   => 'Country',
            'chart_region'    => 'Region',
            'chart_visitors'  => 'Visitors',
            'entrance_pages'  => 'Entrance',
            'exit_pages'      => 'Exit',
            'keywords'        => 'Keywords',
            'os'              => 'OS',
            'page_visits'     => 'Page Visits',
            'pages'           => 'Pages',
            'region_visitors' => 'Region Visitors',
            'time_pages'      => 'Time',
            'total_visits'    => 'Total Visits',
            'traffic_sources' => 'Traffic Sources',
            'unique_visits'   => 'Unique Visits',
            'visitors'        => 'Visitors',
            'visits'          => 'Visits',
            'visits_today'    => 'Visits Today',
            'world_visitors'  => 'World Visitor Distribution'
        ],
        'index' => 'Dasbor'
    ],
    'elfinder' => [
        'index' => 'File Manager',
    ],
    'page' => [
        'create' => ' Buat Halaman',
        'edit'   => ' Ubah Halaman',
        'fields' => [
            'content'      => 'Konten',
            'description'  => 'Deskripsi',
            'parent_id'    => 'Parent',
            'title'        => 'Judul',
            'published_at' => 'Dipublikasi pada',
        ],
        'index'  => 'Halaman',
        'show'   => ' Tampilkan Halaman'
    ],
    'parent' => [
        'fields' => [
            'title' => 'Halaman Induk',
        ]
    ],
    'user' => [
        'create' => ' Buat Pengguna',
        'edit'   => ' Ubah Pengguna',
        'fields' => [
            'email'                 => 'Email',
            'ip_address'            => 'IP',
            'logged_in_at'          => 'Login pada',
            'logged_out_at'         => 'Logout pada',
            'password'              => 'Password',
            'password_confirmation' => 'Konfirmasi Password'
        ],
        'index'  => 'Pengguna',
        'show'   => ' Tampilkan Pengguna'
    ],
    'config' => [
        'create' => ' Buat Pengaturan',
        'edit'   => ' Ubah Pengaturan',
        'fields' => [
          'key'     => 'Key',
          'content' => 'Konten',
        ],
        'logo'    => 'Logo',
        'about'   => 'Halaman Tentang',
        'desc'    => 'Deskripsi',
        'phone'   => 'Telepon',
        'email'   => 'Email',
        'address'   => 'Alamat',
        'facebook_url'   => 'Link Facebook',
        'twitter_url'   => 'Link Twitter',
        'instagram_url'   => 'Link Instagram',
        'index'  => 'Pengaturan',
        'show'   => ' Tampilkan Pengaturan'
    ]
];
