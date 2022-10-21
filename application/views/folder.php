                <!-- GALLERY -->
                <div class="columns is-multiline is-mobile has-text-centered">
                    <?php foreach ($files as $file): ?>
                        <!-- section1 -->
                    <div class="column is-3-tablet is-6-mobile">
                        <figure class="image is-16by9">
                                <a href="<?= base_url('f/'.$file['code']); ?>"><img alt="<?= $file['title'] ?>" src="<?= $file['thumbnail'] ?>">
                                </img></a>
                            </figure>
                        <p class="is-size-6">
                            <a href="<?= base_url('f/'.$file['code']); ?>"><?= $file['title'] ?></a>
                        </p>
                    </div>
                    <?php endforeach ?>
                </div>
                <!-- GALLERY END -->
