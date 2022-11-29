<?php
session_start();
    if(isset($_POST['user'])){
        $username = $_POST['user'];
        $_SESSION['username'] = $username;
    }
?>
        <?php  include 'include/head.php'?> 

        <?php include 'include/navigation.php' ?>
        <?php include 'code/login.code.php'?>

        <div id="frm" style="text-align: center;">
            <h1>Login</h1>
            <form name="f1" action="index.php" onsubmit="return validation()" method="POST">
                <p>
                    <label>Username: </label>
                    <input type="text" id="user" name="user">
                </p>
                <p>
                    <label>Password: </label>
                    <input type="password" id="pass" name="pass">
                </p>
                <p>
                    <input type="submit" id="btnSubmit" value="Login">
                </p>
                <p class="text-danger">
                    <?php
                        if(isset($_GET['incorrect'])){
                            if($_GET['incorrect'] == 1){
                                echo 'Username Or Password Incorrect';
                            }
                        }
                    ?>
                </p>
            </form>
        </div>

        <script>
            function validation(){
                var id = document.f1.user.value;
                var ps = document.f1.pass.value;

                if(id.length == "" && ps.length == ""){
                    alert("Les chmaps username et password sont vide.");
                    return false;
                }else{
                    if(id.length == ""){
                        alert("Le champ username est vide.");
                        return false;
                    }
                    if(ps.length == ""){
                        alert("Le champ password est vide.");
                        return false;
                    }
                }
            }
        </script>
<?php include 'include/footer.php'?> 