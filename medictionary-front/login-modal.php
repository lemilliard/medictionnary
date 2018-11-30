<form method="post" id="login_form">
    <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Connectez-vous</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <i class="fa fa-user prefix grey-text"></i>
                        <input type="text" id="loginc" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="loginc">Nom d'utilisateur</label>
                    </div>
                    <div class="md-form mb-4">
                        <i class="fa fa-lock prefix grey-text"></i>
                        <input type="password" id="passwordc" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="passwordc">Mot de passe</label>
                    </div>
                    <p class="statusMsg"></p>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button id="login_form_btn" class="btn btn-default">Connexion</button>
                </div>
            </div>
        </div>
    </div>
</form>