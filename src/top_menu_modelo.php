<header>
    <div class="row">
        <nav class="top-bar" data-topbar role="navigation">
            <ul class="title-area">
                <li class="name">
                    <a href="index.php" class="logo">
                        <h1>paloma<span class="tld"> .com</span></h1>
                    </a>
                </li>
                <span class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></span>
            </ul>
           
            <section class="top-bar-section" id="mean_nav">
                <ul class="right">
                    <li class="has-dropdown">
                        <a href="#">Cursos</a>
                        <ul class="dropdown">
                            <li><a href="cursos.php" id="curso">Ingles</a></li>
                        </ul>
                    </li>
                    <li><a href="login.php">Login</a></li>
                    <?php if(isset($_SESSION['email'])) { ?>
                    <li class="has-dropdown">
                        <a><?=$_SESSION['nome'];?></a>
                        <ul class="dropdown">
                            <li><a href="perfil.php" id="curso">Meu Perfil</a></li>
                            <li><a href="#" data-reveal-id="senha" >Mudar Senha</a></li>
                            <li><a href="#" data-reveal-id="desconectar">Desconectar</a></li>
                            <div id="desconectar" class="reveal-modal small" data-reveal aria-labelledby="modalTitle">
                                <h2 id="modalTitle">Desconectar</h2>
                                <p class="lead">Tem certeza?</p>
                                <form method="post" action="Script/desconectar.php">
                                    <input type="submit" value="Confirmar" class="button small index" />
                                </form>
                                <a class="close-reveal-modal" aria-label="Close">&#215;</a>
                            </div>
                            <div id="senha" class="reveal-modal" data-reveal aria-labelledby="modalTitle">
                                <h2 id="modalTitle">Modificar Senha</h2>
                                <form method="post" action="Script/modificar_senha.php">
                                    <input type="hidden" name="email" value=<?=$_SESSION['email'];?>>
                                    
                                    <label>Senha antiga</label>
                                    <input type="password" name="senha_antiga" maxlength="50" />

                                    <label>Nova senha</label>
                                    <input type="password" name="nova_senha" maxlength="50" />

                                    <label>Confirmar senha</label>
                                    <input type="password" name="confirmar_senha" maxlength="50" />

                                    <input type="submit" class="button small index"value="Modificar" />
                                </form>
                                <a class="close-reveal-modal" aria-label="Close">&#215;</a>
                            </div>
                        </ul>
                    </li>
                    <?php } ?>
                </ul>
            </section>
        </nav>
    </div>
</header>