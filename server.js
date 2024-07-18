const express = require('express');
const path = require('path');
const app = express();
const port = 3000;

app.use(express.json());

let receivedData = {}; // Variable pour stocker les données reçues

// Route pour servir le fichier HTML
app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, 'index.html'));
});

// Route pour recevoir les données POST
app.post('/submit', (req, res) => {
    receivedData = req.body; // Stocke les données reçues
    console.log('POST request received:', receivedData);
    res.send('POST request received');
});

// Route pour envoyer les données JSON au client
app.get('/api/data', (req, res) => {
    res.json(receivedData);
});

app.listen(port, () => {
    console.log(`Server running on http://localhost:${port}`);
});
