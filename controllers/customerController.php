<?php
require_once MODELS . "customerModel.php";

//OBTAIN THE ACCION PASSED IN THE URL AND EXECUTE IT AS A FUNCTION

//Keep in mind that the function to be executed has to be one of the ones declared in this controller
// TODO Implement the logic

$action = "";

if(isset($_REQUEST["action"])) {
  $action = $_REQUEST["action"];
}

if(function_exists($action)) {
  call_user_func($action, $_REQUEST); // $action tiene el mismo nobre de la funcion getAllCustomers()
} else {
  error("La función que intentas llamar no existe");
}
/* ~~~ CONTROLLER FUNCTIONS ~~~ */

/**
 * This function calls the corresponding model function and includes the corresponding view
 */
function getAllCustomers() {
  $customers = get();

  if(isset($customers)) {
    require_once VIEWS . "/customer/customerDashboard.php";
  } else {
    error("Ha habido un problema con la base de datos");
  }
}

/**
 * This function calls the corresponding model function and includes the corresponding view
 */
function getCustomer($request) {
  $action = $request["action"];
  $customer = null;

  if(isset($request["id"])) {
    $customer = getById($request["id"]);
  }
  require_once VIEWS . "/customer/customer.php";
}

function updateCustomer($request) {
  $action = $request["action"];

  if(sizeof($_POST) > 0) {
    $customer = update($_POST);

    if($customer[0]) {
      header("Location: index.php?controller=customer&action=getAllCustomers");
    } else {
      $customer = $_POST;
      $error = "Data incorrect";
      require_once VIEWS . "/customer/customer.php";
    }

  } else {
    require_once VIEWS . "/customer/customer.php";
  }
}

function createCustomer() {
  echo 'viene de func create...';
  require_once VIEWS . "/customer/customer.php";
}

/**
 * This function includes the error view with a message
 */
function error($errorMsg) {
  require_once VIEWS . "/error/error.php";
}
