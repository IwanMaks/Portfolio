<?php
$connection = new PDO('mysql:host=localhost; dbname=practise_db; charset=utf8', 'root', 'Relationship7109');

$aboutData = $connection->query("SELECT * FROM about");
$aboutData = $aboutData->fetch();
$educationData = $connection->query("SELECT * FROM education");
$languagesData = $connection->query("SELECT * FROM language");
$interestsData = $connection->query("SELECT * FROM interests");
$careerData = $connection->query("SELECT * FROM career");
$aboutMeData = $connection->query("SELECT * FROM aboutme");
$skillsListData = $connection->query("SELECT * FROM skills");
$projectListData = $connection->query("SELECT * FROM projectlist");

?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title>Responsive Resume/CV Template for Developers</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive HTML5 Resume/CV Template for Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico">  
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,400italic,300italic,300,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- Global CSS -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">   
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.css">
    
    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/styles-5.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head> 

<body>
    <div class="wrapper">
        <div class="sidebar-wrapper">
            <div class="profile-container">
                <img class="profile" src="assets/images/profile.png" alt="" width="100px"/>
                <h1 class="name"><?= $aboutData['name']?></h1>
                <h3 class="tagline"><?= $aboutData['post']?></h3>
            </div><!--//profile-container-->
            
            <div class="contact-container container-block">
                <ul class="list-unstyled contact-list">
                    <li class="email"><i class="fa fa-envelope"></i><a href="mailto: <?= $aboutData['email']?>"><?= $aboutData['email']?></a></li>
                    <li class="phone"><i class="fa fa-phone"></i><a href="tel:<?= $aboutData['phone']?>"><?= $aboutData['phone']?></a></li>
                    <li class="website"><i class="fa fa-globe"></i><a href="<?= $aboutData['name']?>" target="_blank"><?= $aboutData['site']?></a></li>
                    <li class="github"><i class="fa fa-github"></i><a href="#" target="_blank">github.com/username</a></li>
                </ul>
            </div><!--//contact-container-->
            <div class="education-container container-block">
                <h2 class="container-block-title">Education</h2>
                <? foreach ($educationData as $education): ?>
                <div class="item">
                    <h4 class="degree"><?= $education['faculty'] ?></h4>
                    <h5 class="meta"><?= $education['university'] ?></h5>
                    <div class="time"><?= $education['yearStart'] ?> - <?= $education['yearEnd'] ?></div>
                </div><!--//item-->
                <? endforeach; ?>
            </div><!--//education-container-->
            
            <div class="languages-container container-block">
                <h2 class="container-block-title">Languages</h2>
                <ul class="list-unstyled interests-list">
                    <? foreach ($languagesData as $lang): ?>
                    <li><?= $lang['tittle']?> <span class="lang-desc"><?= $lang['level']?></span></li>
                    <? endforeach; ?>
                </ul>
            </div><!--//interests-->
            
            <div class="interests-container container-block">
                <h2 class="container-block-title">Interests</h2>
                <ul class="list-unstyled interests-list">
                    <? foreach ($interestsData as $int): ?>
                    <li><?= $int['tittle']?></li>
                    <? endforeach; ?>
                </ul>
            </div><!--//interests-->
            
        </div><!--//sidebar-wrapper-->
        
        <div class="main-wrapper">
            
            <section class="section summary-section">
                <h2 class="section-title"><i class="fa fa-user"></i>Обо мне</h2>
                <div class="summary">
                    <?foreach ($aboutMeData as $item) { ?>
                    <p><?=$item['text']?></p>
                    <? } ?>
                </div><!--//summary-->
            </section><!--//section-->
            
            <section class="section experiences-section">
                <h2 class="section-title"><i class="fa fa-briefcase"></i>Опыт работы</h2>
                <?foreach ($careerData as $item) { ?>
                    <p><?=$item['text']?></p>
                <? } ?>
<!--                <div class="item">-->
<!--                    <div class="meta">-->
<!--                        <div class="upper-row">-->
<!--                            <h3 class="job-title">Lead Developer</h3>-->
<!--                            <div class="time">2015 - Present</div>-->
<!--                        </div>
                        <div class="company">Startup Hubs, San Francisco</div>-->
<!--                    </div>
                    <div class="details">-->
<!--                        <p>Describe your role here lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo.</p>  -->
<!--                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </p>-->
<!--                    </div>-->
<!--                </div>-->
                
            </section><!--//section-->
            
            <section class="section projects-section">
                <h2 class="section-title"><i class="fa fa-archive"></i>Примеры работ</h2>
                <div class="intro">
                    <p>Большинство проектов написаны с помощью открытых исходников и ссылки ведут на репозиторий в GitHub. Те проекты, которые можно было выложить на GitHubPage или Heroku, будут представлены ссылки на них в конце описания проекта</p>
                </div><!--//intro-->
                <?foreach ($projectListData as $item) { ?>
                <div class="item">
                    <span class="project-title"><a target="_blank" href="<?=$item['linkGitHub']?>"><?=$item['name']?></a></span> -
                    <span class="project-tagline"><?=$item['about']?> <?= $item['linkGitHubPage'] ? "(GitHubPage / Heroku: <span class='project-title'><a target='_blank' href='{$item['linkGitHubPage']}'>{$item['name']}-Page</a></span>)" : '' ?></span>
                </div><!--//item-->
                <? } ?>
            </section><!--//section-->
            
            <section class="skills-section section">
                <h2 class="section-title"><i class="fa fa-rocket"></i>Skills &amp; Proficiency</h2>
                <div class="skillset">
                    <? foreach ($skillsListData as $skill): ?>
                    <div class="item">
                        <h3 class="level-title"><?= $skill['tittle']?></h3>
                        <div class="level-bar">
                            <div class="level-bar-inner" data-level="<?= $skill['percent']?>">
                            </div>                                      
                        </div><!--//level-bar-->                                 
                    </div><!--//item-->
                    <? endforeach; ?>
                </div>  
            </section><!--//skills-section-->
            <form action="" method="POST">
                <input type="text" name="comment" required>
                <input type="submit">
            </form>

            <?
                if ($_POST['comment']) {
                    $newComment = $_POST['comment'];
                    $connection->query("INSERT INTO comments (comment) VALUE ('$newComment')");
                }
                $allComments = $connection->query("SELECT * FROM comments ");

                if ($allComments) {
                    foreach ($allComments as $comment) {
                        echo "<div>" . $comment['comment'] . "</div>";
                    }
                }  else {
                    echo "<div>Здесь пока нет никаких комментариев :(</div>";
                }
            ?>

        </div><!--//main-body-->
    </div>
 
    <footer class="footer">
        <div class="text-center">
                <!--/* This template is released under the Creative Commons Attribution 3.0 License. Please keep the attribution link below when using for your own project. Thank you for your support. :) If you'd like to use the template without the attribution, you can check out other license options via our website: themes.3rdwavemedia.com */-->
                <small class="copyright">Designed with <i class="fa fa-heart"></i> by <a href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>
        </div><!--//container-->
    </footer><!--//footer-->
 
    <!-- Javascript -->          
    <script type="text/javascript" src="assets/plugins/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>    
    <!-- custom js -->
    <script type="text/javascript" src="assets/js/main.js"></script>            
</body>
</html> 

