<style>
    .result{
        display: flex;
        flex-direction: column;
        background-color: blue;
        
    }
    #description{
        font-weight: lighter;
        font-size: 15px;
    }
</style>

<?php
    include "../Classes/user.php";
    $input= $_POST["input"];
    $users = User::get_user_like($input);

    if($users){
        echo "<table><thead><tr><th>Username</th></tr></thead>";
        foreach($users as $user){
            $username= $user["username"];
            $name=$user["name"];
            $surname = $user["surname"];
            echo "<tr><th class='result'><div>{$username}</div><div id='description'>$name $surname</div></th></tr>";
        }
        echo "</table>";
    }else{
        echo "none";
    }
?>

    
   
