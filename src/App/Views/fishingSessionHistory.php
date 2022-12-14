<?php foreach ($fishingSessions as $fishingSession): ?>
    <tr>
        <td data-label="Zone de pêche"><?= htmlentities($fishingSession['fishing_zone']) ?></td>
        <td data-label="Date de la session"><?= htmlentities($fishingSession['created_at']) ?></td>
        <td data-label="Score de session"><?= htmlentities($fishingSession['session_ranking']) ?></td>
        <td data-label="Humidité"><?= htmlentities($fishingSession['humidity']) ?></td>
        <td data-label="Couverture nuageuse"><?= htmlentities($fishingSession['cloud']) ?></td>
        <td data-label="Température"><?= htmlentities($fishingSession['temperature']) ?></td>
        <td data-label="Vitesse du vent"><?= htmlentities($fishingSession['wind_speed']) ?></td>
        <td data-label="Pression atmosphérique"><?= htmlentities($fishingSession['pressure']) ?></td>
        <td data-label="Commentaires"><?= htmlentities($fishingSession['session_content']) ?></td>
    </tr>
<?php endforeach ?>