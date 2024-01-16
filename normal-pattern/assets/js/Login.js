// Login JS

(function ($) {
  const Form_Login = document.getElementById("fm-login");
  const Submit_Login = Form_Login.querySelector("#btn-login");
  // const Submit_Google = document.querySelector("");
  const Error_Login = document.querySelector("#fm-login #alert-login");

  Form_Login.onsubmit = (e) => {
    e.preventDefault();
  };

  Submit_Login.onclick = () => {
    // Create XML Object
    let xhr_login = new XMLHttpRequest();

    xhr_login.open(
      "POST",
      "../../normal-pattern/views/action/action_login.php",
      true
    );
    xhr_login.onload = () => {
      if (xhr_login.readyState === XMLHttpRequest.DONE) {
        if (xhr_login.status == 200) {
          let data = xhr_login.response;

          if (data == "*user account success") {
            location.href = "../../normal-pattern/views/main/index.php";
          } else if (data == "*admin account success") {
            location.href = "../../normal-pattern/views/main/dashboard.php";
          } else {
            Error_Login.textContent = data;
            Error_Login.style.display = "block";
          }
        }
      }
    };

    let fdata = new FormData(Form_Login);
    xhr_login.send(fdata);
  };
})(jQuery);
