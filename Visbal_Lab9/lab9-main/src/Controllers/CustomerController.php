<?php

namespace App\Controllers;

use App\Models\Customer;

class CustomerController {
    protected $mustache;

    public function __construct() {
        global $mustache;
        $this->mustache = $mustache;
    }

    public function list() {
        $customers = Customer::getAll();
        echo $this->mustache->render('customer', ['customers' => $customers]);
    }

    public function show($id) {
        $customer = Customer::getById($id);
        if ($customer) {
            echo $this->mustache->render('single-customer', ['customer' => $customer]);
        } else {
            echo 'Customer not found.';
        }
    }

    public function edit($id) {
        $customer = Customer::getById($id);
        if ($customer) {
            echo $this->mustache->render('edit-customer', ['customer' => $customer]);
        } else {
            echo 'Customer not found.';
        }
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];

    
            Customer::update($id, $name, $email, $phone, $address);

            
            header("Location: /customers/$id");
            exit;
        }
    }
}
