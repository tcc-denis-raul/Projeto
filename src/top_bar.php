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
                            <li><a href="courses.php" id="course">Ingles</a></li>
                        </ul>
                    </li>

                    <?php if(isset($_SESSION['email'])) { ?>
                    <li class="has-dropdown">
                        <a href="#">Meus cursos</a>
                        <ul class="dropdown">
                            <li><a href="profile_courses.php">Monte seu perfil</a></li>
                            <li><a href="selected_courses.php">Cursos</a></li>
                            <li><a href="feedback.php">Avaliar cursos</a></li>
                        </ul>
                    </li>                    
                    <?php } ?>

                    <!-- Se não estiver logado: login; se tiver logado: mostra as outras opções-->
                    <?php if(!isset($_SESSION['email'])) { ?>
                        <li><a href="#" data-reveal-id="login">Login</a></li>
                        <!-- Pop-up para o botão de login -->
                        <div id="login" class="reveal-modal tiny" data-reveal aria-labelledby="modalTitle">
                            <h2 id="modalTitle">Entrar com email e senha</h2>
                            <form method="post" action="Script/login.php">
                                <div class="row column log-in-form">
                                    <label>Email</label>
                                    <input type="text" name="email" placeholder="examplo@exemplo.com">
                                
                                    <label>Senha</label>
                                    <input type="password" name="password" placeholder="Senha">
                                
                                    <input type="submit" value="Entrar" class="button expand index"/>
                                    
                                    <p class="text-center"><a href="#" data-reveal-id="signup">Não tem uma senha? Cadastre agora</a></p>
                                </div>
                            </form>
                            <a class="close-reveal-modal" aria-label="Close">&#215;</a>
                        </div>

                        <!-- Pop-up para o botão de cadastrar -->
                        <div id="signup" class="reveal-modal tiny" data-reveal aria-labelledby="modalTitle">
                            <h2 id="modalTitle">Cadastrar email e senha</h2>
                            <form method="post" action="Script/signup.php">
                                <div class="row column log-in-form">
                                    <label>Nome</label>
                                    <input type="text" name="name" maxlength="50" placeholder="João"/>
                        
                                    <label>Email</label>
                                    <input type="text" name="email" maxlength="50" placeholder="exemplo@exemplo.com"/>

                                    <label>Senha</label>
                                    <input type="password" name="password" maxlength="50" placeholder="Senha"/>

                                    <input type="submit" value="Cadastrar" class="button expand index" />
                                
                                </div>
                            </form>
                            <a class="close-reveal-modal" aria-label="Close">&#215;</a>
                        </div>

                    <?php } ?>
                    <?php if(isset($_SESSION['email'])) { ?>
                    <li class="has-dropdown">
                        <a><?=$_SESSION['name'];?></a>
                        <ul class="dropdown">
                            <li><a href="profile.php" id="course">Meu Perfil</a></li>
                            <li><a href="#" data-reveal-id="recommend_course">Indicar cursos</a></li>
                            <li><a href="#" data-reveal-id="password" >Mudar Senha</a></li>
                            <li><a href="#" data-reveal-id="logout">Desconectar</a></li>
                            <!-- Pop-up para o botão desconectar -->
                            <div id="logout" class="reveal-modal small" data-reveal aria-labelledby="modalTitle">
                                <h2 id="modalTitle">Desconectar</h2>
                                <p class="lead">Tem certeza?</p>
                                <form method="post" action="Script/logout.php">
                                    <input type="submit" value="Confirmar" class="button small index" />
                                </form>
                                <a class="close-reveal-modal" aria-label="Close">&#215;</a>
                            </div>
                            <!-- Pop-up para o botão de modificar senha -->
                            <div id="password" class="reveal-modal small" data-reveal aria-labelledby="modalTitle">
                                <h2 id="modalTitle">Modificar Senha</h2>
                                <form method="post" action="Script/change_password.php">
                                    <input type="hidden" name="email" value=<?=$_SESSION['email'];?>>
                                    
                                    <label>Senha antiga</label>
                                    <input type="password" name="old_password" maxlength="50" />

                                    <label>Nova senha</label>
                                    <input type="password" name="new_password" maxlength="50" />

                                    <label>Confirmar senha</label>
                                    <input type="password" name="check_password" maxlength="50" />

                                    <input type="submit" class="button small index"value="Modificar" />
                                </form>
                                <a class="close-reveal-modal" aria-label="Close">&#215;</a>
                            </div>
                            <!-- Pop-up para o botão indicar -->
                            <div id="recommend_course" class="reveal-modal small" data-reveal aria-labelledby="modalTitle">
                                <h2 id="modalTitle">Indicar cursos</h2>
                                <p class="lead">Não encontrou um curso aqui? Nos indique um curso</p>
                                <form method="post" action="Script/recommend_course.php">
                                    <label>Nome</label>
                                    <input type="text" name="name" maxlength="50" placeholder="Curso Online"/>
                                    <label>Endereço</label>
                                    <input type="text" name="address" maxlength="50" placeholder="http://cursoonlinepaloma.com.br" />
                                    <input type="submit" value="Indicar" class="button small index" />
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