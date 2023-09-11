<?php

namespace Config;

use App\Controllers\BukuController;
use App\Controllers\HomeController;
use App\Controllers\MenuController;
use App\Controllers\UserController;
use App\Controllers\EbookController;
use App\Controllers\BeritaController;
use App\Controllers\ContactController;
use App\Controllers\JurnalController;
use App\Controllers\PerpusController;
use App\Controllers\SliderController;
use App\Controllers\GalleryController;
use App\Controllers\SubmenuController;
use App\Controllers\DashboardController;
use App\Controllers\EksternalController;
use App\Controllers\EresourceController;
use App\Controllers\RepositoryController;
use App\Controllers\SinglemenuController;
use App\Controllers\LayananUnggulanController;
use App\Controllers\QuicklinkController;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Home Start
$routes->get('/', [HomeController::class, 'index']);
$routes->get('/home/menu/(:segment)', [HomeController::class, 'menu/$1'], ['as' => 'homeMenu']);
$routes->get('/home/single-menu/(:segment)', [HomeController::class, 'single_menu/$1'], ['as' => 'homeSingleMenu']);
$routes->get('/galeri', [HomeController::class, 'galeri']);
$routes->get('/beritalainnya', [HomeController::class, 'beritalainnya']);
// Home End

// Admin Start

$routes->get('/dashboard', [DashboardController::class, 'index'], ['filter' => 'role:admin,super_admin'], ['as' => 'dashboard']);
$routes->get('/users', [UserController::class, 'index'], ['filter' => 'role:super_admin'], ['as' => 'users']);

//CRUD USER START
$routes->get('/users/(:num)', [UserController::class, 'detail/$1'], ['filter' => 'role:super_admin'], ['as' => 'detailUser']);
$routes->get('/users/edit/(:num)', [UserController::class, 'edit/$1'], ['filter' => 'role:super_admin'], ['as' => 'editUser']);
$routes->put('/users/update/(:num)', [UserController::class, 'update/$1'], ['filter' => 'role:super_admin']);
$routes->delete('users/delete/(:num)', [UserController::class, 'delete/$1'], ['filter' => 'role:super_admin']);
// CRUD USER END

// CRUD SLIDER START
$routes->get('/slider', [SliderController::class, 'index'], ['filter' => 'role:admin,super_admin'], ['as' => 'slider']);
$routes->get('/slider/create', [SliderController::class, 'create'], ['filter' => 'role:admin,super_admin'], ['as' => 'createSlider']);
$routes->post('/slider/save', [SliderController::class, 'save'], ['filter' => 'role:admin,super_admin']);
$routes->get('/slider/edit/(:num)', [SliderController::class, 'edit/$1'], ['filter' => 'role:admin,super_admin'], ['as' => 'editSlider']);
$routes->put('/slider/update/(:num)', [SliderController::class, 'update/$1'], ['filter' => 'role:admin,super_admin']);
$routes->delete('/slider/delete/(:num)', [SliderController::class, 'delete/$1'], ['filter' => 'role:admin,super_admin']);
// CRUD SLIDER END

// CRUD LAYANAN UNGGULAN START
$routes->get('/layanan-unggulan', [LayananUnggulanController::class, 'index'], ['filter' => 'role:admin,super_admin'], ['as' => 'layananUnggulan']);
$routes->get('/layanan-unggulan/create', [LayananUnggulanController::class, 'create'], ['filter' => 'role:admin,super_admin'], ['as' => 'createLayananUnggulan']);
$routes->post('/layanan-unggulan/save', [LayananUnggulanController::class, 'save'], ['filter' => 'role:admin,super_admin']);
$routes->get('/layanan-unggulan/edit/(:num)', [LayananUnggulanController::class, 'edit/$1'], ['filter' => 'role:admin,super_admin'], ['as' => 'editLayananUnggulan']);
$routes->put('/layanan-unggulan/update/(:num)', [LayananUnggulanController::class, 'update/$1'], ['filter' => 'role:admin,super_admin']);
$routes->delete('/layanan-unggulan/delete/(:num)', [LayananUnggulanController::class, 'delete/$1'], ['filter' => 'role:admin,super_admin']);
// CRUD LAYANAN UNGGULAN END

