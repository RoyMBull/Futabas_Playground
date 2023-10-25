<!DOCTYPE HTML>  
<?php //Hadnles main login informaiton and processes it to the mysql server database backend, along with cookie generation and handling

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    #This is going to retrieve any and all main parameters from the server from user input
    $email = $_REQUEST['email']; 
    $password = $_REQUEST['password'];
    $cookie = $_COOKIE['abel']; //trinity

    //This is a main query that is going to allow for admin check in the system
    $adminquery = "select * from webs where email='$email' and role='Admin';"; //This is going to check if the user is admin on the systemm or not
    
    //This is going to authenticate the abel user
    if($email == 'abel' && $password == 'trinity')
    {  
        $query = "select * FROM webs where email='$email' and password='$password';"; //This is going to select from the "webs" database and chekc if whether or not the row in the database exist 

        //Credentials in order to authenticate to the mysql database server
        $host = "localhost"; //Target address on the system 
        $username = "abel"; //Username login
        $password = "trinity"; //Password 
        $db_name = "f"; //Database name to connect to 

        //Next we are going to connect to the database server using the mysqli() function
        $connection = new mysqli( 
            
        $host, 
        $username, 
        $password, 
        $db_name

        );  

        //Logic check to see if the connection is successful and the user exists in the system 
        if ($result = $connection -> query($query)) //WE NEED TO PATCH THIS OTHERWISE END USERS CAN BYPASS THE LOGIN BY ENTERING ANY USRER NAME ON THE SYSTEM
        {
            //This is going to handle and process returns from the server that come up empty
            if ($result->num_rows > 0) 
            {
                while ($row = $result->fetch_assoc()) //Fetches all the main rows from the database server 
                {
                    //Cookie check to see if the user is the abel user (THIS IS HERE IN CASE THE USER FIGURES OUT THEY CAN COOKIE SESSION HIJACK THE SERVER PAGE)                    
                    if ($_COOKIE['abel'] == '1Yc/RmOVVvCE7LVnz801J8uRo7Bs3i0')
                    {
                        //If the cookie is present on authentication check then we are going to have the user redirected to the php page
                        header('Location: http://localhost:80/login.html?'); #This is goign tor efresh the page in order to set the cookie value 
                        header("Location: http://localhost:80/abelcookie.php");
                        $connection -> close(); //This is going to close out the connection to the database
                        die();
                    }

                    //Else they'll be directed to the normal version of the page
                    else
                    {   
                        //We are going to set an initial cookie and then have the user redirected to the abel.php page to secure the normal version of the flag 
                        $abel_norm = "abel_norm";
                        $abel_norm_value = "ThIsIsAbEl";

                        //This is going to set the main user cookie so the user can see the page
                        //This page allows get methods under the condition the user has their cookie value
                        //This is to mitigate against RCE execution threats that could allow the user to see the source code, but still allows the www-data user on the server page to process the page given they are the correct user
                        setcookie(

                            $abel_norm,
                            $abel_norm_value

                        );
                        header('Location: http://localhost:80/login.html?'); #This is goign tor efresh the page in order to set the cookie value 
                        header("Location: http://localhost:80/abel.php");
                        $connection -> close();
                        die();
                    }  
                }
            } 
            
        //ELse if the user does not exist on the system 
        else 
           {
                echo "User Not Found!";
                $connection -> close();
                die();
            }
            

        }

        
    }

    //If none of the paramaters entered by the user have been detected, then we are going to press forward with normal query checking and admin role cheking 
    
    //If the user is logging into the system as user
    else if ($email == 'user@gmail.com'  && $password == 'qwerty')
    {
        
        $query = "select * FROM webs where email='$email' and password='$password';"; 
        
        $host = "localhost";
        $username = "abel";
        $password = "trinity";
        $db_name = "f"; 

        $connection = new mysqli(
            
        $host,
        $username, 
        $password, 
        $db_name 

        );  

        //This is going to be nested logic that is going to do a double query check and see if the user has the admin or user priveleges on the backend in the database
        //If the user is admin they get taken ton the admin portal
        //If the user is not admin they are going to be redireted to the main dashboard portal
        if ($result = $connection -> query($query)) 

            if ($result->num_rows > 0) 
            {
                while ($row = $result->fetch_assoc()) 
                {
                    //Next we are going to check whether or not the user is an 'Admin' or 'User'
                    
                    //We are going to instruct our code to perfrm another query to the back en dof the systme to check if the user also has admin priveleges and handle based on it
                    if ($admincheck = $connection -> query($adminquery))
                    {
                        //Next we are going to secure the results from the main query and check all the rows
                        if ($admincheck -> num_rows > 0)
                        {
                            //Then, much like before we are going to nest in a while loop that is going to fetch the main string array from the query 
                            while ($adminrow = $admincheck -> fetch_assoc())
                            {
                                //The main admin cookie is going to be set here if they have admin rights to the page
                            
                                //If the system detects the user is Admin then we are going to create a admin cookie to let them authenticate and continue the main session on the site 
                                $admin_cookie_name = "admin";
                                $admin_cookie_value = "ADMIN-->>>#$5%";

                                $admin_cookie_name2 = "adminuseradmin";
                                $admin_cookie_value2 = "$email";

                                setcookie(
            
                                    $admin_cookie_name,
                                    $admin_cookie_value

                                );

                                setcookie(
            
                                    $admin_cookie_name2,
                                    $admin_cookie_value2

                                );

                                    //If the user is admin then we are going to echo the user has admin right and close out the connection to the dbs server
                                    header('Location: http://localhost:80/login.html?'); #This is goign tor efresh the page in order to set the cookie value 
                                    header("Location: http://localhost/admin.php");
                                    //echo "USER IS ADMIN";
                                        $connection -> close();
                                die();
                            }
                        }

                        else //Else if the query that inidcates no admin user found, then we are going to print "NOT ADMIN", and redirect them to the default dashbaord
                        {
                            //The main user cookie is going to be set here if they aren't admin
                            //If the system detects the user is user then we are going to create a user cookie to let them authenticate and continue the main session on the site 
                            $user_cookie_name = "user";
                            $user_cookie_value = "UsEr12#$5%"; 

                            setcookie(
            
                                $user_cookie_name,
                                $user_cookie_value

                            );
                            
                            header('Location: http://localhost:80/login.html?'); #This is goign tor efresh the page in order to set the cookie value 
                            header("Location: http://localhost:80/dashboard.php"); //After we ge the message we want in order to check whether or not the user has admin privveleges in the system, then we are going to allow a redirect request via http status code 302
                            $connection -> close();
                            die();
                    
                        }

                    }
                    

                }


            } 
            
            else 
            {
                echo "User Not Found!";
                $connection -> close();
                die();
            }
            

    }



    else if ($email == 'admin@gmail.com'  && $password == 'terenure')
    {
        
        $query = "select * FROM webs where email='$email' and password='$password';"; 

        $host = "localhost";
        $username = "abel";
        $password = "trinity";
        $db_name = "f"; 

        $connection = new mysqli(
            
        $host, 
        $username,  
        $password, 
        $db_name 

        );  

        //Now that we are connected to the database, the next thing we are going to do is query and check if the query was successful

        if ($result = $connection -> query($query))
        {   
            if ($result->num_rows > 0) 
            {
                while ($row = $result->fetch_assoc()) 
                {
                    
                    if ($admincheck = $connection -> query($adminquery))
                    {
                        if ($admincheck -> num_rows > 0)
                        {
                            while ($adminrow = $admincheck -> fetch_assoc())
                            {
                            
                                $admin_cookie_name = "admin";
                                $admin_cookie_value = "ADMIN-->>>#$5%";

                                $admin_cookie_name2 = "adminuseradmin";
                                $admin_cookie_value2 = "$email";

                                setcookie(
            
                                    $admin_cookie_name,
                                    $admin_cookie_value

                                );

                                setcookie(
            
                                    $admin_cookie_name2,
                                    $admin_cookie_value2

                                );

                                    header('Location: http://localhost:80/login.html?'); #This is goign tor efresh the page in order to set the cookie value 
                                    header("Location: http://localhost/admin.php");
                                    //echo "USER IS ADMIN";
                                        $connection -> close();
                                die();
                            }
                        }

                        else 
                        {
                            $user_cookie_name = "user";
                            $user_cookie_value = "UsEr12#$5%";

                            setcookie(
            
                                $user_cookie_name,
                                $user_cookie_value

                            );
                            
                            header('Location: http://localhost:80/login.html?'); #This is goign tor efresh the page in order to set the cookie value 
                            header("Location: http://localhost/dashboard.php");
                            $connection -> close();
                            die();
                    
                        }

                    }

                
                    

                }
            
            } 
            
            else 
            {
                echo "User Not Found!";
                $connection -> close();
                die();
            }
            

        }
    }

    //Else if the user does nto match ANY of the defautl ones on the main system, then we are going to run a general query to check the user being sent ot the main backend in case the user manages to fnd a privelege escalation exploit
    else if ($email != 'abel' && $email != 'user@gmail.com' && $email != 'admin@gmail.com' )
    {
        $query = "select * FROM webs where email='$email' and password='$password';"; 

        $host = "localhost";
        $username = "abel";
        $password = "trinity";
        $db_name = "f"; 

        $connection = new mysqli(
            
        $host, 
        $username,  
        $password, 
        $db_name 

        );  

        //Now that we are connected to the database, the next thing we are going to do is query and check if the query was successful

        if ($result = $connection -> query($query))
        {   
            if ($result->num_rows > 0) 
            {
                while ($row = $result->fetch_assoc()) 
                {
                    
                    if ($admincheck = $connection -> query($adminquery))
                    {
                        if ($admincheck -> num_rows > 0)
                        {
                            while ($adminrow = $admincheck -> fetch_assoc())
                            {
                            
                                $admin_cookie_name = "admin";
                                $admin_cookie_value = "ADMIN-->>>#$5%";

                                $admin_cookie_name2 = "hiddenpriv";
                                $admin_cookie_value2 = "HiddenPrivelege";

                                setcookie(
            
                                    $admin_cookie_name,
                                    $admin_cookie_value

                                );

                                setcookie(
            
                                    $admin_cookie_name2,
                                    $admin_cookie_value2

                                );

                                    header('Location: http://localhost:80/login.html?'); #This is goign tor efresh the page in order to set the cookie value 
                                    header("Location: http://localhost/admin.php");
                                    //echo "USER IS ADMIN";
                                        $connection -> close();
                                die();
                            }
                        }

                        else 
                        {
                            $user_cookie_name = "user";
                            $user_cookie_value = "UsEr12#$5%";

                            setcookie(
            
                                $user_cookie_name,
                                $user_cookie_value

                            );
                            
                            header('Location: http://localhost:80/login.html?'); #This is goign tor efresh the page in order to set the cookie value 
                            header("Location: http://localhost/dashboard.php");
                            $connection -> close();
                            die();
                    
                        }

                    }

                
                    

                }
            
            } 
            
            else 
            {
                echo "User Not Found!";
                $connection -> close();
                die();
            }
            

        }
    }
    

}



//The code is also going to chekc and protect itself from illegal methods and requests that are being sent to the server side 

//GET -> This is to prevent the user from being able to secure any source code that could contain sensitive data involving server credentials 
if ($_SERVER['REQUEST_METHOD'] == "GET")
{   

    die("403 METHOD GET FORBIDDEN");

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
