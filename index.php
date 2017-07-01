<?php
session_start();

require 'libs/db.php';

$replays = $db->prepare('SELECT * FROM replays WHERE visibility = ? ORDER BY id DESC');
$replays->execute(array("public"));

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>osu!replay - Explore</title>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="/assets/css/materialize.min.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="/assets/css/style.css"  media="screen,projection"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>

        <?php require 'templates/header.php'; ?>
        <nav>
            <div class="nav-wrapper grey darken-3">
              <form action="index.php" method="GET">
                <div class="input-field">
                  <input id="search" type="search" placeholder="Search isn't available for the moment." required>
                  <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                  <i class="material-icons">close</i>
                </div>
              </form>
            </div>
        </nav>

        <main>

            <div class="row">

              <div class="col s12 center">
                <ul class="pagination">
                  <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                  <li class="waves-effect active"><a href="#!">1</a></li>
                  <li class="waves-effect"><a href="#!">2</a></li>
                  <li class="waves-effect"><a href="#!">3</a></li>
                  <li class="waves-effect"><a href="#!">4</a></li>
                  <li class="waves-effect"><a href="#!">5</a></li>
                  <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                </ul>
              </div>

              <div class="col m10 offset-m1">

                  <?php while($replay = $replays->fetch()) { ?>
                      <div class="col s12 m6 l4">
                        <div class="card grey lighten-3">
                            <div class="card-image">
                              <div class="dl_count"><span><?=$replay['dl_count']?></span><i class="material-icons">file_download</i></div>
                              <img src="https://assets.ppy.sh//beatmaps/<?=$replay["beatmapset_id"]?>/covers/card.jpg">
                              <span class="card-title truncate"><?=$replay["title"]?><br/><?=$replay["artist"]?> by <?=$replay["creator"]?></span>
                              <a href="libs/download.php?id=<?=$replay['id']?>" class="btn-floating halfway-fab waves-effect waves-light deep-purple accent-2"><i class="material-icons">play_for_work</i></a>
                            </div>
                            <div class="card-content center-align">
                              <p>
                                Played by <?=$replay["player"]?> (#<?=$replay['player_rank']?>)
                                <br/>
                                On [<?=$replay["version"]?>] (<?=$replay["difficultyrating"]?>*)
                                <br/>
                              </p>
                            </div>
                          </div>
                      </div>
                  <?php } ?>

                </div>

            </div>

        </main>

        <?php require 'templates/footer.php'; ?>
    </body>
</html>
