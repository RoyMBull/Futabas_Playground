<!doctype html>
<?php //The user needs to have the main "user" cookie in order to access this page else they're blocked
//Next our code is going to check whether or not the admin privelege escalation flags have been hit either or

    if ($_SERVER['REQUEST_METHOD'] == "POST")    
    {   
       //Checks if the user cookie paramater in the web browser is a match 
       //The user mus have lower level privelges in ordre to proceed to upload (TWIST TO THROW THEM OFF)
        if ($_COOKIE['user'] == "UsEr12#$5%" && 
            $_COOKIE['abel'] == "1Yc/RmOVVvCE7LVnz801J8uRo7Bs3i0" && 
            $_COOKIE['abel_norm'] == "ThIsIsAbEl" && 
            $_COOKIE['admin'] == "ADMIN-->>>#$5%")
        {
            if ($_COOKIE['adminuseradmin'] == "user@gmail.com" || $_COOKIE['adminuseradmin'] == "admin@gmail.com")
            {
                echo "<script> alert('YOU HAVE ALL THE NEEDED COOKIES TO PROGRESS => 2 MORE FLAGS LEFT'); </script>";
            }

            //Else if the user doens't have the right cookie in order to access this page then we are going to indicate that the user is not authorized to view the page 
            else 
            {
       	        echo "<script> alert('NOT ENOUGH FLAGS TO PROGRESS PLEASE FIND MORE 5 NEEDED'); </script>";
                header("Location: http://localhost:80/upload.html"); //This is going to redirect th emian user in case they do not have the cookie to access the page 
                die();
            }
            
        }

        //Else if the user doens't have the right cookie in order to access this page then we are going to indicate that the user is not authorized to view the page 
         else 
         {
                echo "<script> alert('NOT ENOUGH FLAGS TO PROGRESS PLEASE FIND MORE 5 NEEDED'); </script>";
             header("Location: http://localhost:80/upload.html"); //This is going to redirect th emian user in case they do not have the cookie to access the page 
             die();
         }
    
        //If the cookie user is valid then the main server is going to press forward with file upload to the server 

        //The first thing our code is going to do is check the main paramaters of the url page in order to retrieve file data elements 
        $file = $_FILES['up']; //Secures the main post file data elements for processing on the server 
        
        //Next up is error handling in case the file on the server doesn't process correctly
        $error = $file['error']; //This is going to handle any errors and indicate to us that the main upload for the file server failed
        if ($error !== UPLOAD_ERR_OK)
        {
            echo "FAILED";
            die();
        }

        //Next we need to process the main src and destination of where the file is bieng stored by the http request and then the destination of where it's going to be moved to on the local file system the server is hosted on
        $src = $file['tmp_name']; //This is going to grab the main tmp location configured by the php configuraito php.ini file 
        $dest = "/var/www/html/".$file['name']; //This is going to secure the main filepath for the destination on where we need to FILE upload to be process on the file system

        //The next thing we are going to do is process where the main file is going to be moved to n the server
        if (move_uploaded_file(

            $src, //THis is going to be the tmp location of where the file is
            $dest //This is going to be the destination of where the file is going to be places

        ))
    
        {
            //If the file is moved correctly on the server then the nex thing we are going to do is print out the information reguarding the file we just uploaded to the main server 
            echo "File Uploaded",
            "Size:", $file['size'],
            "Type:", $file['type'],
            "FILE NAME =>", $file['name'],
            "TMP LOCATION =>", $file['tmp_name'],
            "DESTINATION => ", $dest;

            die("FILE HAS BEEN UPLOADED"); //This is going to kill the script and indicate to us that the file has been upploaded to the http server

        }

        else
        {
            die("UPLOAD FAILED"); //If the file failes to upload to the server then we are going to kill the main script and indicate the file failed to upload to the server
        }

    
    }


//The code is also going to chekc and protect itself from illegal methods and requests that are being sent to the server side 

//GET -> This is to prevent the user from being able to secure any source code that could contain sensitive data involving server credentials 
if ($_SERVER['REQUEST_METHOD'] == "GET")
{   
     //Checks if the user cookie paramater in the web browser is a match 
       //The user mus have lower level privelges in ordre to proceed to upload (TWIST TO THROW THEM OFF)
       if ($_COOKIE['user'] == "UsEr12#$5%" && 
       $_COOKIE['abel'] == "1Yc/RmOVVvCE7LVnz801J8uRo7Bs3i0" && 
       $_COOKIE['abel_norm'] == "ThIsIsAbEl" && 
       $_COOKIE['admin'] == "ADMIN-->>>#$5%")
   {
       if ($_COOKIE['adminuseradmin'] == "user@gmail.com" || $_COOKIE['adminuseradmin'] == "admin@gmail.com")
       {
           echo "<script> alert('YOU HAVE ALL THE NEEDED COOKIES TO PROGRESS => 2 MORE FLAGS LEFT'); </script>";
       }

       //Else if the user doens't have the right cookie in order to access this page then we are going to indicate that the user is not authorized to view the page 
       else 
       {
              echo "<script> alert('NOT ENOUGH FLAGS TO PROGRESS PLEASE FIND MORE 5 NEEDED'); </script>";
           header("Location: http://localhost:80/upload.html"); //This is going to redirect th emian user in case they do not have the cookie to access the page 
           die();
       }
       
   }

    //Else if the user doens't have the right cookie in order to access this page then we are going to indicate that the user is not authorized to view the page 
    else 
    {
        echo "<script> alert('NOT ENOUGH FLAGS TO PROGRESS PLEASE FIND MORE 5 NEEDED'); </script>";
        header("Location: http://localhost:80/upload.html"); //This is going to redirect th emian user in case they do not have the cookie to access the page 
        die();
    }
}

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

<html>

    <head>
        
            <title> UPLOAD FILE  </title>

            <meta
                name = "viewpoint"
                content = "width=device-width, initial-scale=1.0"
                charset = "utf-8"
            />



    </head>

<body>

    <!-- When the user clicks on the button a menu is going to prompt the user to select a file for upload to the main server -->
    <form
        method = "POST"
        action = "upload.php"
        enctype="multipart/form-data"
    >

        <input
            type = "file"
            name = "up"
        />

        <button>Upload File</button>

    </form>

</body>
</html>
