<?php
class ProductsController extends Controller
{
    private $pageTpl = "/view/products.tpl.php";  //шаблон для страницы кабинета
    public function __construct()
    {
        $this->model = new ProductsModel();
        $this->view = new View();
    }
    public function index()
    {
        if (!$_SESSION['user']) {  //если пол-ть не адресован
            header("Location: /");
        }
        $this->pageData['products'] = $this->model->getAllProducts();
        $this->pageData['title'] = "Товары";
        $this->view->render($this->pageTpl, $this->pageData);


        if ($_FILES) {
            if ($_FILES['csv']['type'] != 'text/csv' || $_FILES['csv']['type'] == '') {
                print_r($_FILES);
                $this->pageData['errors'] = "Ошибка! Возможно данный файл имеет некорректный формат";
            } else {

                if (move_uploaded_file($_FILES['csv']['tmp_name'], UPLOAD_FOLDER . $_FILES['csv']['name'])) { //переписываем из временного файла в реальное физическое    
                    $file = fopen(UPLOAD_FOLDER . $_FILES['csv']['name'], "r");
                    $row = 1;
                    while ($data = fgetcsv($file, 200, ";")) { //читаем данные из csv файла
                        if ($row == 1) {
                            $row++;
                            continue;
                        } else {
                            $this->model->addFromCSV($data);
                        }
                    }
                    fclose($file);
                    $this->model->getAllProducts();
                }
            }
        }
    }

    public function getProduct()
    {
        if (!$_SESSION['user']) {
            header("Location: /");
            return;
        }
        
         //if (!isset($_GET['id_product'])) {
         //    echo json_encode(array("success" => false));
        // } else {
              $productId = $_GET['id_product'];
        //      echo $productId ;
          $produtInfo = json_encode($this->model->getProductById($productId));
            echo $produtInfo;
     //   }
    }

    public function saveProduct() {
        if(!$_SESSION['user']) {
            header("Location: /");
            return;
        }
        if(!isset($_POST['id']) || trim($_POST['name']) == '' || trim($_POST['price']) == '') {
            echo json_encode(array("success" => false));
        } else {
            $productId = $_POST['id'];
            $productName = trim($_POST['name']);
            $productPrice = trim($_POST['price']);
            print_r($_POST);
            if($this->model->saveProductInfo($productId, $productName, $productPrice)) {
                echo json_encode(array("success" => true));
            } else {
                echo json_encode(array("success" => false));
            }
       }
    }
    public function addProduct() {
        if(!$_SESSION['user']) {
            header("Location: /");
            return;
        }
        if(empty($_POST) || trim($_POST['productName']) == '' || trim($_POST['productPrice']) == '') {
            echo json_encode(array("success" => false));
        } else {
            $productName = trim($_POST['productName']);
            $productPrice = trim($_POST['productPrice']);
            if($this->model->addProduct($productName, $productPrice)) {
                echo json_encode(array("success" => true));
            } else {
                echo json_encode(array("success" => false));
            }
        }
    }
    public function deleteProduct() {
        if(!$_SESSION['user']) {
            header("Location: /");
            return;
        }
        if(empty($_POST) || !isset($_POST['id'])) {
            echo json_encode(array("success" => false));
        } else {
            $productId = $_POST['id'];
            if($this->model->deleteProduct($productId)) {
                echo json_encode(array("success" => true));
            } else {
                echo json_encode(array("success" => false));
            }
        }
    }
}
