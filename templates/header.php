<header>
    <nav>
        <div class="nav-wrapper grey darken-4">
          <a href="../" class="brand-logo">osu!replay</a>
          <a href="#" data-activates="sidenav" class="button-collapse right"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down">
            <?php if($_SESSION['auth'] == 1): ?>
                <li><a href="/upload.php"><i class="material-icons">file_upload</i></a></li>
                <li><a href="/my-replays.php"><i class="material-icons">folder</i></a></li>
                <li><a href="/favorites.php"><i class="material-icons">favorite</i></a></li>
            <?php else: ?>
                <li><a href="/auth/signup.php">Sign up</a></li>
                <li><a class="btn waves-effect waves white black-text" href="/auth/login.php">Login</a></li>
            <?php endif; ?>
          </ul>
          <ul id="sidenav" class="side-nav">
            <li><div class="userView">
              <div class="background"></div>
              <?php if ($_SESSION['auth'] == 1): ?>
                <img class="circle" src="<?=$user['avatar_link']?>">
                <span class="white-text name">Welcome <?= $_SESSION['username'] ?></span>
                <span class="white-text email">
                    <?php if ($_SESSION['auth'] == 1): ?>
                        <?='You have '.$user['replays'].' replays !'?>
                    <?php endif; ?>
                </span>
              <?php else: ?>
                <img class="circle" src="../assets/css/account_circle.png">
                <span class="white-text name">Welcome !</span>
                <span class="white-text email">Please log in.</span>
              <?php endif; ?>
            </div></li>
            <?php if($_SESSION['auth'] == 1): ?>
                <li><a class="subheader">Community</a></li>
                <li><a class="waves-effect" href="/index.php"><i class="material-icons">search</i>Explore</a></li>
                <li><a class="waves-effect" href="/leaderboard.php"><i class="material-icons">view_agenda</i>Leaderboard</a></li>
                <li><a class="subheader">Member area</a></li>
                <li><a class="waves-effect" href="/upload.php"><i class="material-icons">file_upload</i>Upload</a></li>
                <li><a class="waves-effect" href="/my-replays.php"><i class="material-icons">folder</i>My replays</a></li>
                <li><a class="waves-effect" href="/favorites.php"><i class="material-icons">favorite</i>Favorites</a></li>
                <li><a class="waves-effect" href="/libs/logout.php?token=<?=$_SESSION['token']?>"><i class="material-icons">lock</i>Log out</a></li>
                <li><div class="divider"></div></li>
                <li><a class="subheader">Links</a></li>
                <li><a class="waves-effect" href="/index.php"><i class="material-icons">search</i>Explore</a></li>
                <li><a class="waves-effect" href="/about.php"><i class="material-icons">subject</i>About</a></li>
            <?php else: ?>
                <li><a class="subheader">Member area</a></li>
                <li><a class="waves-effect" href="/auth/login.php"><i class="material-icons">account_circle</i>Log in</a></li>
                <li><a class="waves-effect" href="/auth/signup.php"><i class="material-icons">add_circle</i>Sign up</a></li>
                <li><div class="divider"></div></li>
                <li><a class="subheader">Links</a></li>
                <li><a class="waves-effect" href="/about.php"><i class="material-icons">subject</i>About</a></li>
            <?php endif; ?>
          </ul>
        </div>
    </nav>

</header>
