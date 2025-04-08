const express = require('express');
const app = express();
const mysql = require('mysql2');

app.get('/', (req, res) => {
  res.send('Hello World!');
});

app.listen(8080);