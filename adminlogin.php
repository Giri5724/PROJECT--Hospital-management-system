<?php
 session_start();
  include "include/connection.php";

      /*isset() function checks whether a variable is set, which means that it has to be declared and is not NULL.
        1. The adminLogin form input button is given (name) as (login)
        2. $_POST super global variable which is used to collect form data after submitting an HTML form with method="post".
        3. Inside the if condition, use $_POST as global variable to collect the input values from USERS from the form, considering the name given
           to the input tag used to identify the field
        4. Now after collecting the data from the form as above,
            -  next declare a variable to save an empty array.
            - Note: Whenever an array is kept in a variable, it set to accept values which has keys. Example $age = array ("Felix"=>"20") to display
              the content you do , echo $age[0]

         5. Now, write an (IF & ElseIf condition) to check if each variable for the Form submission is empty or not.
         6. In each scope of the check condition, assign a (Key) to the empty array which was earlier declared as ($error = array();) and pass a Value (ex: "Enter Username";)
            to the KEY (ex: $error['admin'])
         7. Construct another (IF condition) and use PHP (count) method ,count(), to check if there is value in the (error variable) array
         8. If you check and there is no error then you can write a query, to select data from the table in the DATABASE.
             - pass the query into a variable, and use MYSQL QUERY Method which takes two parameters ,that is the database connection & the variable taking
               query
             - write IF-Condition which will pass the result of the query into a MYSQL NUMBER OF ROWS Method and equate it to (1), meaning if at least
                one result is found in the database table which should match with what has been entered by the USER in the form.
             - If the Result is TRUE, the Username is put in session by passing the variable that has the username into using the global Session variable
                 $_Session[], which requires an array Key.
              - After putting the username in session, you redirect the page, to admin page.
              - If you notice inside the main IF-CONDITION, after analysing the data been collected, checking if no input is made before clicking the form
                button, show the User a warning message to enter something, and checking  if there is no error by writing an IF-CONDITION (that is  form field is not empty)
                , if you check and there is data then a query is written to select the data in the database to compare if it's same as entered by USER.

      */

     /* At his point we reference the PHP code per the number of fields in the HTML FORM. Since we using PHP we need to create a database with field
        what matches the 'name' given to each of the form fields.
        A file is created to connect the database to the file where the database processing wil be done.Example is the file here..named (connection.php)
        which located in INCLUDE FOLDER
      */

    /*isset() function, Check whether a variable is empty. Also check whether the variable is set/declared: with a value in it
     which means that it has to be declared and is not NULL.
     1. After setting the 'login' field of the form you collect the values from all the fields of the form
     2. pass all the values the USER will enter in the form,by passing the 'NAMES' given to each field in the form.
    3. Create a variable to contain array of error(s)
    4. Create IF Condition , to cater for if Each of the fields is empty during when USER clicks SUBMIT
      - Note: You analyse that if the field is empty pass an error message into the variable ($error) which is declared to contain array of errors
      - Because array is a key-value pair, you introduce the array symbol [], and pass in a key name, which will be used to reference
         the array value anywhere in the codes
    5. After passing all possible error in the ERROR Variable you then write an IF Condition to check Count of the ERROR variable to check if there
       no recorded error.
       -If there is no recorded error, then you can write your SQL query
       - pass the query into a variable
       - pass the query variable into mysqli_query method, and pass the database connection variable
         . pass the value of the mysqli_query into a variable(ex: $results).
       - write IF-CONDITION to return true on the RESULT variable
         .IF True then you redirect to a page (in this case a file is created and named index.php for the Admin section)  OR write JS code to alert a message
          . Create a Global session variable and pass or give it ARRAY Key name, and pass a value variable which hold the Username into it
          . Use exit method at this level (ex: exit())
    6. Now go into the HTML Tags codes and write a DIV to display the error message when a USER misses a field without any input
       .inside the DIV, write a IF-CONDITION by introducing PHP <?php ?>  before the IF Condition could work.
       . Now reuse the ERROR variable which was earlier done in an array format, and set it to determine if it contains any value(s) or not
       . After setting pass the ERROR inside another variable.
       .write ELSE condition and pass empty string.
       . And 'echo' the the variable containing the error after the ISSET IF-CONDITION SCOPE
    7. To test the Login Form at this point, we can manually create USER login credential in MYSQL Database (username and password and profile image)
         and use that to login into the form.
    8. Start session as shown at the top side of this page, since we keeping the session on from start point here as we login with User details


    */
     if(isset($_POST['login'])){

         $username = $_POST['uname'];
         $password = $_POST['pass'];

         $error = array();

         if (empty($username))
         {
             $error['admin'] = "Enter Username";
         }elseif (empty($password)) {
             $error['admin']= "Enter Password";
         }


         if (count($error)==0){

             $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";

             $result = mysqli_query($connect,$query);

             if (mysqli_num_rows($result) == 1){
                 echo "<script>alert('You have logged in As an Admin')</script>";

                 $_SESSION['admin'] = $username;

                 header("Location:admin/index.php");
                 exit();

             }
             else{
                 echo "<script>alert('Invalid Username or Password')</script>";

             }
         }

     }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Login Page</title>
</head>

<body style="background-image:  url(img/capeHospital.jpg); background-repeat: no-repeat; background-size: cover">
<?php
include("include/header.php");
?>

      <div style="margin-top: 20px"></div>

     <!--creating container for your divider page -->
      <div class="container">
            <!--setting default standard columns size a browser can accept -->
            <div class="col-md-12">
                <!--defining and setting the rows-->
                <div class="row">

                    <!--Out of the default 12-browser columns, we first set aside 3-column which in this case won't use it for anything-->
                    <div class="col-md-3">

                    </div>

                    <!--creating or setting aside 6-columns, within the default 12-columns and giving it bootstrap class JUMBOTRON -->
                    <div class="col-md-6 jumbotron">
                        <img src="img/adminLoginlogo.png"  class="col-md-12" alt="" style="width: 200px; height: 150px; margin: auto; display: block">
                        <form action="" method="post" class="my-2">

                            <!--This section is to display ERROR from wrong USER Input-->
                               <!--<div class="alert alert-danger">-->
                                <div>
                                   <?php
                                       /*setting the variable containing an array of error message(s) as defined above. Since it's an array we use the array key for the variable*/
                                       if (isset($error['admin'])){
                                           $sh =$error['admin'];

                                           $show = "<h4 class='alert alert-danger'>$sh</h4>";


                                       }else{
                                           $show = "";
                                       }

                                   echo $show;
                                   ?>
                               </div>
                            <!--This section is to display ERROR from wrong USER Input-->
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">

                            </div>

                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="pass" class="form-control">

                            </div>

                            <input type="submit" name="login" class="btn btn-success">

                        </form>

                    </div>

                    <div class="col-md-3">

                    </div>

                </div>

            </div>

      </div>

</body>

</html>
