var express = require('express');
var router = express.Router();
var db= require('../db');
 
/* GET devuelve actividades planficadas. */
router.get('/', function(req, res, next) {
  db.query('select * from clases',function(error,result,fields){
    if(error!==null)
      res.send(error);
    else{
        res.render('clases', {clases: result});
    }

  });
 
});

/* Devuelve una clase (Contiene el registro asistentes del alumno) */
router.get('/:id', function(req, res, next){
  db.query('select clases.id, fecha, clases.hora1, clases.hora2, salas.nombre as nombre_sala, grupos.nombre as nombre_grupo ' + 
  'FROM clases INNER JOIN grupos ON grupos.id = clases.grupos_id INNER JOIN salas ON salas.id = clases.salas_id ' +
  'where clases.id=?',[req.params.id]), function(error,resul,fields){
    if(error!==null)
    res.send(error);
  else{
      res.render('clases', {clases: result});
      //res.send(resul);
    }
  }
});
 
module.exports = router;