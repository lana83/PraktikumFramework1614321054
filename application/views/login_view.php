
				<div class="panel-heading">
					<h3 class="panel-title">Please Sign In</h3>
				</div>
				<div class="panel-body">
					<?php
						if(!empty($notif)){
							echo '<div class="alert alert-danger">';
							echo $notif;
							echo '</div>';
						}
					?>

					<form role="form" action="<?php echo base_url(); ?>index.php/Login/dologin" method="post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="username" name="Username" autofocus>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="Password" type="password" value="">
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>
							<!-- Change this to a button or input when using this as a form -->
							<input class="btn btn-lg btn-success btn-block" name="submit" type="submit" value="Login">
						</fieldset>
					</form>
				</div>
