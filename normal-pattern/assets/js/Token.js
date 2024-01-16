// Token JS

(function ($) {
  // Setup Token
  // const Token = document.querySelectorAll("#fm-token input[field='token']");
  // const AEL_Down = "keydown";
  // const AEL_Backspace = "backspace";
  const Form_Token = document.getElementById("fm-token");
  const Submit_Token = Form_Token.querySelector("#btn-token");
  const Error_Token = document.querySelector("#error-token");

  $("#fm-token input").attr({
    max: 9999,
    min: 1,
    placeholder: "Nhập Mã Xác Thực",
    onpaste: false,
  });

  Form_Token.onsubmit = (e) => {
    e.preventDefault();
  };

  Submit_Token.onclick = () => {
    // Create XML Object
    let xhr_token = new XMLHttpRequest();

    xhr_token.open(
      "POST",
      "../../normal-pattern/views/action/action_token.php",
      true
    );
    xhr_token.onload = () => {
      if (xhr_token.readyState === XMLHttpRequest.DONE) {
        if (xhr_token.status == 200) {
          let data = xhr_token.response;

          if (data == "success") {
            location.href = "../../normal-pattern/views/main/index.php";
          } else {
            Error_Token.textContent = data;
            Error_Token.style.display = "block";
          }
        }
      }
    };

    let fdata = new FormData(Form_Token);
    xhr_token.send(fdata);
  };
})(jQuery);
