<?php foreach ($files as $file) : ?>
    
                    <!-- CARD -->
                <div class="card">
                    <div class="card-content">
                        <div class="media">
                            <div class="media-left">
                                <figure class="image is-48x48">
                                    <img alt="Placeholder image" class="is-rounded" src="https://i.ibb.co/mh5BcHn/test-png.png">
                                    </img>
                                </figure>
                            </div>
                            <div class="media-content">
                                <a class="title is-5" href="<?= base_url('user/'.$file['username']); ?>">
                                    <?= $file['name'] ?>
                                </a>
                                <br>
                                    <p class="subtitle is-size-7" href="">
                                        @<?= $file['username'] ?>
                                    </p>
                            </div>
                        </div>
                        
                        <div class="card-image">
                            <figure class="image is-16by9">
                                <a href="<?= $file['thumbnail'] ?>"><img alt="<?= $file['title'] ?>" src="<?= $file['thumbnail'] ?>"></img></a>
                            </figure>
                        </div>
                        <div class="content">
                            <p class="title is-6">
                                <?= $file['title'] ?>
                            </p>
                            <span class="icon-text">
                                <span class="icon">
                                    <i class="fas fa-solid fa-eye"></i>
                                </span>
                                <span>
                                    <?= $file['views'] ?>
                                </span>
                                <span class="icon">
                                    <i class="fas fa-clock"></i>
                                </span>
                                <span>
                                    <?= gmdate('H:i:s',$file['length']) ?>
                                </span>
                                <span class="icon">
                                    <i class="fas fa-upload"></i>
                                </span>
                                <span>
                                    <?php 
                                        $getDate = explode(' ', $file['uploaded']);
                                        // echo $getDate[0];
                                        echo date('d M Y',strtotime($getDate[0]));

                                    ?>
                                </span>
                            </span>
                        </div>                        
                            <footer class="card-footer ">
                                <a class="button is-info card-footer-item" href="<?= base_url('f/'.$file['code']) ?>">
                                    Tonton
                                </a>
                            </footer>
                    </div>
                </div>
                <!-- CARD END -->
<?php endforeach; ?>