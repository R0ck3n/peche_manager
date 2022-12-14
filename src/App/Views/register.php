<section>
    <form action="<?= url('/subscribe') ?>" class="subscribe" method="POST">
        <h2>Formulaire d'inscription</h2>
        <hr/>
        <fieldset>
            <div>
                <label for="user-lastname"></label>
                <input required type="text" name="user-lastname" id="user-lastname" placeholder="Nom"
                       class="<?php if (isset($_SESSION['error']['user-lastname'])): ?>invalid-field <?php endif; ?>"/>
                <?php viewError('user-lastname') ?>
            </div>

            <div>
                <label for="user-firstname"></label>
                <input required type="text" name="user-firstname" id="user-firstname" placeholder="Prénom"
                       class="<?php if (isset($_SESSION['error']['user-firstname'])): ?>invalid-field <?php endif; ?>"/>
                <?php viewError('user-firstname') ?>
            </div>

            <div>
                <label for="user-pseudo"></label>
                <input required type="text" name="user-pseudo" id="user-pseudo" placeholder="Pseudonyme"
                       class="<?php if (isset($_SESSION['error']['user-pseudo'])): ?>invalid-field <?php endif; ?>"/>
                <?php viewError('user-pseudo') ?>
            </div>

            <div>
                <label for="email"></label>
                <input required type="text" name="email" id="email" placeholder="Email"
                       class="<?php if (isset($_SESSION['error']['email'])): ?>invalid-field <?php endif; ?>"/>
                <?php viewError('email') ?>
            </div>
            <div>
                <label for="password"></label>
                <input required type="password" name="password" id="password" placeholder="Mot de passe"
                       class="<?php if (isset($_SESSION['error']['password'])): ?>invalid-field <?php endif; ?>"/>
                <?php viewError('password') ?>
            </div>

            <div>
                <label for="password2"></label>
                <input required type="password" name="password2" id="password2" placeholder="Confirmez le mot de passe"
                       class="<?php if (isset($_SESSION['error']['password'])): ?>invalid-field <?php endif; ?>"/>
                <?php viewError('password2') ?>
            </div>
            <button class="btn" type="submit" name="subscribe"> S'inscrire</button>
        </fieldset>
    </form>
</section>