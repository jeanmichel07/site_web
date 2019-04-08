	<section class="container-fluid banner">
		<div class="container">
			<div class="inner-banner col-md-5">
				<h1>Solition Digitale pesonalisée pour votre entreprise</h1>
				<p>NL Technologie Consiste pour des services numériques<br> 
					dont l’activité s’oriente vers des conseils en technologies et<br> 
					l’éditions des logiciels.<br>
					Nous offrons aux entreprises l’opportunité de les accompagner <br>
					dans leur transformation numérique.
				</p>
			</div>
			<div class="ban col-md-7">
        <div class="shine">
          <div>
            <img src="assets/img/presentation/ordi.png" class="resp">
          </div>
        </div>
			</div>
		</div>
	</section>
	<!-- fin présentation -->



<!-- service -->
	<section class="container-fluid service">
		<div class="container">
        	<div class="row">
          		<div class="col-lg-12 text-center">
            		<h2 class="section-heading">SERVICES</h2>
            		<h3 class="section-subheading ">Voici nos différents types de services digitaux:</h3>
          		</div>
        	</div>
		<div class="container">
			<div class="row text-center">
				<div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
	            	<h4>Développement<br>sur Mesure Logiciel</h4><br><br>
                <div class="zoom-out">
                  <div>
                    <img  src="assets/img/service/logiciel 1.png"  widht="200px" height="200px">
                  </div>
                </div>
                <br><br>
	            	<p class="text-muted">Conception et Développement<br>
	            	de logiciel sur mesure</p>
                <a href="index.php?page=service" class="btn btn-danger" style="background-color: #000029; border:none; font-family:Eras Bold ITC;width: 200px; ">VOIR PLUS</a>
      
	          	</div> 
	          	<div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
	            	<h4>Développement<br>d'Application Mobile</h4><br><br>
                <div class="zoom-out">
                  <div>
                    <img src="assets/img/service/mobile2.png"  widht="200px" height="200px">
                  </div>
                </div>
                <br><br>	                
	            	<p class="text-muted">Développement d'application<br>mobile, hybride et native</p>
                <a href="index.php?page=service" class="btn btn-danger" style="background-color: #000029; border:none; font-family:Eras Bold ITC;width: 200px; ">VOIR PLUS</a>
	          	</div>
	          	<div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
	            	<h4>Développement<br>d'Application Web</h4><br><br>
                <div class="zoom-out">
                  <div>
                    <img src="assets/img/service/web 3.png"  widht="200px" height="200px">
                  </div>
                </div>
                <br><br>	           
	            	<p class="text-muted">Conception et Développement<br>d'application site Web</p>
                <a href="index.php?page=service" class="btn btn-danger" style="background-color: #000029; border:none; font-family:Eras Bold ITC;width: 200px; ">VOIR PLUS</a>
				</div>
			</div>
	</div>
	</section>
	<!-- fin service -->

	<!-- équipe -->
    <style>
        #demo
        {
            padding-top: 20px;
            padding-bottom: 20px;
            background-color: #DCDCDC;
        }
        #demo img{
            border: #fff solid 6px;
            border-radius: 5px;
        }
        .titre{
            text-align: center;
        }

    </style>
    <div class="container">
        <h2 class="titre">Equipes</h2>
        <p style="
            background-color: white;
            font-family: Agency FB;
        font-weight: bold;
        text-align: center;
        ">Voicie nos équipes:</p>
    </div>
    <hr>
    <div class="container" id="demo">

    </div>

    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/bootstrap/jquery/jquery.min.js"></script>

    <script>
        var xrh=new XMLHttpRequest();
        xrh.open('GET','http://127.0.0.1:8000/api/read/equipe');
        xrh.onreadystatechange=function () {
            if (this.readyState === 4 && this.status === 200) {

                var arr=JSON.parse(xrh.response);

                for(var i=0;i<arr.length;i++) {
                    document.getElementById("demo").innerHTML += '<div class="col-lg-3 col-md-4 col-6"><img src="http://127.0.0.1:8000/uploads/'+arr[i].image +'" width="175px" height="200px"></br><b>Nom:</b>' + arr[i].nom + '</br><b>Poste:</b>' + arr[i].poste+'</div>'
                }
            }
        };
        xrh.send()

    </script>
    <hr>
    <!-- fin équipe -->

<!-- contact -->
	<section id="contact">
        <div class="container">
          <div class="row">
              <div class="col-lg-12 text-center">
                <h2 class="section-heading">Contactez Nous</h2>
                <h3 class="section-subheading" style="color:white; ">Vous pouvez utiliser le formulaire de contact ci-dessous pour tout demande de
 renseingement.</h3>
              </div>
          </div>
          <div class="row">
              <div class="col-lg-12">
                <form id="contactForm" name="MessageEnvoyer" novalidate>
                    <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                            <input class="form-control" id="nom" type="text" placeholder="Entrer votre nom" required data-validation-required-message="S'il vous plait entrer votre nom.">
                            <p class="help-block text-danger"></p>
                          </div>
                          <div class="form-group">
                            <input class="form-control" id="email" type="email" placeholder="Entrer votre adresse email" required data-validation-required-message="S'il vous plait entrer votre adresse email.">
                            <p class="help-block text-danger"></p>
                          </div>
                          <div class="form-group">
                            <input class="form-control" id="numero" type="tel" placeholder="Entrer votre numero de telephone" required data-validation-required-message="S'il vous plait entrer votre numero de téléphone.">
                            <p class="help-block text-danger"></p>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <textarea class="form-control" id="message" placeholder="Entrer votre message" required data-validation-required-message="S'il vous plait entrer votre message."></textarea>
                            <p class="help-block text-danger"></p>
                          </div>
                      </div>
                      <div class="clearfix"></div>
                      <div class="col-lg-12 text-center">
                          <a href="#" class="btn btn-danger" style="background-color: #000029; border:none; font-family:Eras Bold ITC; ">ENVOYER</a>
                      </div>
                    </div>
                </form>
              </div>
          </div>
          <br>
          <br>
          <br>
          <br>
          <br>

          <div class="row">
            <div class=" coordoné col-md-12">
              <div class="col-md-5">
                <div>
                  <p><img src="assets/img/contact/localisation.png" widht="15px" height="15px">&#x20;&#x20;Anjanahary II 137 101 Antananarivo-Madagascar</p>
                </div>
              </div>
              <div class="col-md-3">
                <p><img src="assets/img/contact/tel.png" widht="15px" height="15px">&#x20;&#x20;+261 34 99 797 29</p>
              </div>
              <div class="col-md-4">
                <div>
                  <p><img src="assets/img/contact/email.png" widht="15px" height="15px">&#x20;&#x20;nltechnologie19@gmail.com</p>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>     	
	<!-- fin contact -->



