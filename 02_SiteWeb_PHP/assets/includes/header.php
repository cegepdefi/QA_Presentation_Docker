<!-- https://github.com/cegepdefi -->

<?php
$urlMain = $_COOKIE['url'];
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="menu">
    <a id="btn_logo" class="navbar-brand" href="https://github.com/cegepdefi">
        <img id="imgLogo" src="https://avatars.githubusercontent.com/u/93592584?v=4" width="30" height="30" class="d-inline-block align-top">
        @Cegepdefi
    </a>
    <button id="btn_menuToggle" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div id="div_menu" class="collapse navbar-collapse" id="navbarText">
        <ul id="ul_menu" class="navbar-nav mr-auto">
            <li id="li_btn_Home" class="nav-item active">
                <a id="btn_Home" class="nav-link" href="<?php echo $urlMain; ?>">Home</a>
            </li>
        </ul>
        <span class="navbar-text">
            https://github.com/cegepdefi
        </span>
    </div>
</nav>