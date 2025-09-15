PDF Viewer avec Pop-up de Bienvenue 📄
Ce projet est un simple visualiseur de PDF pour le web qui affiche d'abord une pop-up de bienvenue pendant quelques secondes avant de rendre un document PDF sur la page. Il est conçu pour offrir une expérience utilisateur fluide en intégrant le contenu directement sur la page sans forcer de téléchargement.

Fonctionnalités ✨
Pop-up de bienvenue : Une fenêtre modale (modal) s'affiche au chargement de la page pour un message d'introduction.

Délai d'affichage : La pop-up se ferme automatiquement après 3,5 secondes pour laisser place au document.

Visualiseur de PDF intégré : Le document est rendu directement sur la page à l'aide de la bibliothèque PDF.js, assurant une compatibilité maximale sur la plupart des navigateurs modernes.

Structure HTML/CSS/JS : Le projet est une page HTML simple avec du CSS pour le style et du JavaScript pour la logique d'affichage et le rendu du PDF.

Comment ça marche ? ⚙️
Le projet utilise une approche en deux temps :

Phase d'accueil : Au chargement de la page (window.onload), une pop-up (élément #myModal) est affichée.

Phase de rendu : Un timer est lancé (setTimeout). Une fois le délai écoulé, la pop-up est masquée, et le conteneur du PDF (#pdf-container) devient visible. Une fonction JavaScript (renderPdf()) est alors appelée pour charger et dessiner chaque page du PDF sur un élément <canvas>.

Cette méthode évite les problèmes de téléchargement automatique et les erreurs de redirection, qui sont courants lorsque l'on tente de forcer l'ouverture de fichiers PDF dans le navigateur.

Configuration 🔧
Pour utiliser ce projet, vous n'avez besoin que d'un serveur web qui peut servir des fichiers HTML, CSS et PDF.

Fichiers du projet :

index.html : Contient le code HTML, CSS et JavaScript.

mdm.jpg : L'image utilisée dans la pop-up.

documents/pv_de_controle.pdf : Le document PDF à afficher. Assurez-vous que le chemin (documents/pv_de_controle.pdf) est correct dans le code JavaScript.

Mise à jour de l'URL du PDF :
Modifiez la variable pdfUrl dans la balise <script> pour qu'elle pointe vers l'emplacement de votre fichier PDF.

JavaScript

const pdfUrl = 'https://thiersy.github.io/minesmada.github.io/documents/pv_de_controle.pdf';
Si votre fichier PDF se trouve dans le même répertoire que votre index.html, vous pouvez utiliser un chemin relatif comme './mon-fichier.pdf'.

Technologies utilisées 🛠️
HTML : Structure de la page.

CSS : Mise en page et style des éléments.

JavaScript : Logique de temporisation et de rendu.

PDF.js : La bibliothèque JavaScript de Mozilla pour le rendu des PDF.
