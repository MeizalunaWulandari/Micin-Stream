<?php
    foreach ($user as $user) {

    }
    
    if ($this->uri->segment(3) == null && $this->uri->segment(1) == 'user') {
        $class_video = 'is-active';
        $class_folder = '';
    } else {
        $class_folder = 'is-active';
        $class_video = '';
    }

?>
    <!-- PROFILE -->
    <style type="text/css">
    .profile-picture{
        border: 4px solid <?='#' . css_2(3) . css_1(3);?>;
        padding: 2px;
        border-top-color: <?='#' . css_1(6)?>;
        border-left-color: <?='#' . css_2(6)?>;
        border-right-color: <?='#' . css_1(3) . css_2(3);?>;
    }
    </style>
                    <div class="card">
                        <figure class="image container is-256x256">
                            <img alt="Placeholder image" class="profile-picture is-rounded" src="https://i.ibb.co/mh5BcHn/test-png.png">
                            </img>
                        </figure>
                        <div class="has-text-centered">
                            <p class="title has-text-weight-normal">
                                <?=$user['name']?>
                            </p>
                            <p class="subtitle has-text-weight-light">
                                @<?=$user['username']?>
                            </p>
                            <br>
                            </br>
                        </div>
                        <div class="tabs is-toggle is-centered is-fullwidth">
                          <ul>
                            <li class="<?= $class_video ?>">
                              <a href="<?=base_url('user/' . $user['username']);?>">
                                <span class="icon is-small"><i class="fas fa-video" aria-hidden="true"></i></span>
                                <span>Videos (<?=$videos_count?>)</span>
                              </a>
                            </li>

                            <li class="<?= $class_folder ?>">
                              <a href="<?=base_url('user/' . $user['username'] . '/c');?>">
                                <span class="icon is-small"><i class="fas fa-folder" aria-hidden="true"></i></span>
                                <span>Collection ( <?=$folders_count?> )</span>
                              </a>
                            </li>
                          </ul>
                        </div>
                        <div class="columns is-multiline is-mobile has-text-centered">
                            <!-- section1 -->
                            <?php if ($this->uri->segment(3) == 'c'): ?>
                                <?php foreach ($folders as $folder): ?>
                                <div class="column is-3-tablet is-6-mobile">
                                <span class="icon is-large">
                                    <a href="<?= base_url('user/'.$this->uri->segment(2).'/c/'.$folder['slug']) ?>"><i class="fas fa-folder"></i></a>
                                </span>
                                <p class="is-size-6">
                                   <a href="<?= base_url('user/'.$this->uri->segment(2).'/c/'.$folder['slug']) ?>"><?=$folder['folder_name']?></a>
                                </p>
                            </div>
                            <?php endforeach?>
                            <?php endif ?>

                            <?php if ($this->uri->segment(3) == null): ?>
                                <?php foreach ($videos as $video): ?>
                                <div class="column is-3-tablet is-6-mobile">
                                <figure class="image is-16by9">
                                    <a href="<?=$video['link']?>"><img alt="<?=$video['title']?>" src="<?=$video['thumbnail']?>">
                                    </img></a>
                                </figure>
                                <p class="is-size-6">
                                   <a href="<?=$video['link']?>"><?=$video['title']?></a>
                                </p>
                            </div>
                            <?php endforeach?>
                            <?php endif ?>

                        </div>
                    </div>
                    <!-- END BOX -->