// CRUD JURNAL START
$routes->get('/jurnal-langgan', [JurnalController::class, 'index'], ['filter' => 'role:admin,super_admin'], ['as' => 'jurnal']);
$routes->get('/jurnal-langgan/create', [JurnalController::class, 'create'], ['filter' => 'role:admin,super_admin'], ['as' => 'cerateJurnal']);
$routes->post('/jurnal-langgan/save', [JurnalController::class, 'save'], ['filter' => 'role:admin,super_admin']);
$routes->get('/jurnal-langgan/edit/(:num)', [JurnalController::class, 'edit/$1'], ['filter' => 'role:admin,super_admin'], ['as' => 'editJurnal']);
$routes->put('/jurnal-langgan/update/(:num)', [JurnalController::class, 'update/$1'], ['filter' => 'role:admin,super_admin']);
$routes->delete('/jurnal-langgan/delete/(:num)', [JurnalController::class, 'delete/$1'], ['filter' => 'role:admin,super_admin']);
// CRUD JURNAL END

// CRUD EBOOKS START
$routes->get('/ebooks', [EbookController::class, 'index'], ['filter' => 'role:admin,super_admin'], ['as' => 'ebooks']);
$routes->get('/ebooks/create', [EbookController::class, 'create'], ['filter' => 'role:admin,super_admin'], ['as' => 'cerateEbooks']);
$routes->post('/ebooks/save', [EbookController::class, 'save'], ['filter' => 'role:admin,super_admin']);
$routes->get('/ebooks/edit/(:num)', [EbookController::class, 'edit/$1'], ['filter' => 'role:admin,super_admin'], ['as' => 'editEbooks']);
$routes->put('/ebooks/update/(:num)', [EbookController::class, 'update/$1'], ['filter' => 'role:admin,super_admin']);
$routes->delete('/ebooks/delete/(:num)', [EbookController::class, 'delete/$1'], ['filter' => 'role:admin,super_admin']);
// CRUD EBOOKS END

// CRUD BERITA PERPUSTAKAAN START
$routes->get('/berita', [BeritaController::class, 'index'], ['filter' => 'role:admin,super_admin'], ['as' => 'berita']);
$routes->get('/berita/create', [BeritaController::class, 'create'], ['filter' => 'role:admin,super_admin'], ['as' => 'cerateBerita']);
$routes->post('/berita/save', [BeritaController::class, 'save'], ['filter' => 'role:admin,super_admin']);
$routes->get('/berita/(:segment)', [BeritaController::class, 'detail/$1'], ['filter' => 'role:admin,super_admin'], ['as' => 'detailBerita']);
$routes->get('/berita/edit/(:num)', [BeritaController::class, 'edit/$1'], ['filter' => 'role:admin,super_admin'], ['as' => 'editBerita']);
$routes->put('/berita/update/(:num)', [BeritaController::class, 'update/$1'], ['filter' => 'role:admin,super_admin']);
$routes->delete('/berita/delete/(:num)', [BeritaController::class, 'delete/$1'], ['filter' => 'role:admin,super_admin']);
// CRUD BERITA PERPUSTAKAAN END

// CRUD BUKU TERBARU START
$routes->get('/buku-terbaru', [BukuController::class, 'index'], ['filter' => 'role:admin,super_admin'], ['as' => 'buku']);
$routes->get('/buku-terbaru/create', [BukuController::class, 'create'], ['filter' => 'role:admin,super_admin'], ['as' => 'cerateBuku']);
$routes->post('/buku-terbaru/save', [BukuController::class, 'save'], ['filter' => 'role:admin,super_admin']);
$routes->get('/buku-terbaru/edit/(:num)', [BukuController::class, 'edit/$1'], ['filter' => 'role:admin,super_admin'], ['as' => 'editBuku']);
$routes->put('/buku-terbaru/update/(:num)', [BukuController::class, 'update/$1'], ['filter' => 'role:admin,super_admin']);
$routes->delete('/buku-terbaru/delete/(:num)', [BukuController::class, 'delete/$1'], ['filter' => 'role:admin,super_admin']);
// CRUD BUKU TERBARU END

// CRUD E-RESOURCE START
$routes->get('/e-resource', [EresourceController::class, 'index'], ['filter' => 'role:admin,super_admin'], ['as' => 'eResource']);
$routes->get('/e-resource/create', [EresourceController::class, 'create'], ['filter' => 'role:admin,super_admin'], ['as' => 'cerateEresource']);
$routes->post('/e-resource/save', [EresourceController::class, 'save'], ['filter' => 'role:admin,super_admin']);
$routes->get('/e-resource/edit/(:num)', [EresourceController::class, 'edit/$1'], ['filter' => 'role:admin,super_admin'], ['as' => 'editEresource']);
$routes->put('/e-resource/update/(:num)', [EresourceController::class, 'update/$1'], ['filter' => 'role:admin,super_admin']);
$routes->delete('/e-resource/delete/(:num)', [EresourceController::class, 'delete/$1'], ['filter' => 'role:admin,super_admin']);
// CRUD E-RESOURCE END

