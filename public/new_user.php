<?php 
require_once("services/auth_service.php"); 
require_once("controllers/new_user_ctrl.php"); 
?>
<!doctype html>
<html lang="it">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Weblog</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css-custom/admin.css" rel="stylesheet" />
    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>
    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
    <!--     Fonts and icons     -->
    <link href="fonts/glyphicons-halflings-regular.ttf">
    <link href="fonts/fontawesome-webfont.ttf">

    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link href="assets/css/bootstrap-select.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link  href="assets/css/datepicker.css" rel="stylesheet">
	<script src="assets/js/datepicker.js"></script>
    <script src="assets/js/bootstrap-select.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>
    <script src="assets/js/bootstrap-notify.js"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/light-bootstrap-dashboard.js"></script>
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="assets/img/sidebar.jpg">

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    WeBlog
                </a>
            </div>

            <!--   Menu Di Navigazione Admin -->
            <ul class="nav">
                <li><a href="dashboard.php"><i class="pe-7s-graph3"></i><p>Dashboard</p></a></li>
                <li><a href="manage_profile.php"><i class="pe-7s-user"></i><p>Gestione Profilo</p></a></li>
                <li><a href="new_article.php"><i class="pe-7s-news-paper"></i><p>Nuovo Articolo</p></a></li>
                <li><a href="manage_articles.php"><i class="pe-7s-note2"></i><p>Gestione Articoli</p></a></li>
                <li><a href="new_subject.php"><i class="pe-7s-box2"></i><p>Nuova Categoria</p></a></li>
                <li><a href="manage_subjects.php"><i class="pe-7s-albums"></i><p>Gestione Categorie</p></a></li>
                <?php 
                    if ($root) {
                        echo "<li class=\"active\"><a href=\"new_user.php\"><i class=\"pe-7s-add-user\"></i><p>Nuovo Utente</p></a></li>";
                        echo "<li><a href=\"manage_users.php\"><i class=\"pe-7s-users\"></i><p>Gestione Utenti</p></a></li>"; 
 
                    }
                ?>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
		<nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><p>Logout</p></a></li>
                        <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Nuovo Utente</h4>
                            </div>
                                 
                            <form  id="aggiungi_articolo" action="new_user.php" method="POST" enctype="multipart/form-data">
                                <div class="content">
                                    <div class="form-group">
                                    <!--   Visualizza Messaggi di Avvertimento -->
                                    <?php
                                        if ($message) {   
                                            echo "<div class=\"content\"><div class=\"alert alert-info\">" . $message . "</div></div>";
                                        }
                                    ?>
                                    </div>
                                    <!--   Scelta Username   -->
                                    <div class="form-group">
                                        <label class="control-label">Username <span class="star">*</span></label>
                                        <input class="form-control" name="username" type="text" placeholder="Inserisci Username">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!--   Scelta Nome   -->
                                            <div class="form-group">
                                                <label class="control-label">Nome <span class="star">*</span></label>
                                        		<input class="form-control" name="name" type="text" placeholder="Inserisci Nome">
                                            </div>
                                        </div>   
                                        <div class="col-md-6">
                                            <!--   Scelta Cognome   -->
                                            <div class="form-group">
                                                <label class="control-label">Cognome <span class="star">*</span></label>
                                        		<input class="form-control" name="surname" type="text" placeholder="Inserisci Cognome">
                                            </div>
                                        </div>   
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!--   Scelta Data Nascita   -->
                                            <div class="form-group">
                                                <label class="control-label">Data Nascita <span class="star">*</span></label>
                                        		<input class="form-control" name="birth" type="text" placeholder="Inserisci Data di Nascita">
                                            </div>
                                        </div>   
                                        <div class="col-md-6">
                                            <!--   Scelta Indirizzo   -->
                                            <div class="form-group">
                                                <label class="control-label">Indirizzo <span class="star">*</span></label>
                                        		<input class="form-control" name="address" type="text" placeholder="Inserisci Indirizzo">
                                            </div>
                                        </div>   
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!--   Scelta Password   -->
                                            <div class="form-group">
                                                <label class="control-label">Password <span class="star">*</span></label>
                                                <input class="form-control" name="password" type="password" placeholder="Inserisci Password">
                                            </div>
                                        </div>   
                                        <div class="col-md-6">
                                            <!--   Scelta Password Nuovamente  -->
                                            <div class="form-group">
                                                <label class="control-label">Re Password <span class="star">*</span></label>
                                                <input class="form-control" name="password_re" type="password" placeholder="Inserisci Password Nuovamente">
                                            </div>
                                        </div>   
                                    </div>

                                    <!--   Conferma Creazione Utente  -->
                                    <button type="submit" name="submit" value="publish" class="btn btn-info btn-fill btn-wd">Crea Utente</button>

                                    <div class="content"><h5 class="title">N.B. Solo l'admin può creare altri utenti, che sono suoi delegati con privilegi ridotti.</h5></div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="images/blue-profile.png" alt="Sfondo Foto Profilo"/>
                            </div>
                            <div class="content">
                                <div class="author">
                                    <div class="author-container" id="pavatar">
                                      <!--   Visualizzazione preview immagine profilo scelta  -->
                                      <img src="images/default-avatar.png" alt="Avatar" class="image-pavatar avatar">
                                    </div>
                                    <!--   Scelta Immagine Profilo  -->
                                    <input id="input-b2" name="input-b2" type="file" class="file" data-show-preview="false">
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> 
                </p>
            </div>
        </footer>
    </div>
</div>
</body>
</html>