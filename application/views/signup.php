                <!-- FORM UPLOAD -->
                <form action="<?= base_url('auth/signup'); ?>" method="POST">
                    <div class="field">
                         <label class="label">Name</label>
                        <p class="control has-icons-left has-icons-right">
                            <input class="input <?= form_error('name') ? 'is-danger': null; ?>" placeholder="Name" value="<?= set_value('name'); ?>" type="text" name="name">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-user">
                                    </i>
                                </span>
                            </input>
                        </p>
                        <p class="help is-danger"><?= form_error('name'); ?></p>
                    </div>
                    <div class="field">
                         <label class="label">Username</label>
                        <p class="control has-icons-left has-icons-right">
                            <input class="input <?= form_error('username') ? 'is-danger': null; ?>" placeholder="Username" type="text" value="<?= set_value('username'); ?>" name="username">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-user">
                                    </i>
                                </span>
                            </input>
                        </p>
                        <p class="help is-danger"><?= form_error('username'); ?></p>
                    </div>
                    <div class="field">
                         <label class="label">Email</label>
                        <p class="control has-icons-left has-icons-right">
                            <input class="input <?= form_error('email') ? 'is-danger': null; ?>" placeholder="Email" type="email" value="<?= set_value('email'); ?>" name="email">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-envelope">
                                    </i>
                                </span>
                            </input>
                        </p>
                        <p class="help is-danger"><?= form_error('email'); ?></p>
                    </div>
                    <div class="field">
                         <label class="label">Password</label>
                        <p class="control has-icons-left">
                            <input class="input <?= form_error('password1') ? 'is-danger': null; ?>" placeholder="Password" type="password" value="<?= set_value(''); ?>" name="password1">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-lock">
                                    </i>
                                </span>
                            </input>
                        </p>
                        <p class="help is-danger"><?= form_error('password1'); ?></p>
                    </div>
                    <div class="field">
                         <label class="label">Repeat password</label>
                        <p class="control has-icons-left">
                            <input class="input <?= form_error('password2') ? 'is-danger': null; ?>" placeholder="Repeat password" type="password" value="<?= set_value(''); ?>" name="password2">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-lock">
                                    </i>
                                </span>
                            </input>
                        </p>
                        <p class="help is-danger"><?= form_error('password2'); ?></p>
                    </div>
                    <div class="field is-grouped is-grouped-centered">
                        <p class="control">
                            <input class="button is-success" type="submit" value="Login">
                            </input>
                        </p>
                    </div>
                </form>
                <!-- FORM UPLOAD END -->
