<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/">Project</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <?php
        $urls = array(
            'Home' => '/',
            'Students' => '/students.php',
            'Courses' => '/courses.php',
            'Instructors' => '/instructors.php',
            'TAs' => '/teachingAssistants.php'
        );

        foreach ($urls as $name => $url) {
            print '<li '.(($currentPage === $name) ? ' class="nav-item active" ': '').
                '><a class="nav-link" href="'.$url.'">'.$name.'</a></li>';
        }
    ?>
    </ul>
  </div>
</nav>