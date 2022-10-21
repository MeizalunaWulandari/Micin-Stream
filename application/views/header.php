<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1" name="viewport">
                <title>
                    <?= $title ?>
                </title>
                <link href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css" rel="stylesheet">
                    <link crossorigin="anonymous" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css" integrity="sha512-3M00D/rn8n+2ZVXBO9Hib0GKNpkm8MSUU/e2VNthDyBYxKWG+BftNYYcuEjXlyrSO637tidzMBXfE7sQm0INUg==" referrerpolicy="no-referrer" rel="stylesheet"/>
    </head>
    <body>
        <!-- NAVBAR -->
        <nav aria-label="main navigation" class="navbar is-dark" role="navigation">
            <div class="container">
                <div class="navbar-brand">
                    <a class="navbar-item" href="<?= base_url() ?>">
                        <p>Micin Stream</p>
                    </a>
                    <a aria-expanded="false" aria-label="menu" class="navbar-burger" data-target="navbarBasicExample" role="button">
                        <span aria-hidden="true">
                        </span>
                        <span aria-hidden="true">
                        </span>
                        <span aria-hidden="true">
                        </span>
                    </a>
                </div>
                <div class="navbar-menu " id="navbarBasicExample">
                    <div class="navbar-start ">
                        <a class="navbar-item" href="<?= base_url() ?>">
                            Home
                        </a>
                        <a class="navbar-item" href="<?= base_url('/home/upload') ?>">
                            Upload
                        </a>
                        <a class="navbar-item" href="<?= base_url('/home/urlupload') ?>">
                            URL Upload 
                        </a>
                        <a class="navbar-item" href="<?= base_url('/home/search') ?>">
                            Search
                        </a>
                        <div class="navbar-end">
                            <div class="navbar-item">
                                <?php if (!$this->session->userdata('user_id')): ?>
                                    <div class="buttons">
                                    <a class="button is-primary" href="<?= base_url('auth/signup'); ?>">
                                        <strong>
                                            Sign up
                                        </strong>
                                    </a>
                                    <a class="button is-light" href="<?= base_url('auth/signin'); ?>">
                                        Log in
                                    </a>
                                </div>
                                <?php endif ?>
                                <!-- JIKA LOGIN -->
                                <?php if ($this->session->userdata('user_id')): ?>
                                    <div class="buttons">
                                        <a class="button is-primary" href="<?= base_url('user'); ?>">
                                        <strong>
                                            Profile
                                        </strong>
                                    </a>
                                    <a class="button is-danger" href="<?= base_url('auth/logout'); ?>">
                                        <strong>
                                            Logout
                                        </strong>
                                    </a>
                                </div>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- NAVBAR END -->
        <!-- SECTION OR CONTAINTER -->
        <section class="section">
            <div class="container">