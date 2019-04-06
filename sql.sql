CREATE VIEW Tuteur_enseigne_ecue
    AS SELECT
        filiere.id AS filiere_id, filiere.nom_filiere,
        ecue.id AS ecue_id, ecue.nom_ecue, ecue.ue_id,
        tuteur.id AS tuteur_id,
        user.id AS user_id, user.nom, user.prenoms, user.sexe, user.date_naissance, user.lieu_naissance, user.username, user.email, user.telephone, user.avatar
    FROM Filiere filiere, Ecue ecue, Tuteur tuteur, User user
    WHERE filiere.id = ecue.filiere_id AND ecue.tuteur_id = tuteur.id AND tuteur.user_id = user.id;
