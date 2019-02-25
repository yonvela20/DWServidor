var express = require('express');
var router = express.Router();
var db = require('../db');
var checkAuth = require("../checkAuth");

/* GET devuelve las clases (2) */
router.get('/', checkAuth, function (req, res, next) {

  db.query('select clases.id, fecha, clases.hora1, clases.hora2, salas.nombre as nombre_sala, grupos.nombre as nombre_grupo ' +
    'FROM clases INNER JOIN grupos ON grupos.id = clases.grupos_id INNER JOIN salas ON salas.id = clases.salas_id  ' +
    'INNER JOIN asistentes ON asistentes.clases_id = clases.id WHERE asistentes.usuarios_id = ? ORDER BY id asc', [req.user['id']],
    function (error, resul, fields) {
      if (error != null || !resul.length) {
        res.send(error);
      }
      else {
        res.json(resul);
      }

    });

});

/* GET devuelve una clase en base a una id (3) */
router.get('/:id', checkAuth, function (req, res, next) {
  db.query('select clases.id, fecha, clases.hora1, clases.hora2, salas.nombre as nombre_sala, grupos.nombre as nombre_grupo ' +
    'FROM clases INNER JOIN grupos ON grupos.id = clases.grupos_id INNER JOIN salas ON salas.id = clases.salas_id ' +
    'where clases.id=?', [req.params.id],
    function (error, resul, fields) {
      if (error != null || !resul.length) {
        res.send(error);
      } else {
        res.json(resul);
      }
    });
});

/* PUT actualiza la asistencia de un alumno en base a su id (4) */
router.put('/:id', checkAuth, function (req, res, next) {
  var clases_id = req.params.id;
  var usuarios_id = req.user['id'];
  var atender = req.body.confirmado;

  db.query('UPDATE asistentes SET confirmado = ? WHERE usuarios_id = ? AND clases_id = ?', [atender, usuarios_id, clases_id],
    (error, resul, fields) => {
      if (error != null || !resul.length) {
        res.json(error);
      } else {
        res.json(resul);
      }
    });
});

module.exports = router;
