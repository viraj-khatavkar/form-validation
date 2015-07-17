<?php

if(isset($_POST['submit']))
{
    foreach($_POST as $key => $value):
        if(empty($_POST[$key]))
        {
            $errors[$key][] = $key." is required";
        }

        $old_value[$key] = $value;
    endforeach;

    if(!isset($_POST['gender']))
    {
        $errors['gender'][] = "Gender is required";
    }
    else
    {
        $old_value['gender'] = $_POST['gender'];
    }

    if(!isset($_POST['agree']))
    {
        $errors['agree'][] = "Please accept terms and conditions";
    }
    else
    {
        $old_value['agree'] = 1;
    }

    if ( ! filter_var ( $_POST["companyemail"] , FILTER_VALIDATE_EMAIL ) )
    {
        $errors['companyemail'][] = "Invalid email address";
    }

    if ( ! filter_var ( $_POST["contactemail"] , FILTER_VALIDATE_EMAIL ) )
    {
        $errors['contactemail'][] = "Invalid email address";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- Navigation -->
<div class="navigation">
    <div class="leftnav">
        <h2 class="navheading">Training</h2>
    </div><!--
		--><div class="rightnav">
        <a href="index.php" class="link">Home</a>
    </div>
</div>

<form action="addcontact.php" method="post">
    <!-- Company Details -->
    <div class="companydetails">
        <div class="heading">
            <h3>Company Details</h3>
        </div>
        <div class="rows">
            <div class="left">
                <label for="commpanyname">Company Name <sup>*</sup></label><!--
                    --><input type="text" name="companyname" id="companyname" placeholder="Company Name" value="<?php if(isset($old_value['companyname'])) echo $old_value['companyname'] ?>">
                    <?php
                    if(isset($errors['companyname']))
                    {
                        foreach($errors['companyname'] as $error):
                            echo"<span class='error'><li>".ucfirst($error)." </li> </span>";
                        endforeach;
                    }
                    ?>
            </div><!--
                --><div class="right">
                <label for="commpanyemail">Company Email <sup>*</sup></label><!--
                    --><input type="text" name="companyemail" id="companyemail" placeholder="Company Email" value="<?php if(isset($old_value['companyemail'])) echo $old_value['companyemail'] ?>">
                    <?php
                    if(isset($errors['companyemail']))
                    {
                        foreach($errors['companyemail'] as $error):
                            echo"<span class='error'><li>".ucfirst($error)." </li> </span>";
                        endforeach;
                    }
                    ?>
            </div>
        </div>
        <div class="rows">
            <div class="left">
                <label for="address1">Address 1 <sup>*</sup></label><!--
                    --><input type="text" name="address1" id="address1" placeholder="Address 1" value="<?php if(isset($old_value['address1'])) echo $old_value['address1'] ?>">
                    <?php
                    if(isset($errors['address1']))
                    {
                        foreach($errors['address1'] as $error):
                            echo"<span class='error'><li>".ucfirst($error)." </li> </span>";
                        endforeach;
                    }
                    ?>
            </div><!--
                --><div class="right">
                <label for="address2">Address 2</label><!--
                    --><input type="text" name="address2" id="address2" placeholder="Address 2" value="<?php if(isset($old_value['address2'])) echo $old_value['address2'] ?>">
            </div>
        </div>
        <div class="rows">
            <div class="left">
                <label for="type">Type <sup>*</sup></label><!--
                    --><select name="type" id="type">
                    <option calue=""></option>
                    <option value="type1" <?php if(isset($old_value['type'])) { if($old_value['type'] == 'type1') echo"selected"; } ?>>Type 1</option>
                    <option value="type2" <?php if(isset($old_value['type'])) { if($old_value['type'] == 'type2') echo"selected"; } ?>>Type 2</option>
                    <option value="type3" <?php if(isset($old_value['type'])) { if($old_value['type'] == 'type3') echo"selected"; } ?>>Type 3</option>
                </select>
                <?php
                if(isset($errors['type']))
                {
                    foreach($errors['type'] as $error):
                        echo"<span class='error'><li>".ucfirst($error)." </li> </span>";
                    endforeach;
                }
                ?>
            </div>
        </div>
    </div>

    <hr>

    <!-- Contact Details -->
    <div class="contactdetails">

        <div class="heading">
            <h3>Contact Details</h3>
        </div>
            <div class="rows">
                <div class="left">
                    <label for="contactname">Contact Name <sup>*</sup></label><!--
                        --><input type="text" name="contactname" id="contactname" placeholder="Contact Name" value="<?php if(isset($old_value['contactname'])) echo $old_value['contactname'] ?>">
                        <?php
                        if(isset($errors['contactname']))
                        {
                            foreach($errors['contactname'] as $error):
                                echo"<span class='error'><li>".ucfirst($error)." </li> </span>";
                            endforeach;
                        }
                        ?>
                </div><!--
                    --><div class="right">
                    <label for="contactemail">Contact Email <sup>*</sup></label><!--
                        --><input type="text" name="contactemail" id="contactemail" placeholder="Contact Email" value="<?php if(isset($old_value['contactemail'])) echo $old_value['contactemail'] ?>">
                        <?php
                        if(isset($errors['contactemail']))
                        {
                            foreach($errors['contactemail'] as $error):
                                echo"<span class='error'><li>".ucfirst($error)." </li> </span>";
                            endforeach;
                        }
                        ?>
                </div>
            </div>
            <div class="rows">
                <div class="left">
                    <label for="phone1">Phone 1 <sup>*</sup></label><!--
                        --><input type="text" name="phone1" id="phone1" placeholder="Phone 1" value="<?php if(isset($old_value['phone1'])) echo $old_value['phone1'] ?>">
                    <?php
                    if(isset($errors['phone1']))
                    {
                        foreach($errors['phone1'] as $error):
                            echo"<span class='error'><li>".ucfirst($error)." </li> </span>";
                        endforeach;
                    }
                    ?>
                </div><!--
                    --><div class="right">
                    <label for="phone2">Phone 2</label><!--
                        --><input type="text" name="phone2" id="phone2" placeholder="Phone 2" value="<?php if(isset($old_value['phone2'])) echo $old_value['phone2'] ?>">
                </div>
            </div>
            <div class="rows">
                <div class="left">

                    <label for="contactname">Gender <sup>*</sup></label>
                    <input type="radio" name="gender" class="radio" id="male" value="male" <?php if(isset($old_value['gender'])) { if($old_value['gender'] == 'male') echo"checked"; } ?>> Male
                    <input type="radio" name="gender" class="radio" id="female" value="female" <?php if(isset($old_value['gender'])) { if($old_value['gender'] == 'female') echo"checked"; } ?>> Female
                    <input type="radio" name="gender" class="radio" id="other" value="other" <?php if(isset($old_value['gender'])) { if($old_value['gender'] == 'other') echo"checked"; } ?>> Other
                </div><!--
                    --><div class="right">

                </div>
                <?php
                if(isset($errors['gender']))
                {
                    foreach($errors['gender'] as $error):
                        echo"<span class='error'><li>".ucfirst($error)." </li> </span>";
                    endforeach;
                }
                ?>
            </div>
            <div class="center">
                <input type="checkbox" name="agree" <?php if(isset($old_value['agree'])) echo "checked"; ?>> I Agree
                <?php
                if(isset($errors['agree']))
                {
                    foreach($errors['agree'] as $error):
                        echo"<span class='error'><li>".ucfirst($error)." </li> </span>";
                    endforeach;
                }
                ?>
            </div>
            <div class="center">
                <input type="submit" value="Submit" name="submit" class="submit">
            </div>
    </div>

</form>



</body>
</html>