<?php
use tackit\core\Project;
use tackit\core\Security;

include_once("inc/navdefiner.inc.php");
require_once(__DIR__ . "/vendor/autoload.php");

Security::checkLoggedIn();

$date = date('Y-m-d');

if (isset($_SESSION["user"])) {
    $projects = Project::getAllProjects();
    $mainProject = Project::getFirstProject();
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once("inc/header.inc.php"); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>TackIt</title>
</head>
<body>
<?php include_once("inc/topnav.inc.php"); ?>

<section id="navSection" class="d-inline-block">
    <?php include_once("inc/nav.inc.php"); ?>

</section>

<?php if($userType == 1): ?>
    <section id="contentSection" class="d-inline-block">
    <div class="banner" 
         style="background: url('https://res.cloudinary.com/dgypufy9k/image/upload/v1652982240/Tackit_Assets/image_1_3_au2xq7.png'); 
                background-repeat: no-repeat;
                background-size: cover;">
        <div class="pannel">
            <div class="pannel-ProjectTitle">
                <h2>Project - <?php echo $mainProject['name'];?></h2>
            </div>
            <div class="pannelContent">
                <section class="pannelInfo">
                <ul>
                    <li>
                        <div><img src="https://res.cloudinary.com/dgypufy9k/image/upload/v1655116851/Tackit_Assets/clock_zxsijm.svg" alt=""></div>
                        <div><p>45 u.</p></div>
                        <div><p>Tijd Resterend</p></div>
                    </li>
                    <li>
                        <div><img src="https://res.cloudinary.com/dgypufy9k/image/upload/v1655116835/Tackit_Assets/approve_file_rsrjoz.svg" alt="i"></div>
                        <div><p>68%</p></div>
                        <div><p>voltooide Projecten</p></div> 
                    </li>
                </ul>
                </section>
                <section class="pannelButtons">
                <ul>
                    <li>
                        <div><img src="https://res.cloudinary.com/dgypufy9k/image/upload/v1654539711/Tackit_Assets/data_siyjhb.png" alt="i"></div>
                        <div><p>Data</p></div>
                    </li>
                    <li>
                        <div><img src="https://res.cloudinary.com/dgypufy9k/image/upload/v1654539706/Tackit_Assets/Setting_fkdj6a.png" alt="i"></div>
                        <div><p><a href="project-settings.php?projectId=<?php echo $mainProject['id'];?>" style="text-decoration: none; color: black;">Settings</a></p></div>
                    </li>
                </ul>
                </section>
            </div>    
        </div>
    </div>

    <div class="mainDContent">
        <section id="dNewProject" class="d-inline-block"
                style="background: url('https://res.cloudinary.com/dgypufy9k/image/upload/v1652982240/Tackit_Assets/image_1_3_au2xq7.png'); 
                background-repeat: no-repeat;
                background-size: cover;">
            <div class=dProjectButton>
                <a href="new-project.php"><img src="https://res.cloudinary.com/dgypufy9k/image/upload/v1654539681/Tackit_Assets/add_folder_mlujzj.png" alt="">
                <p class="blue">Start</p><p>een nieuw project</p></a>
            </div>
        </section>
        <section id="dAllProjects" class="d-inline-block" 
         style="background: url('https://res.cloudinary.com/dgypufy9k/image/upload/v1652982240/Tackit_Assets/image_1_3_au2xq7.png'); 
                background-repeat: no-repeat;
                background-size: cover;">
            <div class=dProjectButton>
            <a href="projecten.php"><img src="https://res.cloudinary.com/dgypufy9k/image/upload/v1654539688/Tackit_Assets/landscape_document_j9qbib.png" alt="">
            <p class="green">Alle</p><p>projecten</p></a>
            </div>
        </section>
        <section id="dStats" class="d-inline-block">
            <div>
                <img src="https://res.cloudinary.com/dgypufy9k/image/upload/v1655041731/Tackit_Assets/users_ih5zu8.svg" alt="">
                <p>Totaal Projecten</p>
                <p>36</p>
                <img src="https://res.cloudinary.com/dgypufy9k/image/upload/v1655041728/Tackit_Assets/approve_image_r9i6ep.svg" alt="">
                <p>Totaal Voltooide Cocreatie Projecten</p>
                <p>589</p>
                <p>Details</p>
            </div>
        </section>

    </div>

    </section>
<?php endif; ?>
<?php if($userType == 0): ?>
    <section id="contentSection" class="d-inline-block">
        <div class="banner" 
            style="background: url('https://res.cloudinary.com/dgypufy9k/image/upload/v1652982240/Tackit_Assets/image_1_3_au2xq7.png'); 
                    background-repeat: no-repeat;
                    background-size: cover;">
            <div class="pannel">
                <div class="pannel-ProjectTitle">
                    <h2><?php echo $mainProject['name'];?></h2>
                </div>
                <div class="pannelContent">
                    <section class="pannelInfo">
                    <ul>
                        <li>
                            <div><img src="https://res.cloudinary.com/dgypufy9k/image/upload/v1654702302/Tackit_Assets/clock_fkiepp.png" alt="i"></div>
                            <div><p>45 u.</p></div>
                            <p>Tijd Resterend</p>
                        </li>
                        <li>
                            <div><img src="https://res.cloudinary.com/dgypufy9k/image/upload/v1654694895/Tackit_Assets/image_reload_xw5b7d.png" alt="i"></div>
                            <div><p>68%</p></div>
                            <p>Voltooid</p> 
                        </li>
                    </ul>
                    </section>
                    <section class="pannelButtons">
                    <ul>
                        <li>
                            <div><a href="project-info.php?projectId=<?php echo $mainProject['id']?>" style="text-decoration: none; color: #3647FC; font-family:'Nunito', sans-serif; font-weight: 600;"><p>i</p></a></div>
                            <p><a href="project-info.php?projectId=<?php echo $mainProject['id']?>" style="text-decoration: none; color: black;">Info</a></p>
                        </li>
                        <li>
                            <div><a href="projectMapper.php?projectId=<?php echo $mainProject['id']?>"><img src="https://res.cloudinary.com/dgypufy9k/image/upload/v1654694880/Tackit_Assets/Vector_v82hfd.png" alt="i"></a></div>
                            <a href="projectMapper.php?projectId=<?php echo $mainProject['id']?>"><p>Hervatten</p></a>
                        </li>
                    </ul>
                    </section>
                </div>    
            </div>
        </div>

        <div class="mainBContent">
                <div class="bStats">
                    <img src="https://res.cloudinary.com/dgypufy9k/image/upload/v1655041731/Tackit_Assets/users_ih5zu8.svg" alt="H">
                    <p>Totaal Projecten</p>
                    <p>8</p>
                    <img src="https://res.cloudinary.com/dgypufy9k/image/upload/v1655041728/Tackit_Assets/approve_image_r9i6ep.svg" alt="H">
                    <p>Totaal Voltooide Projecten</p>
                    <p>6</p>
                    <p>Details</p>
                </div>
                <div class="BprojectListings">
                    <?php foreach($projects as $project): ?>
                    <?php if ($project['start_date_cocreatie'] <= $date) : ?>
                    <div class="BprojectListing">
                            <div class="projectListing-banner" style="background: url('https://res.cloudinary.com/dgypufy9k/image/upload/v1652982240/Tackit_Assets/image_1_3_au2xq7.png');">
                            </div>
                            <div class="projectListing-title">
                                <ul>
                                    <li><?php echo $project['name']?></li>
                                    <?php if($project['start_date_voting'] <= $date) : ?>
                                        <li>Fase 3: voting</li>
                                    <?php elseif ($project['start_date_cocreatie'] <= $date) : ?>
                                        <li>Fase 2: cocreatie</li>
                                    <?php endif; ?>
                                   
                                </ul>
                            </div>
                            <div class="projectListing-info">
                                <ul>
                                    <li>
                                        <img src="https://res.cloudinary.com/dgypufy9k/image/upload/v1654609817/Tackit_Assets/clock_s1d6jn.png" alt="I">
                                        <p>49 u.</p>
                                        <p>Tijd resterend</p>
                                    </li>
                                    <li>
                                        <p>Type</p>
                                        <p><?php echo $project['Type']?></p>
                                    </li>
                                </ul>
                            </div>
                            <div class="projectListing-button">
                                <?php if($project['start_date_voting'] <= $date) : ?>
                                <a href="projectVoting.php?projectId=<?php echo $project['id']?>"><img src="https://res.cloudinary.com/dgypufy9k/image/upload/v1655042201/Tackit_Assets/Approve_Tick_roz1hp.svg" alt="button"></a>
                                <?php elseif ($project['start_date_cocreatie'] <= $date) : ?>
                                <a href="projectMapper.php?projectId=<?php echo $project['id']?>"><img src="https://res.cloudinary.com/dgypufy9k/image/upload/v1654694716/Tackit_Assets/start_npchap.png" alt="button"></a>
                                <?php endif; ?>
                            </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>    
                </div>    
        </div>

     </section>
<?php endif ?>
</div>
<script src="js/main.js"></script>
</body>
</html>