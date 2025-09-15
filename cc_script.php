<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Viewer</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background-color: #808080;
        }

        /* Styles pour la pop-up */
        #myModal {
            display: flex; /* Utilisation de flexbox pour le centrage */
            justify-content: center;
            align-items: center;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            padding: 20px;
            border: 1px solid #888;
            border-radius: 1rem;
            max-width: 600px;
            text-align: center;
            opacity: 1; /* Initialement visible */
            transition: opacity 0.5s ease-in-out;
        }
        
        /* Styles pour le conteneur du PDF */
        #pdf-container {
            display: none; /* Initialement caché */
            width: 100vw;
            height: 100vh;
            overflow-y: auto;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #f0f0f0;
        }
        
        .pdf-canvas {
            width: 100%;
            height: auto;
            display: block;
            margin: 0 auto 20px;
        }
    </style>
</head>
<body>

    <div id="myModal">
        <div class="modal-content">
            <div class="text-center">
                <img src="mdm.jpg" alt="img" width="20%" height="20%">
            </div>
            <p>Bonjour!</p>
            <p>Ce Procès-Verbal de Contrôle est délivré par le Ministère des Mines.</p>
        </div>
    </div>
    
    <div id="pdf-container"></div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
    <script>
        window.onload = function() {
            setTimeout(closeModal, 3500);
        };

        function closeModal() {
            // Cacher la pop-up en douceur
            document.getElementById('myModal').style.opacity = '0';
            setTimeout(() => {
                document.getElementById('myModal').style.display = 'none';
                document.getElementById('pdf-container').style.display = 'block';
                renderPdf(); // Lancer le rendu du PDF après que la pop-up soit cachée
            }, 500); // Temps pour la transition d'opacité
        }

        function renderPdf() {
            const pdfUrl = 'http://minesmada.ddns.net/documents/pv_de_controle_2.pdf';
            const pdfjsLib = window['pdfjs-dist/build/pdf'];
            pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js';

            const loadingTask = pdfjsLib.getDocument(pdfUrl);
            loadingTask.promise.then(pdf => {
                for (let pageNum = 1; pageNum <= pdf.numPages; pageNum++) {
                    pdf.getPage(pageNum).then(page => {
                        const viewport = page.getViewport({ scale: 1.0 });

                        const canvas = document.createElement('canvas');
                        canvas.className = 'pdf-canvas';
                        document.getElementById('pdf-container').appendChild(canvas);

                        const context = canvas.getContext('2d');
                        canvas.height = viewport.height;
                        canvas.width = viewport.width;

                        page.render({
                            canvasContext: context,
                            viewport: viewport
                        });
                    });
                }
            }).catch(reason => {
                console.error('Error during PDF rendering:', reason);
            });
        }
    </script>
</body>
</html>
