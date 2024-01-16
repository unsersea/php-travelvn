<script>
    document.getElementById("logout-username").addEventListener("click", () => {
        <?php

        session_start();
        unset($_SESSION["navbar_username"]);
        unset($_SESSION["user_token"]);
        session_destroy();
        header("Location: ../../normal-pattern/views/login.php");

        ?>
    });

    document.getElementById("_logout-username").addEventListener("click", () => {
        <?php

        session_start();
        unset($_SESSION["sidebar_username"]);
        unset($_SESSION["user_token"]);
        session_destroy();
        header("Location: ../../normal-pattern/views/login.php");

        ?>
    });
</script>