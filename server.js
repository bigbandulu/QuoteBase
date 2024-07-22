const express = require('express');
const path = require('path');
const axios = require('axios');
const app = express();
const port = 3000;

app.use(express.json());

// Servir les fichiers statiques de la racine
app.use(express.static(path.join(__dirname)));

let receivedData = {}; // Variable pour stocker les données reçues

// Route pour servir le fichier HTML
app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, 'index.html'));
});

// Route pour recevoir les données POST
app.post('/submit', (req, res) => {
    console.log('POST request received (raw body):', req.rawBody);

    const mailCustomer = req.headers['mail'];
    const customerName = req.headers['customername'];
    const salesRep = req.headers['salesrep'];
    const model = req.headers['model'];
    const elevation = req.headers['elevation'];

    console.log('Mail:', mailCustomer);
    console.log('Customer Name:', customerName);
    console.log('Sales Rep:', salesRep);
    console.log('Model:', model);
    console.log('Elevation:', elevation);

    receivedData = {
        mailCustomer,
        customerName,
        salesRep,
        model,
        elevation
    };

    // Envoyer les données au script PHP pour générer le fichier HTML
    axios.post('http://localhost/quotr/generate_quote.php', receivedData, {
        responseType: 'text' // Pour gérer le téléchargement du fichier HTML
    })
    .then(response => {
        // Définir les headers pour forcer le téléchargement du fichier HTML
        res.setHeader('Content-Disposition', 'attachment; filename=QUOTATION.html');
        res.setHeader('Content-Type', 'text/html');
        res.send(response.data);
    })
    .catch(error => {
        console.error('Error generating quote:', error);
        res.status(500).send('Error generating quote');
    });
});

// Route pour envoyer les données JSON au client
app.get('/api/data', (req, res) => {
    res.json(receivedData);
});

app.listen(port, () => {
    console.log(`Server running on http://localhost:${port}`);
});
