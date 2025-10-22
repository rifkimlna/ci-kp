<?php
namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;

class Home extends BaseController
{
    protected $productModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        // Simulasi session untuk testing
        $session = session();

        // Jika belum ada session, set default untuk testing
        if (!$session->get('isLoggedIn')) {
            $session->set('isLoggedIn', false);
        }

        $data = [
            'title' => 'Sewa Kamera Pro - Ciptakan Konten Terbaik',
            'featured_products' => $this->productModel->getFeaturedProducts(3),
            'products' => $this->productModel->getProductsWithCategory()
        ];

        return view('home', $data);
    }

    public function katalog()
    {
        $category_id = $this->request->getGet('kategori');
        $search = $this->request->getGet('search');

        $products = [];

        if (!empty($search)) {
            // Search products
            $products = $this->productModel->searchProducts($search);
        } elseif (!empty($category_id)) {
            // Filter by category
            $products = $this->productModel->getProductsByCategory($category_id);
        } else {
            // All products
            $products = $this->productModel->getProductsWithCategory();
        }

        $data = [
            'title' => 'Katalog Produk - PRORENTAL',
            'products' => $products,
            'categories' => $this->categoryModel->getAllCategories(),
            'current_category' => $category_id,
            'search_keyword' => $search
        ];

        return view('katalog', $data);
    }

    public function sewa($id)
    {
        // Untuk sementara redirect ke katalog
        return redirect()->to('/katalog');
    }

    public function detailProduk($id)
    {
        $product = $this->productModel->find($id);

        if (!$product) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title' => $product['nama_produk'] . ' - PRORENTAL',
            'product' => $product
        ];

        return view('detail_produk', $data);
    }
}