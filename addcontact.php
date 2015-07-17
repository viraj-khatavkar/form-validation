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
        $errors['gender'][] = "Gender is required";
    else
        $old_value['gender'] = $_POST['gender'];

    if(!isset($_POST['agree']))
        $errors['agree'][] = "Please accept terms and conditions";
    else
        $old_value['agree'] = 1;

    var_dump($old_value);
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
                        foreach($errors['companyname'] as $error):
                            echo"<span class='error'> ".ucfirst($error)." </span>";
                        endforeach;
                    ?>
            </div><!--
                --><div class="right">
                <label for="commpanyemail">Company Email <sup>*</sup></label><!--
                    --><input type="text" name="companyemail" id="companyemail" placeholder="Company Email" value="<?php if(isset($old_value['companyemail'])) echo $old_value['companyemail'] ?>">
                    <?php
                        foreach($errors['companyemail'] as $error):
                            echo"<span class='error'> ".ucfirst($error)." </span>";
                        endforeach;
                    ?>
            </div>
        </div>
        <div class="rows">
            <div class="left">
                <label for="address1">Address 1 <sup>*</sup></label><!--
                    --><input type="text" name="address1" id="address1" placeholder="Address 1" value="<?php if(isset($old_value['address1'])) echo $old_value['address1'] ?>">
                    <?php
                        foreach($errors['address1'] as $error):
                            echo"<span class='error'> ".ucfirst($error)." </span>";
                        endforeach;
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
                    <option value="type1">Type 1</option>
                    <option value="type2">Type 2</option>
                    <option value="type3">Type 3</option>
                </select>
                <?php
                    foreach($errors['type'] as $error):
                        echo"<span class='error'> ".ucfirst($error)." </span>";
                    endforeach;
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
                            foreach($errors['contactname'] as $error):
                                echo"<span class='error'> ".ucfirst($error)." </span>";
                            endforeach;
                        ?>
                </div><!--
                    --><div class="right">
                    <label for="contactemail">Contact Email <sup>*</sup></label><!--
                        --><input type="text" name="contactemail" id="contactemail" placeholder="Contact Email" value="<?php if(isset($old_value['contactemail'])) echo $old_value['contactemail'] ?>">
                        <?php
                            foreach($errors['contactemail'] as $error):
                                echo"<span class='error'> ".ucfirst($error)." </span>";
                            endforeach;
                        ?>
                </div>
            </div>
            <div class="rows">
                <div class="left">
                    <label for="phone1">Phone 1 <sup>*</sup></label><!--
                        --><input type="text" name="phone1" id="phone1" placeholder="Phone 1" value="<?php if(isset($old_value['phone1'])) echo $old_value['phone1'] ?>">
                    <?php
                        foreach($errors['phone1'] as $error):
                            echo"<span class='error'> ".ucfirst($error)." </span>";
                        endforeach;
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
                foreach($errors['gender'] as $error):
                    echo"<span class='error'> ".ucfirst($error)." </span>";
                endforeach;
                ?>
            </div>
            <div class="center">
                <input type="checkbox" name="agree" <?php if(isset($old_value['agree'])) echo "checked"; ?>> I Agree
                <?php
                foreach($errors['agree'] as $error):
                    echo"<span class='error'> ".ucfirst($error)." </span>";
                endforeach;
                ?>
            </div>
            <div class="center">
                <input type="submit" value="Submit" name="submit" class="submit">
            </div>
    </div>

</form>



</body>
</html>