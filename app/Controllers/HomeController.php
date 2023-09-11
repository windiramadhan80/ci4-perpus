<?php

namespace App\Controllers;

use App\Models\BukuModel;
use App\Models\MenuModel;
use App\Models\EbookModel;
use App\Models\BeritaModel;
use App\Models\JurnalModel;
use App\Models\PerpusModel;
use App\Models\SliderModel;
use App\Models\ContactModel;
use App\Models\GalleryModel;
use App\Models\SubmenuModel;
use App\Models\EksternalModel;
use App\Models\EresourceModel;
use App\Models\QuicklinkModel;
use App\Models\RepositoryModel;
use App\Models\SinglemenuModel;
use App\Models\LayananUnggulanModel;

class HomeController extends BaseController
{
    // Model
    protected $menuModel, $submenuModel, $singleMenuModel, $sliderModel, $layananUnggulanModel, $jurnalModel, $ebookModel, $beritaModel, $galleryModel, $bukuModel, $eresourceModel, $eksternalModel, $repositoryModel, $perpusModel, $quicklinkModel, $contactModel;

    // Navbar
    protected $menu, $submenu, $singleMenu, $repositories;

    // Footer
    Protected $perpus, $quicklink, $contact;

    public function __construct()
    {
        // Navbar
        $this->menuModel = model(MenuModel::class);
        $this->submenuModel = model(SubmenuModel::class);
        $this->singleMenuModel = model(SinglemenuModel::class);

        // Footer
        $this->perpusModel = model(PerpusModel::class);
        $this->quicklinkModel = model(QuicklinkModel::class);
        $this->contactModel = model(ContactModel::class);

        $this->sliderModel = model(SliderModel::class);
        $this->layananUnggulanModel = model(LayananUnggulanModel::class);
        $this->jurnalModel = model(JurnalModel::class);
        $this->ebookModel = model(EbookModel::class);
        $this->beritaModel = model(BeritaModel::class);
        $this->galleryModel = model(GalleryModel::class);
        $this->bukuModel = model(BukuModel::class);
        $this->eresourceModel = model(EresourceModel::class);
        $this->eksternalModel = model(EksternalModel::class);
        $this->repositoryModel = model(RepositoryModel::class);

        // Navbar
        $this->menu = $this->menuModel->get();
        $this->submenu = $this->submenuModel->get();
        $this->singleMenu = $this->singleMenuModel->get();
        $this->repositories = $this->repositoryModel->get();

        // Footer
        $this->perpus = $this->perpusModel->get();
        $this->quicklink = $this->quicklinkModel->get();
        $this->contact = $this->contactModel->get();
    }

    public function index()
    {

        $sliders = $this->sliderModel->get();
        $layananUnggulan = $this->layananUnggulanModel->get();
        $jurnals = $this->jurnalModel->get();
        $ebooks = $this->ebookModel->get();
        $berita = $this->beritaModel->paginate(3);
        $pager = \Config\Services::pager();
        $buku = $this->bukuModel->get();
        $eResource = $this->eresourceModel->get();
        $eksternal = $this->eksternalModel->get();

        $data = [
            'title' => 'Home',

            // Data Navbar Start
            'menu' => $this->menu->getResult(),
            'submenu' => $this->submenu->getResult(),
            'singleMenu' => $this->singleMenu->getResult(),
            'repositories' => $this->repositories->getResult(),
            // Data Navbar End

            // Data Footer Start
            'perpus' => $this->perpus->getResult(),
            'quicklink' => $this->quicklink->getResult(),
            'contact' => $this->contact->getResult(),
            // Data Footer End

            'sliders' => $sliders->getResult(),
            'layananUnggulan' => $layananUnggulan->getResult(),
            'jurnals' => $jurnals->getResult(),
            'ebooks' => $ebooks->getResult(),
            'berita' => $berita,
            'pager' => $pager,
            'buku' => $buku->getResult(),
            'eResource' => $eResource->getResult(),
            'eksternal' => $eksternal->getResult(),
        ];

        return view('welcome', $data);
    }

    public function menu($slug)
    {

        // Detail
        $this->submenuModel->where('slug', $slug);
        $query = $this->submenuModel->get();
        $detailMenu = $query->getRow();

        $data = [
            'title' => $detailMenu->submenu,

            // Data Navbar Start
            'menu' => $this->menu->getResult(),
            'submenu' => $this->submenu->getResult(),
            'singleMenu' => $this->singleMenu->getResult(),
            'repositories' => $this->repositories->getResult(),
            // Data Navbar End

            // Data Footer Start
            'perpus' => $this->perpus->getResult(),
            'quicklink' => $this->quicklink->getResult(),
            'contact' => $this->contact->getResult(),
            // Data Footer End

            'detailMenu' => $detailMenu,
        ];

        return view('home/menu/detail', $data);
    }
    public function single_menu($slug)
    {

        // Detail
        $this->singleMenuModel->where('slug', $slug);
        $query = $this->singleMenuModel->get();
        $detailSingleMenu = $query->getRow();

        $data = [
            'title' => $detailSingleMenu->single_menu,

            // Data Navbar Start
            'menu' => $this->menu->getResult(),
            'submenu' => $this->submenu->getResult(),
            'singleMenu' => $this->singleMenu->getResult(),
            'repositories' => $this->repositories->getResult(),
            // Data Navbar End

            // Data Footer Start
            'perpus' => $this->perpus->getResult(),
            'quicklink' => $this->quicklink->getResult(),
            'contact' => $this->contact->getResult(),
            // Data Footer End

            'detailSingleMenu' => $detailSingleMenu,
        ];

        return view('home/singleMenu/detail', $data);
    }

    public function galeri(): string
    {

        $galleries = $this->galleryModel->get();

        $data = [
            'title' => 'Home',

            // Data Navbar Start
            'menu' => $this->menu->getResult(),
            'submenu' => $this->submenu->getResult(),
            'singleMenu' => $this->singleMenu->getResult(),
            'repositories' => $this->repositories->getResult(),
            // Data Navbar End

            // Data Footer Start
            'perpus' => $this->perpus->getResult(),
            'quicklink' => $this->quicklink->getResult(),
            'contact' => $this->contact->getResult(),
            // Data Footer End

            'galleries' => $galleries->getResult(),
        ];

        return view('galeri', $data);
    }

    public function beritalainnya(): string
    {
        $berita = $this->beritaModel->get();

        $data = [
            'title' => 'Home',

            // Data Navbar Start
            'menu' => $this->menu->getResult(),
            'submenu' => $this->submenu->getResult(),
            'singleMenu' => $this->singleMenu->getResult(),
            'repositories' => $this->repositories->getResult(),
            // Data Navbar End

            // Data Footer Start
            'perpus' => $this->perpus->getResult(),
            'quicklink' => $this->quicklink->getResult(),
            'contact' => $this->contact->getResult(),
            // Data Footer End
            
            'berita' => $berita->getResult(),
        ];

        return view('beritalainnya', $data);
    }
}
