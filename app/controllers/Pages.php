<?php
  Class Pages extends Controller{
    public function __construct(){
      $this->pageModel = $this->model('Page');
      
    }

    public function index(){
      $this->view('pages/index');
    }

    public function about(){
      $this->view('pages/about');
    }

    public function contact(){
      $this->view('pages/contact');
    }

    public function facilities(){
      $this->view('pages/facilities');
    }

    public function gallery(){
      $this->view('pages/gallery');
    }

    public function issues(){

      $data = [
        'cusName' => '',
        'cusEmail' => '',
        'subject' => '',
        'description' => '',
        'status' => '',
        'cusNameError' => '',
        'cusEmailError' => '',
        'subjectError' => '',
        'descriptionError' => ''

      ];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'cusName' =>trim($_POST['cusName']),
          'cusEmail' => trim($_POST['cusEmail']),
          'subject' => trim($_POST['subject']),
          'description' => trim($_POST['description']),
          'status' => trim($_POST['status']),
          'cusNameError' => '',
          'cusEmailError' => '',
          'subjectError' => '',
          'descriptionError' => ''
  
        ];

        //validating the inputs

        if(empty($data['cusName'])){
          $data['cusNameError'] = 'Please Enter the Name';
        }

        if(empty($data['cusEmail'])){
          $data['cusEmailError'] = 'Please Enter the Email';
        }

        if(empty($data['subject'])){
          $data['subjectError'] = 'Please Enter a Subject';
        }

        if(empty($data['description'])){
          $data['descriptionError'] = 'Please Enter a Description';
        }

        //making sure all errors are empty

        if(empty($data['cusNameError']) && empty($data['cusEmailError']) && empty($data['subjectError']) && empty($data['descriptionError'])){
          
          if($this->pageModel->addIssues($data)){
            header('location: ' . URLROOT . '/pages/issues');
          }else{
            die('Something Went Wrong!');
          }
        }
      }else{
        $data = [
          'cusName' => '',
          'cusEmail' => '',
          'subject' => '',
          'description' => '',
          'status' => '',
          'cusNameError' => '',
          'cusEmailError' => '',
          'subjectError' => '',
          'descriptionError' => ''
  
        ];
      }

      $this->view('pages/issues', $data);
    }

    public function selectdate(){
        $this->view('pages/selectdate');
    }
      

    public function roomselect(){

      $data = [
        'checkin' => '',
        'checkout' =>'',
        'peoplecount' => '',
        'package' => '',
        'results' => ''
      ];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'checkin' => trim($_POST['check-in']),
          'checkout' =>trim($_POST['check-out']),
          'peoplecount' => trim($_POST['people']),
          'package' => trim($_POST['package']),
          'results' => ''
        ];

        if(!empty($data['checkin']) && !empty($data['checkout']) && !empty($data['peoplecount'])){
          $results = $this->pageModel->selectavailablerooms($data);

          $data = [
            'checkin' => trim($_POST['check-in']),
            'checkout' =>trim($_POST['check-out']),
            'peoplecount' => trim($_POST['people']),
            'package' => trim($_POST['package']),
            'results' => $results
          ];

          $this->view('pages/roomselect', $data);

        }
        else{
          die('Something went Wrong');
        } 

      }
      else{
        $data = [
          'checkin' => '',
          'checkout' => '',
          'peoplecount' => '',
          'results' => ''
        ];

        $this->view('pages/roomselect', $data);
      }
    }

    public function placereservation(){

      $data = [
        'roomno' => '',
        'checkin' => '',
        'checkout' => '',
        'packageid' => '',
        'peoplecount' => '',
      ];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'roomno' => trim($_POST['roomno']),
          'checkin' => trim($_POST['checkin']),
          'checkout' => trim($_POST['checkout']),
          'packageid' => trim($_POST['packageid']),
          'peoplecount' => trim($_POST['peoplecount']),
          'cnameError' => '',
          'cidError' => '',
          'cnumError' => ''
        ];

        if(isset($_POST['cname'])){
          $data = [
          'roomno' => trim($_POST['roomno']),
          'checkin' => trim($_POST['checkin']),
          'checkout' => trim($_POST['checkout']),
          'packageid' => trim($_POST['packageid']),
          'peoplecount' => trim($_POST['peoplecount']),
          'cname' => trim($_POST['cname']),
          'cid' => trim($_POST['cid']),
          'cnum' => trim($_POST['cnum']),
          'status' => trim($_POST['status']),
          'snotes' => trim($_POST['snotes'])
          ];

          if(empty($data['cname'])){
            $data['cnameError'] = 'Customer name cant be empty';
          }
          if(empty($data['cname'])){
            $data['cidError'] = 'Customer Id cant be empty';
          }
          if(empty($data['cnum'])){
            $data['cnumError'] = 'Customer Number cant be empty';
          }

          if(empty($data['cnameError']) && empty($data['cidError']) && empty($data['cnumError'])){
            if($this->pageModel->addReservations($data)){
              if($this->pageModel->updateroomavailability($data)){
                header('location: '. URLROOT . '/pages/index');
              }
              else{
              die('Something Went Wrong');
              }
            }
            else{
              die('Something Went Wrong');
            } 
          }
        }

        $this->view('pages/placereservation', $data);

      }else{

        $data = [
          'roomno' => '',
          'checkin' => '',
          'checkout' => '',
          'packageid' => '',
          'peoplecount' => '',
          'cnameError' => '',
          'cidError' => '',
          'cnumError' => ''
        ];
      }
      $this->view('pages/placereservation', $data);
    }

  }