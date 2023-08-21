<!-- index.php -->

<?php
    include "library.php";
    $clusterSumatra = getClusterDesc(6);
    $clusterJava = getClusterDesc(2);
    $clusterBaliNT = getClusterDesc(1);
    $clusterKalimantan = getClusterDesc(3);
    $clusterSulawesi = getClusterDesc(5);
    $clusterPapuaMaluku = getClusterDesc(4);

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Strategi Adaptasi" />
        <meta name="author" content="Mohammad Fadli" />
        <title>Strategi Adaptasi</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
		<style>
		#mainNav.navbar-shrink {
			padding-top: 1rem;
			padding-bottom: 1rem;
			background-color: #D9E9F0;
		}
		#mainNav .navbar-brand img {
			height: 4rem;
		}
		#mainNav.navbar-shrink .navbar-brand svg, #mainNav.navbar-shrink .navbar-brand img {
			height: 3rem;
		}
		#mainNav .navbar-nav .nav-item .nav-link.active, #mainNav .navbar-nav .nav-item .nav-link:hover {
		  color: #316DA9;
		  background-color: #90AFC6;
		}
		.nav-link {
			/*background-color: #055F3B;*/
		}
		.btn-primary {
		--bs-btn-color: #fff;
		--bs-btn-bg: #316DA9;
		--bs-btn-border-color: #055F3B;
		--bs-btn-hover-color: #fff;
		--bs-btn-hover-bg: #2799E5;
		--bs-btn-hover-border-color: #064c30	;
		--bs-btn-focus-shadow-rgb: 255, 208, 38;
		--bs-btn-active-color: #fff;
		--bs-btn-active-bg: #064c30;
		--bs-btn-active-border-color: #064c30;
		--bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
		--bs-btn-disabled-color: #fff;
		--bs-btn-disabled-bg: #055F3B;
		--bs-btn-disabled-border-color: #055F3B;
		}
		.page-section {
			background-color: #E2ECEE;
		}
		#mainNav .navbar-nav .nav-item .nav-link {
			background-color: #316DA9;
		}
        header.masthead {
            padding-top: 10rem;
            padding-bottom: 12.5rem;
        }
        header.masthead .masthead-heading {
            font-size: 2.5rem;
            font-weight: 700;
            line-height: 4.5rem;
            margin-bottom: 0rem;
        }
        header.masthead .masthead-subheading {
            font-size: 1.25rem;
            font-style: italic;
            line-height: 1.55rem;
            margin-bottom: 2rem;
        }
        header.masthead {
            text-align:left;
            
        }
          table.two-column {
            width: 100%;
            border-collapse: collapse;
          }
          
          table.two-column td {
            width: 50%;
            padding: 10px;
          }
		</style>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><img src="assets/img/strada.png" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#basic">Basic Concept</a></li>
						<li class="nav-item"><a class="nav-link" href="map.php">Map</a></li>
                        <li class="nav-item"><a class="nav-link" href="#team">Vulnerability Groups</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Methodology</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
<table class="two-column">
  <tr>
    <td>
<div class="masthead-heading">What is Strada?</div>
<div class="masthead-subheading">Strada is a platform for Climate Change Vulnerability Profiles and Local Adaptation Strategies in Indonesia. This platform is useful for anyone who wants to find adaptation strategies at the village (local) level based on the national climate change vulnerability profile at the village level. </div>
				
                <a class="btn btn-primary btn-xl text-uppercase" href="map.php">Open Map!</a>
        </td>
    <td><img src="img/strada_map.png" style="width:550px;"></td>
  </tr>
</table>
			
                
                
            </div>
        </header>
        <!-- Basic-->
        <section class="page-section" id="basic">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading blue">Basic Concept</h2>
                </div>
                <div class="row text-left">
<table class="two-column">
  <tr>
    <td style="vertical-align:top;"><p>
