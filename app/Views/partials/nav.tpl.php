
<nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">DOMINIKA</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= $router->generate('main-home');?>">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Coaching Sportif
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?= $router->generate('coaching-definition');?>">Qu'est ce que le coaching sportif ?</a></li>
                                <li><a class="dropdown-item" href="<?= $router->generate('coaching-needed');?>">Quand faire appel a un coach ?</a></li>
                                <li><a class="dropdown-item" href="<?= $router->generate('coaching-session');?>">Comment se déroule une séance ?</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Posturologue
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Qu'est ce que la posturologie ?</a></li>
                                <li><a class="dropdown-item" href="#">Quand faire appel a un posturologue ?</a></li>
                                <li><a class="dropdown-item" href="#">Comment se déroule une séance ?</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= $router->generate('main-contact');?>">Contactez-moi</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>