<section>
    <h2>Liste des membres</h2>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Lastname</th>
            <th>Firstname</th>
            <th>Pseudo</th>
            <th>email</th>
            <th>role</th>
            <th>Modify user</th>
            <th>Delete user</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td data-label="ID"><?= htmlentities($user['id']) ?></td>
                <td data-label="Lastname"><?= htmlentities($user['lastname']) ?></td>
                <td data-label="Firstname"><?= htmlentities($user['firstname']) ?></td>
                <td data-label="Pseudo"><?= htmlentities($user['pseudo']) ?></td>
                <td data-label="email"><?= htmlentities($user['email']) ?></td>
                <td data-label="role"><?= htmlentities($user['role']) ?></td>
                <td data-label="Modify user"><a href="<?= url('/update') ?>?id=<?= htmlentities($user['id']) ?>"
                                                class="btn flex-column">Modify</a></td>
                <td data-label="Delete user"><a href="<?= url('/delete') ?>?id=<?= htmlentities($user['id']) ?>"
                                                class="btn-delete flex-column">Delete</a></td>
            </tr>
        <?php endforeach ?>
        </tbody>
        <tfoot>
        </tfoot>
    </table>
</section>