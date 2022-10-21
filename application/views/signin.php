<!-- FORM UPLOAD  -->
<?php if ($this->session->flashdata('logout')): ?>
            <article class="message is-success">
                 <div class="message-body">
                    <?= $this->session->flashdata('logout'); ?>
                  </div>
            </article>
<?php endif ?>

                <form action="<?= base_url('auth/do_signin'); ?>" method="POST">
                    <div class="field">
                      <label class="label">Username</label>
                        <p class="control has-icons-left has-icons-right">
                            <input class="input" name="username" placeholder="Username" type="username">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-user">
                                    </i>
                                </span>
                            </input>
                        </p>
                        <!-- <p class="help is-danger">This email is invalid</p> -->
                    </div>
                    <div class="field">
                      <label class="label">Password</label>
                        <p class="control has-icons-left">
                            <input class="input" name="password" placeholder="Password" type="password">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-lock">
                                    </i>
                                </span>
                            </input>
                        </p>
                    </div>
                    <div class="field is-grouped is-grouped-centered">
                        <p class="control">
                            <input class="button is-success" name="submit" type="submit" value="Login">
                            </input>
                        </p>
                    </div>
                </form>
                <!-- FORM UPLOAD END