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
                                    <div class="profile-edit-header fl-wrap">
                                        <h4>Mon Profil</h4>
                                    </div>
                                    <div class="custom-form">
                                        <label>Prénom <i class="fa fa-address-card"></i></label>
                                        <input type="text" placeholder="Kylian" value=""/> <label>Nom
                                            <i class="fa fa-id-card"></i></label>
                                        <input type="text" placeholder="Dev" value=""/>
                                        <label>Nom d'Utilisateur<i class="fa fa-id-badge"></i></label>
                                        <input type="text" placeholder="KylianDev" disabled value=""/>
                                        <label>Adresse Email<i class="fa fa-envelope"></i> </label>
                                        <input type="text" placeholder="me@kyliandev.fr" disabled value=""/>
                                        <label>Date de Naissance<i class="fa fa-birthday-cake"></i> </label>
                                        <input type="text" placeholder="Date" class="datepicker" data-large-mode="true" data-large-default="true" value=""/>
                                        <label>Rôle</label>
                                        <div class="profile-edit-container add-list-container">
                                            <div class="custom-form">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="add-list-media-header">
                                                            <label class="radio inline">
                                                                <input type="radio" name="gender" checked>
                                                                <span>Utilisateur</span> </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="add-list-media-header">
                                                            <label class="radio inline">
                                                                <input type="radio" name="gender">
                                                                <span>Administrateur</span> </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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