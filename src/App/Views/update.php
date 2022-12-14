<section>
    <form class="subscribe" method="POST">
        <h2>Modifier le profil :</h2>

        <fieldset>
            <div>
                <label for="user-lastname">Nom :</label>
                <input required value="<?= $user['lastname'] ?>" type="text" name="user-lastname" id="user-lastname"
                       placeholder="Nom"
                       class="<?php if (isset($_SESSION['error']['user-lastname'])): ?>invalid-field <?php endif; ?>"/>
                <?php viewError('user-lastname') ?>
            </div>

            <div>
                <label for="user-firstname">Prenom :</label>
                <input required value="<?= $user['firstname'] ?>" type="text" name="user-firstname" id="user-firstname"
                       placeholder="Prénom"
                       class="<?php if (isset($_SESSION['error']['user-firstname'])): ?>invalid-field <?php endif; ?>"/>
                <?php viewError('user-firstname') ?>
            </div>
            <div>
                <label for="user-pseudo">Pseudo :</label>
                <input required value="<?= $user['pseudo'] ?>" type="text" name="user-pseudo" id="user-pseudo"
                       placeholder="Pseudonyme"
                       class="<?php if (isset($_SESSION['error']['user-pseudo'])): ?>invalid-field <?php endif; ?>"/>
                <?php viewError('user-pseudo') ?>
            </div>

            <div>
                <label for="email">Email :</label>
                <input required type="text" value="<?= $user['email'] ?>" name="email" id="email" placeholder="Email"
                       class="<?php if (isset($_SESSION['error']['email'])): ?>invalid-field <?php endif; ?>"/>
                <?php viewError('email') ?>
            </div>
            <?php if ($_SESSION['user_role'] === 'admin'): ?>
                <div>
                    <label for="role">Role :</label>
                    <select name="role" id="role" value="2">
                        <option value="1" <?php if ($user['role'] === 'admin'): ?>selected<?php endif; ?>>
                            Admin
                        </option>
                        <option value="2" <?php if ($user['role'] === 'member'): ?>selected<?php endif; ?>>
                            Member
                        </option>
                    </select>
                </div>
            <?php endif; ?>
            <?php if ($_SESSION['user_role'] === 'member'): ?>
                <div>
                    <a href="<?= url('/delete') ?>" class="btn-delete">Supprimer le compte</a>
                </div>
            <?php endif; ?>
            <button class="btn" type="submit" name="update"> Modifier</button>
        </fieldset>
    </form>
</section>