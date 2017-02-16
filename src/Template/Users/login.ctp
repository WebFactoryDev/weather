<img src="/weather/img/hr.jpg" class="login-img wow fadeIn" alt="">


<div class="center-vertical">
    <div class="center-content row">

        <div class="col-md-3 center-margin">
            <?= $this->Flash->render('auth') ?>
            <form method="post" action="login">
                <div class="content-box wow bounceInDown modal-content">
                    <h3 class="content-box-header content-box-header-alt bg-default">
                        <span class="icon-separator">
                            <i class="glyph-icon icon-cog"></i>
                        </span>
                        <span class="header-wrapper">
                            SCIENTRIX
                            <small>Inicia sesión con tu cuenta.</small>
                        </span>
                        
                    </h3>
                    <div class="content-box-wrapper">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="username">
                                <span class="input-group-addon bg-blue">
                                    <i class="glyph-icon icon-envelope-o"></i>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                                <span class="input-group-addon bg-blue">
                                    <i class="glyph-icon icon-unlock-alt"></i>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <a href="" title="Recover password">Olvidé mi contraseña</a>
                        </div>
                        <button class="btn btn-success btn-block">Iniciar</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>



