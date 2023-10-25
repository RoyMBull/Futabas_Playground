<!doctype html>
<?php

//This is going to allow the get method under the condition theuser has the requried cookie needed to access the user session on the page
if ($_SERVER['REQUEST_METHOD'] == "GET")
{   
    //Checks if the user cookie paramater in the web browser is a match 
    if ($_COOKIE['abel'] == "1Yc/RmOVVvCE7LVnz801J8uRo7Bs3i0")
    {
        //If it's a match it's going to indicate to the user the has access and the scritp will load the rest of the web application
        echo "<script> alert('Cookie Values Match! HERE IS THE FLAG'); </script>"; //This is going to allow an alert box to pop up that is going to promt the user to hit enter to proceed with the 302 redirect 
        die("Cookie Hijacking FLAG -> 1wAJrVhjrJri2Ue/lVthe4NF8Pa.p./");
    }

    //Else if the user doens't have the right cookie in order to access this page then we are going to indicate that the user is not authorized to view the page 
    else 
    {
        die("USER IS NOT AUTHORIZED TO VIEW PAGE");
    }

}

//The code is also going to chekc and protect itself from illegal methods and requests that are being sent to the server side 

//PUT //This is going to prevent the user from putting files via th enetcat tool on the server 
if ($_SERVER['REQUEST_METHOD'] == "PUT")
{
    die("403 METHOD PUT FORBIDDEN");
}

//HEAD -> This prevents a bypass to the GET method that can also allow the attacker to downlaod any pages and secure source code and credentials
if ($_SERVER['REQUEST_METHOD'] == "HEAD")
{
    die("403 METHOD HEAD FORBIDDEN");

}

//TRACE -> This allows them to steal cookies on the server and potentially allow cross site scripting on the server, and could also donwload the php source code
if ($_SERVER['REQUEST_METHOD'] == "TRACE")
{
    die("403 METHOD TRACE FORBIDDEN");

}

//DELETE -> This is going to block the user from enabling delete requests on the server (THIS METHOD IS NOT CONFIGURED TO BE USED)
if ($_SERVER['REQUEST_METHOD'] == "DELETE")
{
    die("403 METHOD DELETE FORBIDDEN");

}

//OPTIONS (WORKS) -> This is going to prevent the attackers from being abel to see any and all server http methods allowed on the server
if ($_SERVER['REQUEST_METHOD'] == "OPTIONS")
{
    die("403 METHOD OPTIONS FORBIDDEN");

}

//PATCH -> This is going to prevent the user from inputting code overwrites 
if ($_SERVER['REQUEST_METHOD'] == "PATCH")
{
    die("403 METHOD PATCH FORBIDDEN");

}

?>