// CRUD AKSES EKSTERNAL START
$routes->get('/eksternal', [EksternalController::class, 'index'], ['filter' => 'role:admin,super_admin'], ['as' => 'eksternal']);
$routes->get('/eksternal/create', [EksternalController::class, 'create'], ['filter' => 'role:admin,super_admin'], ['as' => 'cerateEksternal']);
$routes->post('/eksternal/save', [EksternalController::class, 'save'], ['filter' => 'role:admin,super_admin']);
$routes->get('/eksternal/edit/(:num)', [EksternalController::class, 'edit/$1'], ['filter' => 'role:admin,super_admin'], ['as' => 'editEksternal']);
$routes->put('/eksternal/update/(:num)', [EksternalController::class, 'update/$1'], ['filter' => 'role:admin,super_admin']);
$routes->delete('/eksternal/delete/(:num)', [EksternalController::class, 'delete/$1'], ['filter' => 'role:admin,super_admin']);
// CRUD AKSES EKSTERNAL END

// CRUD GALLERY START
$routes->get('/gallery', [GalleryController::class, 'index'], ['filter' => 'role:admin,super_admin'], ['as' => 'gallery']);
$routes->get('/gallery/create', [GalleryController::class, 'create'], ['filter' => 'role:admin,super_admin'], ['as' => 'cerateGallery']);
$routes->post('/gallery/save', [GalleryController::class, 'save'], ['filter' => 'role:admin,super_admin']);
$routes->get('/gallery/edit/(:num)', [GalleryController::class, 'edit/$1'], ['filter' => 'role:admin,super_admin'], ['as' => 'editGallery']);
$routes->put('/gallery/update/(:num)', [GalleryController::class, 'update/$1'], ['filter' => 'role:admin,super_admin']);
$routes->delete('/gallery/delete/(:num)', [GalleryController::class, 'delete/$1'], ['filter' => 'role:admin,super_admin']);
// CRUD GALLERY END

// EDIT LINK REPOSITORI START
$routes->get('/repositori', [RepositoryController::class, 'index'], ['filter' => 'role:admin,super_admin'], ['as' => 'repository']);
$routes->get('/repositori/edit/(:num)', [RepositoryController::class, 'edit/$1'], ['filter' => 'role:admin,super_admin']);
$routes->put('/repositori/update/(:num)', [RepositoryController::class, 'update/$1'], ['filter' => 'role:admin,super_admin']);
// EDIT LINK REPOSITORI END

// CRUD PERPUS START
$routes->get('/perpus', [PerpusController::class, 'index'], ['filter' => 'role:admin,super_admin'], ['as' => 'perpus']);
$routes->get('/perpus/create', [PerpusController::class, 'create'], ['filter' => 'role:admin,super_admin'], ['as' => 'ceratePerpus']);
$routes->post('/perpus/save', [PerpusController::class, 'save'], ['filter' => 'role:admin,super_admin']);
$routes->get('/perpus/edit/(:num)', [PerpusController::class, 'edit/$1'], ['filter' => 'role:admin,super_admin'], ['as' => 'editPerpus']);
$routes->put('/perpus/update/(:num)', [PerpusController::class, 'update/$1'], ['filter' => 'role:admin,super_admin']);
$routes->delete('/perpus/delete/(:num)', [PerpusController::class, 'delete/$1'], ['filter' => 'role:admin,super_admin']);
// CRUD PERPUS END

// CRUD QUICKLINK START
$routes->get('/quicklink', [QuicklinkController::class, 'index'], ['filter' => 'role:admin,super_admin'], ['as' => 'quicklink']);
$routes->get('/quicklink/create', [QuicklinkController::class, 'create'], ['filter' => 'role:admin,super_admin'], ['as' => 'cerateQuicklink']);
$routes->post('/quicklink/save', [QuicklinkController::class, 'save'], ['filter' => 'role:admin,super_admin']);
$routes->get('/quicklink/edit/(:num)', [QuicklinkController::class, 'edit/$1'], ['filter' => 'role:admin,super_admin'], ['as' => 'editQuicklink']);
$routes->put('/quicklink/update/(:num)', [QuicklinkController::class, 'update/$1'], ['filter' => 'role:admin,super_admin']);
$routes->delete('/quicklink/delete/(:num)', [QuicklinkController::class, 'delete/$1'], ['filter' => 'role:admin,super_admin']);
// CRUD QUICKLINK END

