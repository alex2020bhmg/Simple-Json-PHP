<?php
  // The only include you need
  include('../includes/json.php');
  
  
  use \Simple;
  // Create a raw JSON
  $json = new Simple\json('callback', 'console.log');

  // Define objects to send
  $object = new stdClass();
  $object->FirstName = 'John';
  $object->LastName = 'Doe';
  $array = array(1,'2', 'Pieter', true);
  $jsonOnly = '{"Hello" : "darling"}';
  // Add objects to send
  $json->add('status', '200');
  $json->add("worked");
  $json->add("things", false);
  $json->add('friend', $object);
  $json->add("arrays", $array);
  $json->add("json", $jsonOnly, false);

  /*
  Expected result : 
  console.log([
    "200",
    true,
    false,
    {
      "FirstName": "John",
      "LastName": "Doe"
    },
    [
      1,
      "2",
      "Pieter",
      true
    ],
    {
      "Hello": "darling"
    }
  ]);

  Result : 
  console.log(["200",true,false,{"FirstName":"John","LastName":"Doe"},[1,"2","Pieter",true],{"Hello" : "darling"}]);
  PASSED
  //*/

  // Send the JSON
  $json->send_array();
?>