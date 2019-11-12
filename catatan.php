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
  - gunakan findOrFail untuk query yang bisa langsung 404
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

/*
  2 November 2019
  28 Product Index & Create
  Buat halaman product dan form create
  29 CRUD Product - @store
  Menampilkan data hasil create
  30 CRUD Product - @edit, @update & @destroy
  Buat edit dan hapus
*/

/*
    3 November 2019
    31 Improvement - Route to Slug
    Ganti url dengan slug, gunakan di model nya, ganti url edit dan destroy nya juga
    public function getRouteKeyName()
    {
        return 'slug';
    }

    32 Improvement - Problem n+1
    Untuk merampingkan query untuk menggunakan eager load dengan cara, memanggil model dari relasi yang di gunakan saat di load
    $products->load('categories'); (di file ProductController)

    33 Fix Bug Update Product
    Saya sudah bener kok
*/

/*
  5 November 2019
  34 MIgration Add Image Field on Products Table
  - untuk menambahkan field pada table yang sudah ada, harus buat migration baru
  - php artisan make:migration add_image_on_products_table --table=products
  - up : $table->string('image')->nullable()->default(null)->after('description');
  - down : $table->dropColoumn('image');

  35 Add Upload Product Image Function
  - ganti config/filesystems.php dari 'root' => storage_path('app') jadi 'root' => public_path() . 'images',

  36 Show Uploaded Image Efficiently
  - buat function untuk memanggil direcory root products
    public function getImage()
    {
        return asset('images/'. $this->image);
    }

  37 Update Image Function
  - hapus jika image sudah ada
    if ($request->hasFile('image')) {
        if ($product->image) {
          Storage::delete($product->image);
        }
        $image = $request->file('image')->store('products');
    } else {
      $image = $product->image;
    }

  38 Delete Image when Delete Product
  - tambahkan Storage::delete($product->image) untuk menghapus file image nya

  39 CRUD Product - Refactor Update Method
  - untuk mengganti if else di 37 update image
    $image = $product->image ?? null;
  40 Flexible Pagination
  - tambah PAGINATION_PER_PAGE=10 di .env
  - buat config sendiri di folder config
  - buat file olshop.php
    return [
        'pagination' => env('PAGINATION_PER_PAGE') ?? 5,
    ]
  - untuk memanggil
    $categories = Category::orderBy('name', 'asc')->paginate(config('olshop.pagination'))

  41 Index Number of Items
    membuat nomer urut sesuai pagination
    @php
        $page = 1;
        if (request()->has('page')) {
            $page = request('page');
        }
        $no = config('olshop.pagination') * $page - (config('olshop.pagination') - 1);
    @endphp

  42 Frontend Page - Switch to Bulma
  - ganti bootstrap jadi bulma
  - npm install
  - npm install bulma
  - tambahkan @import 'node_modules/bulma/bulma'; ke file resources/sass/app.scss
*/

/*
  6 Nov 2019
  43 Frontend - Master Layout to Bulma
  - ganti tampilan class2 dari Frontend menggunakan class dari bulma

  44 Frontend - Fix View Register Form
  - mengganti form register class dari bootstrap dengan bulma

  45 Frontend - Fix View Login Form
  - mengganti form register class dari bootstrap dengan bulma

  46 Frontend - FIx VIew Reset Password
  - mengganti form reset class dari bootstrap dengan bulma
  - setting mailtrap.io
  - ganti file username dan password sesusai dengan uname pass dari mailtrap.io
  - ganti juga di config/mail.php jadi
    'host' => env('MAIL_HOST', 'mailtrap.io'),
    'port' => env('MAIL_PORT', 2525),
  - untuk mengganti link url reset password nya, masuk di .env ganti APP_URL nya
  - APP_URL=http://127.0.0.1:8000 (sesuaikan url dengan alamat aplikasinya)

  47 Frontend - Fix Function on Register Form add Assign Role
  - memberikan role pada saat register user
  - perbarui file Http/Controllers/Auth/RegisterController.php
  protected function create(array $data)
  {
      $user = User::create([
          'name' => strtolower($data['name']),
          'email' => $data['email'],
          'password' => Hash::make($data['password']),
          'address' => $data['address'],
          'phone' => $data['phone'],
      ]);

      $user->assignRole('user');

      return $user;
  }

  48 Frontend - Index Page
  - membuat tampilan sesuai dengan css bulma

  49 Frontend - Showing Product List
*/

/*
  12 November 2019

  50 Frontend - Bulma Pagination Style
  membuat pagination bulma
  https://bulma.io/documentation/components/pagination/

  sesuaikan views/vendor/pagination/default -> duplikat, sesuaikan dengan css nya bulma
*/