// CRUD CONTACT START
$routes->get('/contact', [ContactController::class, 'index'], ['filter' => 'role:admin,super_admin'], ['as' => 'contact']);
$routes->get('/contact/create', [ContactController::class, 'create'], ['filter' => 'role:admin,super_admin'], ['as' => 'cerateContact']);
$routes->post('/contact/save', [ContactController::class, 'save'], ['filter' => 'role:admin,super_admin']);
$routes->get('/contact/edit/(:num)', [ContactController::class, 'edit/$1'], ['filter' => 'role:admin,super_admin'], ['as' => 'editContact']);
$routes->put('/contact/update/(:num)', [ContactController::class, 'update/$1'], ['filter' => 'role:admin,super_admin']);
$routes->delete('/contact/delete/(:num)', [ContactController::class, 'delete/$1'], ['filter' => 'role:admin,super_admin']);
// CRUD CONTACT END

// CRUD MENU START
$routes->get('/menu', [MenuController::class, 'index'], ['filter' => 'role:admin,super_admin'], ['as' => 'menu']);
$routes->get('/menu/create', [MenuController::class, 'create'], ['filter' => 'role:admin,super_admin'], ['as' => 'createMenu']);
$routes->post('/menu/save', [MenuController::class, 'save'], ['filter' => 'role:admin,super_admin']);
$routes->get('/menu/edit/(:num)', [MenuController::class, 'edit/$1'], ['filter' => 'role:admin,super_admin']);
$routes->put('/menu/update/(:num)', [MenuController::class, 'update/$1'], ['filter' => 'role:admin,super_admin']);
$routes->delete('/menu/delete/(:num)', [MenuController::class, 'delete/$1'], ['filter' => 'role:admin,super_admin']);
// CRUD MENU END

// CRUD SUBMENU START
$routes->get('/submenu/create', [SubmenuController::class, 'create'], ['filter' => 'role:admin,super_admin'], ['as' => 'createSubmenu']);
$routes->get('/submenu/(:num)', [SubmenuController::class, 'detail/$1'], ['filter' => 'role:admin,super_admin'], ['as' => 'detailSubmenu']);
$routes->post('/submenu/save', [SubmenuController::class, 'save'], ['filter' => 'role:admin,super_admin']);
$routes->get('/submenu/edit/(:num)', [SubmenuController::class, 'edit/$1'], ['filter' => 'role:admin,super_admin'], ['as' => 'editSubmenu']);
$routes->put('/submenu/update/(:num)', [SubmenuController::class, 'update/$1'], ['filter' => 'role:admin,super_admin']);
$routes->delete('/submenu/delete/(:num)', [SubmenuController::class, 'delete/$1'], ['filter' => 'role:admin,super_admin']);
// CRUD SUBMENU END

// CRUD SINGLE MENU START
$routes->get('/single-menu', [SinglemenuController::class, 'index'], ['filter' => 'role:admin,super_admin'], ['as' => 'singleMenu']);
$routes->get('/single-menu/create', [SinglemenuController::class, 'create'], ['filter' => 'role:admin,super_admin'], ['as' => 'createSingleMenu']);
$routes->get('/single-menu/(:num)', [SinglemenuController::class, 'detail/$1'], ['filter' => 'role:admin,super_admin'], ['as' => 'detailSingleMenu']);
$routes->post('/single-menu/save', [SinglemenuController::class, 'save'], ['filter' => 'role:admin,super_admin']);
$routes->get('/single-menu/edit/(:num)', [SinglemenuController::class, 'edit/$1'], ['filter' => 'role:admin,super_admin'], ['as' => 'editSingleMenu']);
$routes->put('/single-menu/update/(:num)', [SinglemenuController::class, 'update/$1'], ['filter' => 'role:admin,super_admin']);
$routes->delete('/single-menu/delete/(:num)', [SinglemenuController::class, 'delete/$1'], ['filter' => 'role:admin,super_admin']);
// CRUD SINGLE MENU END

// Admin End

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
