<?php

07 Juni 2018
/* 1. Buat Migration Untuk Database */

/* 2. Buat Auth
	- Kelompokkan ke dalam model auth ke dalam folder model
	- Ganti namespace model User.php sesuaikan folder nya
	- Ganti namespace controller RegisterController.php sesuaikan folder nya
	- Ganti providers->users->model sesuai dengan folder nya
 */

/* 3 - 4. Templating Blade
	- Copy master template ke folder public
	- Buat template ber-part
*/

/* 5. install laravel debugbar (composer require barryvdh/laravel-debugbar --dev) */

/* 6, 7, 8. Setup Role - Permision
	// 6
	- Role : (admin, user, super admin)
	- Permission : (read, update, delete, store)
	// 7
	- BelongsToMany (Eloquent Many to Many)
	- Buat trait untuk user permission agar lebih rapi (App\Permissions\HasPermissionTrait)
	// 8
	- Buat function didalam "hasPermissionTrait", 1. hasRole, 2. hasPermissionTo, 3. hasPermission
	- Buat provider baru untuk cek permission nya di awal (php artisan make:provider PermissionsServiceProvider)
	- Alur provider, 1. ambil semua permission di model,
 */

/* 9, Setup Role - Permission
	// 9
	- Buat method hasPermissionThroughRole dan hasPermission(untuk membuat cek permission yang mempuyai role tertentu, dan juga cek permission)
	- tabel users_permissions digunakan untuk memberikan permission spesial untuk user, misal user tertentu bisa mendelete akun seorang user
 */

/* 10 Setup Roles & Permissions - Giving, Revoking, Updating Permissions
	// untuk memberikan permission, menghapus, dan mengupdate permission
	1. givePermissionTo (memberikan permission)
	2. revokePermissionTo (menghapus permission)
	3. updatePermission (mengupdate permission)
 */

/*
	11 Setup Roles & Permissions - Custom Blade Directives (@roles)
	// membuat blade directive role
	-> membuat di PermissionsServiceProvider.php (@role @endrole)
 */

/*
  12 Setup Roles & Permissions - Middleware
  - buat middleware, routing untuk membatasi hak acces
  - jangan lupa untuk daftarkan RoleMiddleware kedalam kerne.php
  */

/*
  13 Setup Roles & Permissions - Assign, Remove , Sync Role
  - menambah, menghapus, meng-update user roles
  - buat method di HasPermissionTrait
  - testing dari routing
 */
/*
  14 Setup Application - Roles & User Seeder
  - gunakan DefaultSeeder.php
*/

/*
  15 Setup Admin Route
  - setup Seeder
  - cek routing dan middleware
*/

/*
  16 Admin Login
  - redirect url Login
*/

/*
  17 Cleaning Up Admin Template
  - clean admin, menyesuaikan kebutuhan tampilan
*/

/*
  31 Oktober 2019
  18 CRUD Category - Index ( Read )
  membuat tampilan untuk read data category, data inputan awal langsung ke database
  19 CRUD Category - Add Data ( @create )
  membuat form add category, dan memberikan validasi
  20 CRUD Category - Add Data ( @store )
  menambah data kategori
  21 CRUD Category - Edit Data ( @edit , @update )
  edit data category
  22 CRUD Category - Delete Category ( @destroy )
  hapus data category
  23 CRUD Category - Add Alert ( Flash Message )
  membuat alert untuk tambah, edit, delete
  24 Bug Fix Dialog Delete
  hanya memperbaiki kesalahan untuk menampilka alert notice
*/

/*
  1 Oktober 2019
  25 CRUD Category - Small Refactoring
  memmanfaatkan route binding laravel untuk refactorung modeliing
  26 CRUD Category - Pagination
  - php artisan vendor:publish
  - pilih laravel-pagination
  - sesuaikan class paginate nya sesuai templatenya
  - untuk memanggil {{ $categories->links('vendor.pagination.adminlte') }}
  27 Category Seeder
  - membuat kategori seeder
  - php artisan make:migrate --seed
*/
