const express = require('express');
const path = require('path');
const app = express();
const port = 3000;

// Middleware pour capturer le texte brut
app.use((req, res, next) => {
    let rawBody = '';
    req.on('data', chunk => {
        rawBody += chunk.toString(); // Convertit le buffer en chaîne de caractères
    });
    req.on('end', () => {
        req.rawBody = rawBody;
        next();
    });
});

app.use(express.json());

let receivedData = {}; // Variable pour stocker les données reçues

// Route pour servir le fichier HTML
app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, 'index.html'));
});

// Route pour recevoir les données POST
app.post('/submit', (req, res) => {
    console.log('POST request received (raw body):', req.rawBody); // Affiche le texte brut dans le terminal

    // Extraction des valeurs des headers
    const mailCustomer = req.headers['mail'];
    const customerName = req.headers['customername'];
    const salesRep = req.headers['salesrep'];
    const Model = req.headers['model'];
    const Elevation = req.headers['elevation'];


    // Affichage des valeurs pour vérification
    console.log('Mail:', mailCustomer);
    console.log('Customer Name:', customerName);
    console.log('Sales Rep:', salesRep);
    console.log('Model:', Model);
    console.log('Elevation:', Elevation);

    // Stockage des données reçues dans un objet
    receivedData = {
        mailCustomer,
        customerName,
        salesRep,
        model: Model,
        elevation: Elevation
    };

    res.send('POST request received');
});

// Route pour envoyer les données JSON au client
app.get('/api/data', (req, res) => {
    res.json(receivedData);
});

app.listen(port, () => {
    console.log(`Server running on http://localhost:${port}`);
});
