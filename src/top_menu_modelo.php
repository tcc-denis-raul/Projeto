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
                    <!-- Menu para listar todos os cursos-->
                    <li class="has-dropdown">
                        <a href="#">Cursos</a>
                        <ul class="dropdown">
                            <li><a href="cursos.php" id="curso">Ingles</a></li>
                        </ul>
                    </li>

                    <?php if(isset($_SESSION['email'])) { ?>
                    <li class="has-dropdown">
                        <a href="#">Meus cursos</a>
                        <ul class="dropdown">
                            <li><a href="caracteristicas.php">Monte seu perfil</a></li>
                            <li><a href="custom_curses.php">cursos</a></li>
                            <li><a href="avaliar.php">avaliar cursos</a></li>
                        </ul>
                    </li>                    
                    <?php } ?>

                    <!-- Se não estiver logado: login; se tiver logado: mostra as outras opções-->
                    <?php if(!isset($_SESSION['email'])) { ?>
                        <li><a href="#" data-reveal-id="login">Login</a></li>
                        <!-- Pop-up para o botão de login -->
                        <div id="login" class="reveal-modal tiny" data-reveal aria-labelledby="modalTitle">
                            <h2 id="modalTitle">Entrar com email e senha</h2>
                            <form method="post" action="Script/valida.php">
                                <div class="row column log-in-form">
                                    <label>Email</label>
                                    <input type="text" name="email" placeholder="exemplo@exemplo.com">
                                
                                    <label>Senha</label>
                                    <input type="password" name="senha" placeholder="Senha">
                                
                                    <input type="submit" value="Entrar" class="button expand index"/>
                                    
                                    <p class="text-center"><a href="#" data-reveal-id="cadastrar">Não tem uma senha? Cadastre agora</a></p>
                                </div>
                            </form>
                            <a class="close-reveal-modal" aria-label="Close">&#215;</a>
                        </div>

                        <!-- Pop-up para o botão de cadastrar -->
                        <div id="cadastrar" class="reveal-modal tiny" data-reveal aria-labelledby="modalTitle">
                            <h2 id="modalTitle">Cadastrar email e senha</h2>
                            <form method="post" action="Script/cadastrar.php">
                                <div class="row column log-in-form">
                                    <label>Nome</label>
                                    <input type="text" name="nome" maxlength="50" placeholder="João"/>
                        
                                    <label>Email</label>
                                    <input type="text" name="email" maxlength="50" placeholder="exemplo@exemplo.com"/>

                                    <label>Senha</label>
                                    <input type="password" name="senha" maxlength="50" placeholder="Senha"/>

                                    <input type="submit" value="Cadastrar" class="button expand index" />
                                
                                </div>
                            </form>
                            <a class="close-reveal-modal" aria-label="Close">&#215;</a>
                        </div>

                    <?php } ?>
                    <?php if(isset($_SESSION['email'])) { ?>
                    <li class="has-dropdown">
                        <a><?=$_SESSION['nome'];?></a>
                        <ul class="dropdown">
                            <li><a href="perfil.php" id="curso">Meu Perfil</a></li>
                            <li><a href="#" data-reveal-id="senha" >Mudar Senha</a></li>
                            <li><a href="#" data-reveal-id="desconectar">Desconectar</a></li>
                            <!-- Pop-up para o botão desconectar -->
                            <div id="desconectar" class="reveal-modal small" data-reveal aria-labelledby="modalTitle">
                                <h2 id="modalTitle">Desconectar</h2>
                                <p class="lead">Tem certeza?</p>
                                <form method="post" action="Script/desconectar.php">
                                    <input type="submit" value="Confirmar" class="button small index" />
                                </form>
                                <a class="close-reveal-modal" aria-label="Close">&#215;</a>
                            </div>
                            <!-- Pop-up para o botão de modificar senha -->
                            <div id="senha" class="reveal-modal small" data-reveal aria-labelledby="modalTitle">
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