// Token JS

(function($) {

    // Setup Token
    const Token = "";
    const AEL_Down = "keydown";
    const AEL_Backspace = "backspace";
    const Form_Token = document.getElementById("fm-token");
    const Submit_Token = Form_Token.querySelector("#btn-token");
    const Error_Token = "";
    
    $("#fm-token input").attr({
        "max": 999,
        "min": 1,
        "placeholder": "Nhập Mã Xác Thực",
        "onpaste": false,
    });
    
    Form_Token.onsubmit = (e) => {
        e.preventDefault();
    }

    Submit_Token.onclick = () => {
        // Create XML Object
        let xhr_token = new XMLHttpRequest();

        xhr_token.open("POST", "../../views/action/action_token.php", true);
        xhr_token.onload = () => {
            if(xhr_token.readyState === XMLHttpRequest.DONE) {
                if(xhr_token.status === 200) {
                    let data = xhr_token.response;

                    if(data == "success") {

                    }

                    if(data == "false") {

                    }
                }
            }
        }
    }

})(jQuery);