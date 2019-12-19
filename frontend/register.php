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
                                    <a href="#tab-1" class="twitter-log"><i class="fa fa-user-plus"></i> Inscription</a>
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
                                                <form method="post" name="registerForm" class="main-register-form" action="" onsubmit="return validateForm()">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Prénom *<span id="error-firstname" class="error-msg"> </span></label>
                                                            <input type="text" id="firstname" name="firstname" placeholder="Elon" onClick="this.select()" value="<?php if(isset($_POST['firstname'])) echo $_POST['firstname']; ?>"/>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Nom *<span id="error-lastname" class="error-msg"></span></label>
                                                            <input type="text" id="lastname" name="lastname" placeholder="Musk" onClick="this.select()" value="<?php if(isset($_POST['lastname'])) echo $_POST['lastname']; ?>"/>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Nom d'utilisateur *<span id="error-username" class="error-msg"></span></label>
                                                            <input type="text" id="username" name="username" placeholder="Elonmusk" onClick="this.select()" value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>"/>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Adresse Email *<span id="error-email" class="error-msg"></span></label>
                                                            <input type="text" id="email" name="email" placeholder="elon.musk@tesla.com" onClick="this.select()" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"/>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Mot de Passe *<span id="error-password" class="error-msg"></span></label>
                                                            <input type="password" id="password" name="password" placeholder="****************" onClick="this.select()" value=""/>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Confirmation du Mot de Passe *<span id="error-password_confirmation" class="error-msg"></span></label>
                                                            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="****************" onClick="this.select()" value=""/>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Date de Naissance *<span id="error-birthdate" class="error-msg"></span></label>
                                                            <input type="date" id="birthdate" name="birthdate" placeholder="" onClick="this.select()" value="<?php if(isset($_POST['birthdate'])) echo $_POST['birthdate']; ?>"/>
                                                        </div>
                                                    </div>
                                                    <button type="submit" id="register" name="register" class="log-submit-btn">
                                                        <span>S'inscrire</span></button>
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