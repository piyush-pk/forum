<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">SIGNUP TO PIYUSHPK </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/_handleSignup.php" method="POST">
                    <label for="formGroupExampleInput">Your Name</label>
                    <div class="input-group mb-3">
                        <input type="text" id="email" class="form-control" required placeholder="Piyush Khandelwal" name="name" aria-label="Email" aria-describedby="basic-addon1">
                    </div>
                    <label for="formGroupExampleInput">E-mail Address</label>
                    <div class="input-group mb-3">
                        <input type="email" id="email" class="form-control" required placeholder="example@xyz.com" name="email" aria-label="Email" aria-describedby="basic-addon1">
                    </div>
                    <label for="formGroupExampleInput">Password</label>
                    <div class="input-group mb-3">
                        <input type="password" id="password" class="form-control" required name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                    </div>
                    <label for="formGroupExampleInput">Confirm Password</label>
                    <div class="input-group mb-3">
                        <input type="password" id="cpassword" class="form-control" required name="cpassword" placeholder="Confirm Password" aria-label="Confirm Password" aria-describedby="basic-addon1">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
</div>