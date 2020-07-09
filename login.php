<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">LOGIN TO PIYUSHPK</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="_handleLogin.php" method="POST">
                <div class="modal-body">
                    <label for="formGroupExampleInput">E-mail Address</label>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" placeholder="example@xyz.com" aria-label="Email" aria-describedby="basic-addon1">
                    </div>
                    <label for="formGroupExampleInput">Password</label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>
</div>
