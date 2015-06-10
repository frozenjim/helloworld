<?php

class class_navigation {
    private $userID;


    public function old_footer (){

        isset($_SESSION['userID']) ? $userID = $_SESSION['userID'] :$userID = 0;

        echo '<p><div>';
        echo '<span>  <a href=index.php>Home</a></span>';
        echo '<span>  <a href=two.php>Page Two</a></span>';
        echo '<span>  <a href=test.php>Class Test</a></span>';

        if($userID) {
            echo '<span>  <a href=logout.php>Log Off</a></span>';
        } else {
            echo '<span>  <a href=login.php>Login</a></span>';
        }

        echo '</div>';
    }

    public function footer (){
        isset($_SESSION['userID']) ? $this->userID = $_SESSION['userID'] :$this->userID = 0;
        $this->userID = 0 ? $value = "Login" : $value = "Log Out";


        echo "<form method=\"post\" id=\"formNav\" name=\"formNav\" action=\"\">";
            echo "<input type=\"button\" onclick=\"submitForm('index.php')\" value=\"Home\"/>";
            echo "<input type=\"button\" onclick=\"submitForm('two.php')\" value=\"Two\" />";
            echo "<input type=\"button\" onclick=\"submitForm('test.php')\" value=\"Test\"/>";
            echo "<input type=\"button\" onclick=\"submitForm('login.php')\" value=\"$value\"/>";
        echo "</form>";
        ?>

        <script type="text/javascript">
            function submitForm(form_action) {
                document.getElementById("formNav").action = form_action;
                document.getElementById("formNav").submit();
            }

        </script>
        <?php

    }

}
?>