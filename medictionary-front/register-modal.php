<form method="post" id="signup_form" >
<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header text-center">
			<h4 class="modal-title w-100 font-weight-bold">Inscrivez-vous</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
				<p class="statusMsg"></p>
		  </div>
	  
		  <div class="modal-body mx-3">
			<div class="md-form mb-5">
			  <i class="fa fa-user prefix grey-text"></i>
			  <input type="text" id="login" class="form-control validate">
			  <label data-error="wrong" data-success="right" for="login">Nom d'utilisateur</label>
			</div>
			<div class="md-form mb-5">
			  <i class="fa fa-medkit prefix grey-text"></i>
			  <input type="text" id="socialSecurityNumber" class="form-control validate">
			  <label data-error="wrong" data-success="right" for="socialSecurityNumber">Numéro sécurité social</label>
			</div>
			<!--<div class="md-form mb-5">
			  <i class="fa fa-envelope prefix grey-text"></i>
			  <input type="email" id="email" class="form-control validate">
			  <label data-error="wrong" data-success="right" for="email">Email</label>
			</div>-->

			<div class="md-form mb-4">
			  <i class="fa fa-lock prefix grey-text"></i>
			  <input type="password" id="password" class="form-control validate">
			  <label data-error="wrong" data-success="right" for="password">Mot de passe</label>
			</div>

		  </div>
		  <div class="modal-footer d-flex justify-content-center">
			<button id="signup_form_btn" class="btn btn-deep-orange">S'enregistrer</button>
		  </div>

    </div>
  </div>
</div>
</form>