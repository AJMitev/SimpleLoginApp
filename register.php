<?php
include_once 'header.php';

        /*if(isset($_SESSION['u_isAdmin']) && $_SESSION['u_isAdmin'] == 1){*/
            echo '<main>
    <div class="container body-content span=8 offset=2">
        <form class="needs-validation" novalidate action="includes/register.inc.php" method="post">
            <fieldset>
                <legend>Register</legend>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip01">First name</label>
                        <input type="text" class="form-control" id="validationTooltip01" name="first"
                               placeholder="First name" required>
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip02">Last name</label>
                        <input type="text" class="form-control" id="validationTooltip02" name="last"
                               placeholder="Last name" required>
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltipUsername">Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                            </div>
                            <input type="text" class="form-control" name="uid" id="validationTooltipUsername"
                                   placeholder="Username" aria-describedby="validationTooltipUsernamePrepend" required>
                            <div class="invalid-tooltip">
                                Please choose a unique and valid username.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltip03">Email</label>
                        <input type="email" class="form-control" id="validationTooltip03" name="email"
                               placeholder="Email" required>
                        <div class="invalid-tooltip">
                            Please provide a valid city.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip04">Password</label>
                        <input type="password" class="form-control" name="pwd" id="validationTooltip04"
                               placeholder="Password" required>
                        <div class="invalid-tooltip">
                            Please provide a valid password.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip05">Confirm Password</label>
                        <input type="password" class="form-control" id="validationTooltip05"
                               placeholder="Confirm Password" required>
                        <div class="invalid-tooltip">
                            Please provide a valid password.
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                            <label class="form-check-label" for="invalidCheck">
                                Agree to terms and conditions
                            </label>
                            <div class="invalid-feedback">
                                You must agree before submitting.
                            </div>
                        </div>
                    </div>
            </fieldset>
            <div class="offset-md-6 offset-lg-8">
                <button type="reset" class="btn btn-default">Cancel</button>
                <button type="submit" name="submit" class="btn btn-primary">Register</button>
            </div>
        </form>
    </div>


</main>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        \'use strict\';
        window.addEventListener(\'load\', function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            let forms = document.getElementsByClassName(\'needs-validation\');
            // Loop over them and prevent submission
            let validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener(\'submit\', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add(\'was-validated\');
                }, false);
            });
        }, false);
    })();
</script>';
       /* }else{
            header('Location: index.php');
            exit;
        }*/

include_once 'footer.php';