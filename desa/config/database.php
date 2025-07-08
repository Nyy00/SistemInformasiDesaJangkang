<?php
// -------------------------------------------------------------------------
//
// Letakkan username, password dan database sebetulnya di file ini.
// File ini JANGAN di-commit ke GIT. TAMBAHKAN di .gitignore
// -------------------------------------------------------------------------

// Data Konfigurasi MySQL yang disesuaikan

$db['default']['hostname'] = 'localhost';
$db['default']['username'] = 'root';
$db['default']['password'] = 'eyJpdiI6IjVkNWN0TlhDR2pSS1VNbDdMZnZMY3c9PSIsInZhbHVlIjoicTdUYUREZXB6QjR3djlUODNNYkcvQT09IiwibWFjIjoiNTc2NmJjNmIyYTk4MzQ2ZGMzOWRlZmJmZTM0NTJjMzBmNWRjMWFkYzliZjhkNzE2MTA1MzhiMGY1NmFlOWFiMCIsInRhZyI6IiJ9';
$db['default']['port']     = 3306;
$db['default']['database'] = 'opensid_db';
$db['default']['dbcollat'] = 'utf8mb4_general_ci';

/*
| Untuk setting koneksi database 'Strict Mode'
| Sesuaikan dengan ketentuan hosting
*/
$db['default']['stricton'] = true;