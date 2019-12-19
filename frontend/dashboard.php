<?php require_once 'includes/header.php';

if (!isset($_SESSION['username'])) {
    header ('Location: login.php');
    exit();
}

?>
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
                                        <h4>Bonjour, <span> <?php echo $_SESSION['username'] ?></span></h4>
                                    </div>
                                </div>
                                <div class="dashboard-list-box fl-wrap activities">
                                    <div class="dashboard-header fl-wrap">
                                        <h3>Dernières Inscriptions</h3>
                                    </div>
                                    <div class="dashboard-list">
                                        <div class="dashboard-message">
                                            <div class="dashboard-message-text">
                                                <p class="fts-14"><i class="fa fa-check"></i>
                                                    <a><?php echo $_SESSION['username'] ?></a> s'est inscrit le <a>20-12-2019 à 10h28</a>
                                                </p>
                                            </div>
                                        </div>
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