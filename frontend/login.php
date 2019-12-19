<?php require_once 'includes/header.php';
include'../backend/controllers/register.php';
?>

    <div id="wrapper">
        <div class="content">
            <section id="sec1">
                <div class="container">
                    <div class="profile-edit-wrap">
                        <div class="row">

                            <div class="main-register fl-wrap">
                                <h3>Accédez à <span>PPE2<strong>-Panel</strong></span></h3>
                                <div class="soc-log fl-wrap tabs-menu">
                                    <p>Lors de votre connexion, la traitement de vos données est sécurisé.</p>
                                    <a href="#tab-1" class="facebook-log"><i class="fa fa-user"></i>Connexion</a>
                                </div>
                                <div id="tabs-container">
                                    <div class="tab">
                                        <div id="tab-1" class="tab-content">
                                            <div class="custom-form">
                                                <?php
                                                if (isset($error))
                                                    echo '<div class="alert alert-danger">Erreur : </>'.$error.'</div>';
                                                else if (isset($success))
                                                    echo '<div class="alert alert-success">'.$success.'</div>';
                                                ?>
                                                <form method="post" name="loginForm" action="" onsubmit="return validateLoginForm()">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Nom d'utilisateur *<span id="error-username" class="error-msg"></span></label>
                                                            <input type="text" id="username" name="username" placeholder="" onClick="this.select()" value="" autofocus/>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Mot de Passe *<span id="error-password" class="error-msg"></span></label>
                                                            <input type="password" id="password" name="password" placeholder="" onClick="this.select()" value=""/>
                                                        </div>
                                                    </div>
                                                    <button type="submit" id="login" name="login" class="log-submit-btn">
                                                        <span>Se connecter</span></button>
                                                    <div class="clearfix"></div>
                                                    <div class="filter-tags">
                                                        <input id="check-a" type="checkbox" name="check">
                                                        <label for="check-a">Se souvenir</label>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
<?php require_once 'includes/footer.php' ?>