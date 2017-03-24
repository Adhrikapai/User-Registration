<!--
ASSIGNMENT 6 - FORMS
Adhrika Udaylal Pai
-->

<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <title>Adhrika Pai</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>

  <body>
    <?php

    $name="";
    $nameError="";

    $uName = "";
    $uNameError = "";

    $uEmail = "";
    $uEmailError = "";

    $uGender = "";
    $uGenderError = "";

    $uCar = "";
    $uCarError = "";

    $uHobbies = array();
    $uHobbiesError="";

    $uPassword="";
    $uPasswordError="";

    $uRePassword="";
    $uRePasswordError="";

    $uConfirm="";

      if ($_POST['signUp']) {

        //Name:
        if ($_POST['fName']) {
          $name = $_POST['fName'];
        }
        else {
          $nameError = "<p>Name is Required!</p>";
        }

        //Username:
        if ($_POST['uName']) {
          $uName = $_POST['uName'];
          if(strlen($uName)<8){
            $uNameError = "<p>User name should be atleast 8 characters!</p>";
          }
        }
        else {
          $uNameError = "<p>User Name is Required!</p>";
        }

        //Email:
        if ($_POST['uEmail']) {
          $uEmail = $_POST['uEmail'];
        }
        else {
          $uEmailError = "<p>Email is Required!</p>";
        }

        //Gender:
        if ($_POST['uGender']) {
          $uGender = $_POST['uGender'];
        }
        else {
          $uGenderError = "<p>Gender is Required!</p>";
        }

        //Password:
        if ($_POST['uPassword']) {
          $uPassword = $_POST['uPassword'];
          if(strlen($uPassword)>=8){
            if ($_POST['uRePassword']) {
              $uRePassword = $_POST['uRePassword'];
              if ($_POST["uPassword"] == $_POST["uRePassword"]) {
                $uConfirm = "Sign up successful!";
              }
              else {
                $uConfirm = "Sign up failed!";

              }
            }
            else {
              $uRePasswordError = "<p>Re-type the password!</p>";

            }
          }
          else{
            $uPasswordError= "<p>Password should be atleast 8 characters!</p>";
          }
        }
        else {
          $uPasswordError = "<p>Password is Required!</p>";
        }

        //Hobbies:
        if($_POST['uHobbies']){
          $uHobbies = $_POST['uHobbies'];
          $nHobbies = count($uHobbies);
          if($nHobbies<2){
            $uHobbiesError = "<p>Select 2 or more!</p>";
          }
        }
          else{
            $uHobbiesError = "<p>Select 2 or more!</p>";
          }

        //Cars:
        if($_POST['uCars'])
        {
          $uCar = $_POST['uCars'];
        }
        else{
            $uCarError="<p>Didn't select any cars!</p>\n";
          }
       }

     //Array for hobbies:
     for($i=0; $i < $nHobbies; $i++)
        {
            $uHobby .= $uHobbies[$i].', ';
        }

    ?>

    <!--Main-->
    <div id=main align="center">
      <strong>
      <form action="index.php" method="POST">
        <br><h1>REGISTRATION🏁 </h1><hr><br>

        Name:
        <input type="text" name="fName" value="<?=$name?>">
        <br>
        <?=$nameError ?>
        <br>

        Username:
          <input type="text" name="uName" value="<?=$uName?>">
          <br>
          <?=$uNameError ?>
          <br>

        Email✉️ :
          <input type="email" name="uEmail" value="<?=$uEmail?>">
          <br>
          <?=$uEmailError ?>
          <br>

        Password:
        <input type="password" name="uPassword" value="<?=$uPassword?>">
        <br>
        <?=$uPasswordError ?>
        <br>

        Re-type Password:
        <input type="password" name="uRePassword" value="<?=$uRePassword?>">
        <br>
        <?=$uRePasswordError ?>
        <br>

        Gender:
          <input type="radio" name="uGender" value="Female"
          <?
          if($uGender=='Female')
            echo "checked";
          ?>>
          Female👧🏻
          <input type="radio" name="uGender" value="Male"
          <?
          if($uGender=='Male')
            echo "checked";
          ?>>
          Male👦🏻
          <br>
          <?=$uGenderError ?>
          <br>


        Hobbies:
        <input type="checkbox" name="uHobbies[]" value="Reading"
        <?
        if (in_array("Reading", $uHobbies)) {
          echo "checked";
        }
        ?> >
        Reading📖
        <input type="checkbox" name="uHobbies[]" value="Writing"
        <?
        if (in_array("Writing", $uHobbies)) {
          echo "checked";
        } ?>>
        Writing📝
        <input type="checkbox" name="uHobbies[]" value="Painting"
        <?
        if (in_array("Painting", $uHobbies)) {
          echo "checked";
        }
        ?>>
        Painting🖌
        <input type="checkbox" name="uHobbies[]" value="Playing" <?
        if (in_array("Playing", $uHobbies)) {
          echo "checked";
        } ?>>
        Playing⚽️
        <input type="checkbox" name="uHobbies[]" value="Sleeping" <?
        if (in_array("Sleeping", $uHobbies)) {
          echo "checked";
        } ?>>
        Sleeping😴
        <br>
        <?=$uHobbiesError ?>
        <br>

        Favourite Car 🚗:
        <select multiple="multiple" name="uCars">
          <option value="Audi">Audi</option>
          <option value="BMW">BMW</option>
          <option value="Honda">Honda</option>
          <option value="Ford">Ford</option>
        </select>
        <br>
        <?=$uCarError ?>
        <br>

        <input type="submit" name="signUp" class="button" value="Sign Up✔️ ">

        <br>
        <br>
      </form>
    </strong>
  <?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
      if(!empty($name) && !empty($uEmail) && !empty($uName) && (strlen($uName)>=8)
      && !empty($uGender) && !empty($uHobby) && !empty($uCar)){

        echo "<table>";
        echo "<br><br><h2>SIGN UP SUCCESSFUL!😎👍 </h2>";
        echo "<tr><td>Name:</td><td>".$name."</td></tr>";

        echo "<tr><td>Email:</td><td>".$uEmail."</td></tr>";

        echo "<tr><td>UserName:</td><td>".$uName."</td></tr>";

        echo "<tr><td>Gender</td><td>".$uGender."</td></tr>";

        echo "<tr><td>Hobbies</td><td>".$uHobby."</td></tr>";

        echo "<tr><td>Car Brand</td><td>".$uCar."</td></tr>";
        echo "</tr><br><br>";
        echo "</table>";
        echo "<br><br>";
      }
    }
   ?>
 </div>
  </body>
</html>
