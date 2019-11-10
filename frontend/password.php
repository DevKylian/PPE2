<?php require_once 'includes/header.php' ?>
    <div id="wrapper">
        <div class="content">
            <section id="sec1">
                <div class="container">
                    <div class="profile-edit-wrap">
                        <div class="profile-edit-page-header">
                            <h2>Tableau de Bord</h2>
                            <div class="breadcrumbs"><a href="dashboard.php#">Accueil</a><span>Tableau de Bord</span>
                            </div>
                        </div>
                        <div class="row">
                            <?php require_once 'includes/sidebar.php' ?>
                            <div class="col-md-6">
                                <div class="profile-edit-container">
                                    <div class="profile-edit-header fl-wrap" style="margin-top:30px">
                                        <h4>Changer de Mot de Passe</h4>
                                    </div>
                                    <div class="custom-form">
                                        <div class="pass-input-wrap fl-wrap">
                                            <label>Mot de Passe<i class="fa fa-lock"></i> </label>
                                            <input type="password" class="pass-input" placeholder="" value=""/>
                                            <span class="eye"><i class="fa fa-eye" aria-hidden="true"></i> </span>
                                        </div>
                                        <div class="pass-input-wrap fl-wrap">
                                            <label>Nouveau Mot de Passe<i class="fa fa-lock"></i> </label>
                                            <input type="password" class="pass-input" placeholder="" value=""/>
                                            <span class="eye"><i class="fa fa-eye" aria-hidden="true"></i> </span>
                                        </div>
                                        <div class="pass-input-wrap fl-wrap">
                                            <label>Confirmation du Nouveau Mot de Passe<i class="fa fa-lock"></i>
                                            </label> <input type="password" class="pass-input" placeholder="" value=""/>
                                            <span class="eye"><i class="fa fa-eye" aria-hidden="true"></i> </span>
                                        </div>
                                        <button type="submit" class="btn big-btn color-bg flat-btn">Valider la modification
                                            <i class="fa fa-check" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <?php require_once 'includes/profil-card.php' ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
<?php require_once 'includes/footer.php' ?>