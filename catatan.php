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