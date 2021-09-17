<?php
//cors handling 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Creating Array for JSON response
$response = array();
 
// Include data base connect class
$filepath = realpath (dirname(__FILE__));
require_once($filepath."/db_connect.php");

 // Connecting to database
$db = new DB_CONNECT();
// // Check if we got the field from the user
if (isset($_GET["id"])) {
    $id = $_GET['id'];

     // Fire SQL query to get led data by id
    $result = $db->sth->query("SELECT * FROM testhack_table"); //UPDATE THIS TO YOUR DB
	
	//If returned result is not empty
    if (!empty($result)) {

        // // Check for succesfull execution of query and no results found
        if (mysqli_num_rows($result) > 0) {
			
			// Storing the returned array in response
            $result = mysqli_fetch_array($result);
			
			// temp user array - UPDATE THIS TO YOUR COLUMNS
            $controlTest = array();
            $controlTest["id"] = $result["id"];
            $controlTest["led1"] = $result["led1"];
            $controlTest["led2"] = $result["led2"];
            $controlTest["led3"] = $result["led3"];
           

            $response["success"] = 1;

            $response["controlTest"] = array();
			
			// Push all the items 
            array_push($response["controlTest"], $controlTest);
 
            // Show JSON response
            echo json_encode($response);
        } else {
            // If no data is found
            $response["success"] = 0;
            $response["message"] = "No data on controlTest found";
 
            // Show JSON response
            echo json_encode($response);
        }
    } else {
        // If no data is found
        $response["success"] = 0;
        $response["message"] = "No data on controlTest found";
 
        // Show JSON response
        echo json_encode($response);
    }
} else {
    // If required parameter is missing
    $response["success"] = 0;
    $response["message"] = "Parameter(s) are missing. Please check the request";
 
    // echoing JSON response
    echo json_encode($response);
}
?>