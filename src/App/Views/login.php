<section>
<form action="<?= url('/connect') ?>" class="subscribe" method="POST">
    <h2>Connectez-vous</h2>
    <fieldset>
        <?php viewError('loginError')?>
        <div>
            <label for="email"></label>
            <input required type="text" name="email" id="email" placeholder="Email" class="<?php if(isset($_SESSION['error']['loginError'])):?>invalid-field <?php endif; ?>"/>
        </div>
        <div>
            <label for="password"></label>
            <input required type="password" name="password" id="password" placeholder="Mot de passe" class="<?php if(isset($_SESSION['error']['loginError'])):?>invalid-field <?php endif; ?>"/>
        </div>
        <button class="btn" type="submit"> Se connecter</button>
        <div class="flex-row">
            <p>Pas encore inscrit ?</p>
            <a href="<?= url('/register') ?>">S'inscrire</a>
        </div>
    </fieldset>
</form>
</section>