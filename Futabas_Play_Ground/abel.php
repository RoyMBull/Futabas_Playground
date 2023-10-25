<!doctype html>
<?php 

//This main script is going to reject any and all other requests methdos besides GET UNLESS THEY HAVE THE DESIRED COOKIE VALUE FOR THE SERVER 
if ($_SERVER['REQUEST_METHOD'] == "GET")
{    
    //Checks if the user cookie paramater in the web browser is a match 
    if ($_COOKIE['abel_norm'] == "ThIsIsAbEl")
    {
        //If it's a match it's going to indicate to the user the has access and the scritp will load the rest of the web application
        echo "<script> alert('Cookie Values Match! HERE IS THE FLAG'); </script>"; //This is going to allow an alert box to pop up that is going to promt the user to hit enter to proceed with the 302 redirect 
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

<!-- MAIN HTML CODE FOR THE PAGE -->
<html>

    <head>
        
            <title> USER FLAG </title>

            <meta
                name = "viewpoint"
                content = "width=device-width, initial-scale=1.0"
                charset = "utf-8"
            />



    </head>



<body>

    <!-- This si mostly going to be a blank page that is simply going ot have the flag and a hidden url link to the uploads page -->

    <p> USER FLAG -> $1$GG4MD_ANSWER_IS_COOKIE_PATH_rML$L88yua9WVEuF.ED7jI7t7. </p>
   
   
    <a 
        hidden
        >

        "Have you applied this method to other areas of the server. I'm not like most other CTF's so play around a bit"

        </br>
        </br>

        "There's another flag and another way to pop this user's account, can you find the jar for it?"

    </a>



</body>
</html>
