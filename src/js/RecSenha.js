/*******************************************************************************
 *
 * class RecSenha
 *
 ******************************************************************************/

function forgotPassword() {
    var forgotEmail = document.getElementById('forgotEmail').value;
    window.location.href = 'skp:forgot_password@' + encodeURIComponent(JSON.stringify({ email: forgotEmail }));
  }
