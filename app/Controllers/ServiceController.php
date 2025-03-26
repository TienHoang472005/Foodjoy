<?php
namespace App\Controllers;

use App\Models\Category;
use App\Models\Service;

class ServiceController extends BaseController
{
    protected $serviceModel;
    protected $categoryModel;


    public function __construct()
    {
        $this->serviceModel = new Service();
        $this->categoryModel = new Category();

    }

    public function index()
    {
        $services = $this->serviceModel->getAllService();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        $categories = $this->categoryModel->getAllCategory();
        return view('admin.services.create', compact('categories'));
    }

    public function store()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $category_id = $_POST['category_id'];
            $name = $_POST['name'];
            $file = $_FILES['img_thumbnail'];
            $overview = $_POST['overview'];
            $content = $_POST['content'];

            if(is_upload('img_thumbnail'))
            {
                $img_thumbnail = $this->uploadFile($file, 'services');
            }else
            {
                $img_thumbnail = null;
            }

            $this->serviceModel->add([
                'category_id' => $category_id,
                'name' => $name,
                'img_thumbnail' => $img_thumbnail,
                'overview' => $overview,
                'content' => $content,
                'created_at'=> date('Y-m-d H:i:s')
            ]);
            redirect('admin/services');
        }else{
            redirect404();
        }
    }

    public function show($id)
    {   
        $category = $this->categoryModel->getId($id);
        $service = $this->serviceModel->getId($id);
        $categories = $this->categoryModel->getAllCategory();
        return view('admin.services.show', compact('service', 'categories', 'category'));
    }

    public function edit($id)
    {
        $service = $this->serviceModel->getId($id);
        $categories = $this->categoryModel->getAllCategory();
        return view('admin.services.edit', compact('service', 'categories'));
    }

    public function update($id)
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $service = $this->serviceModel->getId($id);

            $category_id = $_POST['category_id'];
            $name = $_POST['name'];
            $file = $_FILES['img_thumbnail'];
            $overview = $_POST['overview'];
            $content = $_POST['content'];

            if(is_upload('img_thumbnail'))
            {
                if(!empty($service['img_thumbnail']) && file_exists($service['img_thumbnail'])){
                    unlink($service['img_thumbnail']);
                }
                $img_thumbnail = $this->uploadFile($_FILES['img_thumbnail'], 'services');
            }else
            {
                $img_thumbnail = $_FILES['img_thumbnail'];;
            }

            $this->serviceModel->update($id,[
                'category_id' => $category_id,
                'name' => $name,
                'img_thumbnail' => $img_thumbnail,
                'overview' => $overview,
                'content' => $content,
                'updated_at'=> date('Y-m-d H:i:s')
            ]);
            redirect('admin/services');
        }else{
            redirect404();
        }
    }

    public function destroy($id)
    {
        $service = $this->serviceModel->getId($id);
        if(!empty($service['img_thumbnail']) && file_exists($service['img_thumbnail'])){
            unlink($service['img_thumbnail']);
        }
        $this->serviceModel->delete($id);
        redirect('admin/services');
    }
}