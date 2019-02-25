var express = require('express');
var router = express.Router();
var db = require('../db');
var checkAuth = require("../checkAuth");

/* GET home page. */
router.get('/', function (req, res, next) {
  res.render('index', { title: 'Express' });
});

/* POST recibe usuario y contraseña y devuelve token (1) */
router.post('/', checkAuth, function (req, res, next) {

  db.query('SELECT token FROM usuarios WHERE nombre = ? AND password = ?', [req.user['nombre'], req.user['password']],
    function (error, resul, fields) {
      if (error != null || !resul.length) {
        res.send(error);
      }
      else {
        res.json(resul);
      }
      res.send(resul);
    });
});


module.exports = router;
