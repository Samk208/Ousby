# Guide de l'éditeur — Site officiel Ansoumane Fofana

> Document à l'attention des contributeurs et éditeurs du site.
> Dernière mise à jour : septembre 2026.

---

## 1. Accès au tableau de bord

- **URL** : `https://votre-domaine.org/wp-admin/`
- **Connexion** : utilisez vos identifiants personnels (ne partagez jamais votre mot de passe)
- **2FA obligatoire** : l'authentification à deux facteurs est activée via Wordfence. Configurez-la dès votre première connexion.

---

## 2. Rôles et permissions

| Rôle | Peut faire | Ne peut pas faire |
|------|-----------|-------------------|
| **Contributeur** | Rédiger des articles et événements, ajouter des images, sauvegarder en brouillon | Publier, modifier les pages, gérer les extensions |
| **Éditeur** | Publier, modifier tout contenu, gérer les catégories, les médias | Gérer les extensions, le thème, les utilisateurs |
| **Administrateur** | Tout gérer | — |

---

## 3. Publier un article (Actualité)

1. Menu **Articles → Ajouter**
2. Saisissez le **titre** et le **contenu** dans l'éditeur de blocs
3. Dans le panneau latéral droit :
   - **Catégorie** : choisissez parmi Actualités, Communiqués, Mandat > Interventions/Votes/Questions écrites/Terrain
   - **Image mise en avant** : ajoutez une photo (obligatoire pour l'affichage)
   - **Extrait** : résumé court (1-2 phrases) pour la liste des actualités
4. **Aperçu** avant publication pour vérifier la mise en page
5. Cliquez **Publier**

### Règles de contenu

- **Ne jamais inventer de faits** : si une information n'est pas confirmée, utilisez le marqueur `[À COMPLÉTER PAR LE CABINET]`
- Les statistiques électorales vérifiées sont : 70 738 voix, 1 député, 27 conseillers communaux, 33+ préfectures, engagement depuis 2010
- Toute autre statistique doit être confirmée avant publication

---

## 4. Créer un événement (Agenda)

1. Menu **Agenda → Ajouter**
2. Saisissez le **titre** de l'événement
3. Remplissez les **champs ACF** sous l'éditeur :
   - **Date de début** : format jj/mm/aaaa
   - **Heure** : format HH:MM
   - **Lieu** : ville + lieu précis (ex : "Conakry, Centre culturel")
   - **Statut** : À venir / Terminé / Reporté
4. Ajoutez un **extrait** (description courte) et le **contenu** détaillé
5. Ajoutez une **image mise en avant** si disponible
6. Publiez

### Affichage automatique

- Les événements **À venir** apparaissent en premier (triés par date croissante)
- Les événements **Terminés** sont dans l'onglet Archives
- Le schéma `Event` est automatiquement généré pour le référencement (JSON-LD)

---

## 5. Gérer les pages

Les pages suivantes sont pré-construites et ne nécessitent pas de modifications fréquentes :

| Page | Contenu | Qui peut modifier |
|------|---------|-------------------|
| Accueil | Hero, stats, valeurs, CTA | Éditeur uniquement |
| Parcours | Biographie, chronologie, convictions | Éditeur |
| Vision | Axes stratégiques, programme PDF | Éditeur |
| Mandat | Stats du mandat, activités | Éditeur |
| Galerie | Photos, vidéos | Éditeur |
| Espace Presse | Biographie, portraits, communiqués | Éditeur |
| Contact | Formulaire, coordonnées | Administrateur |
| Mentions légales | Texte juridique | Administrateur |

Pour modifier une page : **Pages → Toutes les pages → Modifier**

### Marqueurs de contenu

Les sections marquées `[À COMPLÉTER PAR LE CABINET]` doivent être remplies avec des informations vérifiées avant la mise en ligne.

---

## 6. Gérer les images

1. Menu **Médias → Ajouter**
2. Formats acceptés : JPEG, WebP (préféré), PNG
3. **Taille maximale** : 300 Mo (les images sont automatiquement optimisées)
4. Ajoutez toujours un **texte alternatif** (description pour l'accessibilité)
5. Nommez les fichiers de manière descriptive : `fofana-visite-labe-2026.webp`

---

## 7. Formulaire de contact

Le formulaire est géré par **Fluent Forms** :

- Menu **Fluent Forms → Formulaires**
- Les soumissions sont stockées dans **Fluent Forms → Entrées**
- Le captcha **Turnstile** est activé automatiquement
- Pour modifier les champs : éditez le formulaire et glissez-déposez les blocs

---

## 8. SEO (Rank Math)

Chaque article et page dispose d'un panneau **Rank Math** en bas de l'éditeur :

- **Mot-clé cible** : le sujet principal de l'article
- **Titre SEO** : affiché dans Google (max 60 caractères)
- **Meta description** : résumé affiché sous le titre (max 155 caractères)
- **Image sociale** : image partagée sur les réseaux sociaux

### Conseils SEO

- Utilisez des titres descriptifs avec le nom complet "Ansoumane Fofana"
- Chaque article doit avoir une catégorie pertinente
- Ajoutez des liens internes vers les pages Parcours, Vision, Mandat

---

## 9. Sécurité

- **Ne jamais** désactiver Wordfence
- **Ne jamais** installer d'extensions non approuvées
- Vérifiez que l'authentification à 2 facteurs est active pour tous les comptes
- Signalez toute activité suspecte à l'administrateur

---

## 10. WhatsApp

- Le bouton flottant WhatsApp est visible sur toutes les pages
- Numéro configuré : `+224 627 249 666` (à confirmer avec le client)
- Un lien de partage WhatsApp apparaît automatiquement sous chaque article et événement
- Le lien direct : `https://wa.me/224627249666`

---

## Questions fréquentes

**Comment ajouter une nouvelle catégorie ?**
Menu Articles → Catégories. Créez la catégorie principale ou une sous-catégorie (ex : Mandat > Terrain).

**Comment modifier le menu de navigation ?**
Menu Apparence → Menus → "Menu Principal". Ajoutez/supprimez des éléments et sauvegardez.

**Comment changer l'image de la page d'accueil ?**
L'image du hero est l'image mise en avant de la page Accueil. Modifiez-la via Pages → Accueil → Image mise en avant.

**Comment exporter le site ?**
Utilisez l'outil d'export WordPress (Outils → Exporter) pour obtenir un fichier XML de sauvegarde.
