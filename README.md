# Co-transcript
Plateforme de conversion collaborative de contenus scannés vers du texte (transcription).

L'outil à été conçu dans l'optique de permettre à une communauté de participer à la transcription de texte manuscrit pour les rendre accessible numériquement, indexable et facilement lisible.

## Fonctionnalité (sous forme de scénario d'utilisation) :

- [ ] **Mise en ligne d'image brute**<br> _En tant que_ administrateur, _je peux_ ajouter des documents (scan) à la plateforme _afin que_ les utilisateurs puisse les transcrire.
- [ ] **Réservation d'un document**<br> _En tant que_ utilisateur, _je peux_ réserver un document à transcrire _afin que_ personne d'autre ne face le même travail pour rien
- [ ] **Mise en ligne de transcription**<br> _En tant que_ utilisateur, _je peux_ remettre ma trasncription, associé au document d'origine _afin que_ la transcription soit validée
- [ ] **Réservation pour relecture**<br> _En tant que_ utilisateur, _je peux_ réserver un document transcrit à relire  _afin que_ les autres utilisateurs soient informé que cette transcription est en cours de relecture.
- [ ] **Mise en ligne de relecture**<br> _En tant que_ utilisateur, _je peux_ remettre ma relecture de transcription d'un document _afin que_ la transcription soit validée
- [ ] **Visualisation des diff**<br> _En tant que_ utilisateur, _je peux_ consulter l'historique de modificaiton d'un document _afin que_ je puisse me rendre compte des changement effectué dessus.
- [ ] **Validation qualité**<br> _En tant que_ administrateur, _je peux_ valider comme terminé un document en consultant son historique de relecture _afin que_ ce document soit retiré de ceux restant à traité et ajouté à ceux terminé.

[ ] (#exemple de userStorie : - [ ] **Titre**<br> _En tant que_ qui _je peux_ quoi _afin que_ pourquoi)

## Installation docker

## Installation classique

### Pour Windows
- Télécharger et installer [ XAMPP ] (https://www.apachefriends.org/download.html) pour Windows. 
- Télécharger et installer [Git] (https://git-scm.com/download/win) pour Windows
- Ouvrir **Git Bash** et taper :
```bash
cd /c/xampp/htdocs/
git clone https://github.com/1twitif/co-transcript.git
```
- Dans le dossier d'installation de **XAMPP**,ouvrir **XAMPP control Panel**
- Démarrer **Apache** et **MySQL** en appuyant sur start
- Co-transcript est maintenant disponible à l'adresse [http://localhost/co-transcript/](http://localhost/co-transcript/)

## Tester

Une fois l'installation effectuée, accéder à la page des [tests](http://localhost/co-transcript/test.php) pour les exécuter.