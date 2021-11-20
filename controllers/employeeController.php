<?php
require_once MODELS . "employeeModel.php";

//OBTAIN THE ACCION PASSED IN THE URL AND EXECUTE IT AS A FUNCTION

//Keep in mind that the function to be executed has to be one of the ones declared in this controller
// TODO Implement the logic

$action = "";

if(isset($_GET["action"])) {
  $action = $_GET["action"];
}

if(function_exists($action)) {
  call_user_func(($action)); // $action tiene el mismo nobre de la funcion getAllEmployees()
} else {
  error("La función que intentas llamar no existe");
}
/* ~~~ CONTROLLER FUNCTIONS ~~~ */

/**
 * This function calls the corresponding model function and includes the corresponding view
 */
function getAllEmployees()
{
  $employees = get();

  if(isset($employees)) {
    require_once VIEWS . "/employee/employeeDashboard.php";
  } else {
    error("Ha habido un problema con la base de datos");
  }
}

/**
 * This function calls the corresponding model function and includes the corresponding view
 */
function getEmployee($request)
{
    //
}

/**
 * This function includes the error view with a message
 */
function error($errorMsg)
{
  require_once VIEWS . "/error/error.php";
}