Vulnerability to climate change and other environmental hazards vary significantly, and are a result of a range of social, economic, historical, and political factors. Vulnerability is a multidimensional concept encompassing climatic and ecological changes, dependence on natural resources, poverty and socioeconomic impacts, and investments in disaster risk management and other measures. </p><p>
Vulnerability can be defined as the extent to which a community is susceptible to a hazard and its inability to cope with the effects of that hazard. The impacts experienced by communities depend not only their exposure to climate risks, but also on the sensitivity of their livelihoods and cultures to climatic changes, and their capacity to adapt. This three-part definition of vulnerability encompasses a contextualized understanding of localized risks and mitigating conditions that communities face. 
</p></td>
    <td><img src='img/basic.png' width='100%'></td>
  </tr>
</table>
                    
                    
                </div>
            </div>
        </section>
        <!-- Team-->
        <section class="page-section bg-light" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading blue">Vulnerability Cluster</h2>
                    <h3 class="section-subheading text-muted"><b>Indonesia is one of the world’s top greenhouse gas (GHG) emitters and is extremely vulnerable to climate change risks.</b> As a large archipelagic country with extensive low-lying and small island areas, Indonesia has experienced increasing frequency and intensity of climate-induced natural disasters‒such as floods and droughts. Over the past two decades, such hydrometeorological events accounted for over 75 percent of disasters in Indonesia, and 60 percent of the economic damage (Djalante et al. 2021). This trend is expected to accelerate in the coming years (Republic of Indonesia 2021). The government is committed to reducing emissions by 29 percent by 2030 but reaching this goal will require significant policy changes and investments. In the meantime, communities across Indonesia’s diverse ecological system will face an increasing number of intensifying climate risks and they will need to adapt to these changing circumstances.</h3>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="team-member">
                            <a data-bs-toggle="modal" href="#clustersumatra">
                            <img class="mx-auto rounded-circle" src="img/sumatra.jpg" alt="..." />
                            <h4>Sumatra</h4>
                            <p class="text-muted">Cluster Sumatra</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <a data-bs-toggle="modal" href="#clusterjava">
                            <img class="mx-auto rounded-circle" src="img/java.jpg" alt="..." />
                            <h4>Java</h4>
                            <p class="text-muted">Cluster Java</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <a data-bs-toggle="modal" href="#clusterbalint">
                            <img class="mx-auto rounded-circle" src="img/balint.jpg" alt="..." />
                            <h4>Bali/Nusa Tenggara</h4>
                            <p class="text-muted">Cluster Bali/NT</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <a data-bs-toggle="modal" href="#clusterkalimantan">
                            <img class="mx-auto rounded-circle" src="img/kalimantan.jpg" alt="..." />
                            <h4>Kalimantan</h4>
                            <p class="text-muted">Cluster Kalimantan</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <a data-bs-toggle="modal" href="#clustersulawesi">
                            <img class="mx-auto rounded-circle" src="img/sulawesi.jpg" alt="..." />
                            <h4>Sulawesi</h4>
                            <p class="text-muted">Cluster Sulawesi</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <a data-bs-toggle="modal" href="#clusterpapuamaluku">
                            <img class="mx-auto rounded-circle" src="img/papuamaluku.jpg" alt="..." />
                            <h4>Papua/Maluku</h4>
                            <p class="text-muted">ClusterPapua/Maluku</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 mx-auto"><p class="large">Villages with similar vulnerability profiles are grouped together into clusters to make the maps simple and easy to use, while retaining key differentiators. We performed separate cluster analyses within six subregions since differences within these subregions are of more interest than the similarities across them. A total of 61 clusters were identified across six major subregions of Indonesia‒namely Sumatra, Java, Kalimantan, Bali/West Nusa Tenggara (Nusa Tenggara Barat: NTB)/East Nusa Tenggara (Nusa Tenggara Timur: NTT), Sulawesi, and Maluku/Papua.5 Within these six subregions, villages with similar climate change vulnerabilities share similar topographic, ecological, infrastructural, and livelihood qualities. We selected the appropriate number of vulnerability clusters within each subregion using elbow plots, silhouette plots, and dendrograms shown in Figure 1, and through the application of domain knowledge</p></div>
                </div>
            </div>
        </section>
        <!-- Clients-->
        <div class="py-5">
            <div class="container">
                <div class="row align-items-center">
                        <a href="https://www.worldbank.org"><img class="img-fluid img-brand d-block mx-auto" src="img/supporter.png" alt="..." aria-label="GFDRR" /></a>
                </div>
            </div>
        </div>

        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; Global Facility for Disaster Reduction & Recovery 2023</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                        <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Portfolio Modals-->
        <!-- Cluster Sumatra popup-->
        <div class="portfolio-modal modal fade" id="clustersumatra" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-9">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2>Cluster Sumatra</h2>
                                    <img src='img/sumatra.png' width='100%'>
                                    <!--<p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>-->
        <?php
        
        foreach ($clusterSumatra as $cluster) {
            echo "<h3>" . $cluster['cluster'] . "</h3>";
            echo "<p>" . $cluster['desc1'] . "</p>";
            echo "<p>" . $cluster['desc2'] . "</p>";
        }
        
        ?>
                                    <button class="btn btn-primary btn-xl" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Cluster Java popup-->
        <div class="portfolio-modal modal fade" id="clusterjava" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-9">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2>Cluster Java</h2>
                                    <img src='img/java.png' width='100%'>
                                    <!--<p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>-->
        <?php
        
        foreach ($clusterJava as $cluster) {
            echo "<h3>" . $cluster['cluster'] . "</h3>";
            echo "<p>" . $cluster['desc1'] . "</p>";
            echo "<p>" . $cluster['desc2'] . "</p>";
        }
        
        ?>
                                    <button class="btn btn-primary btn-xl" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Cluster Bali NT popup-->
        <div class="portfolio-modal modal fade" id="clusterbalint" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-9">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2>Cluster Bali/Nusa Tenggara</h2>
                                    <img src='img/balint.png' width='100%'>
                                    <!--<p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>-->
        <?php
        
        foreach ($clusterBaliNT as $cluster) {
            echo "<h3>" . $cluster['cluster'] . "</h3>";
            echo "<p>" . $cluster['desc1'] . "</p>";
            echo "<p>" . $cluster['desc2'] . "</p>";
        }
        
        ?>
                                    <button class="btn btn-primary btn-xl" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Cluster Kalimantan popup-->
        <div class="portfolio-modal modal fade" id="clusterkalimantan" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-9">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2>Cluster Kalimantan</h2>
                                    <img src='img/kalimantan.png' width='100%'>
                                    <!--<p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>-->
        <?php
        
        foreach ($clusterKalimantan as $cluster) {
            echo "<h3>" . $cluster['cluster'] . "</h3>";
            echo "<p>" . $cluster['desc1'] . "</p>";
            echo "<p>" . $cluster['desc2'] . "</p>";
        }
        
        ?>
                                    <button class="btn btn-primary btn-xl" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Cluster Sulawesi popup-->
        <div class="portfolio-modal modal fade" id="clustersulawesi" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-9">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2>Cluster Sulawesi</h2>
                                    <img src='img/sulawesi.png' width='100%'>
                                    <!--<p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>-->
        <?php
        
        foreach ($clusterSulawesi as $cluster) {
            echo "<h3>" . $cluster['cluster'] . "</h3>";
            echo "<p>" . $cluster['desc1'] . "</p>";
            echo "<p>" . $cluster['desc2'] . "</p>";
        }
        
        ?>
                                    <button class="btn btn-primary btn-xl" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Cluster Papua Maluku popup-->
        <div class="portfolio-modal modal fade" id="clusterpapuamaluku" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-9">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2>Cluster Papua/Maluku</h2>
                                    <img src='img/papuamaluku.png' width='100%'>
                                    <!--<p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>-->
        <?php
        
        foreach ($clusterPapuaMaluku as $cluster) {
            echo "<h3>" . $cluster['cluster'] . "</h3>";
            echo "<p>" . $cluster['desc1'] . "</p>";
            echo "<p>" . $cluster['desc2'] . "</p>";
        }
        
        ?>
                                    <button class="btn btn-primary btn-xl" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
