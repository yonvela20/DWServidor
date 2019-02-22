var express = require('express');
var router = express.Router();
var db= require('../db');
var checkAuth= require('../checkAuth');
 
/* GET devuelve actividades planficadas. */
router.get('/', function(req, res, next) {
  db.query('select * from ac_planificaciones',function(error,result,fields){
    if(error!==null)
      res.send(error);
    else
      res.json(result)
  });
 
});

//Prueba
router.get('/perfil', checkAuth, function(req, res, next) {
    console.log("El usuario que ha accedido tiene el código "+req.user.id),
    
    function(error,result,fields){
        if(error!==null || !result.length)
            res.send(error);
        else
            res.json(result[0])
        }
});

/* GET devuelve una actividad */
router.get('/:id', function(req, res, next) {
    db.query('select * from ac_planificaciones where id='+db.escape(req.params.id),
    function(error,result,fields){
      if(error!==null || !result.length)
        res.send(error);
      else
        res.json(result[0])
    });
});


/* router.get('/', function(req, res, next) {
    db.query('select * from clases',
    function(error,result,fields){
      if(error!==null || !result.length)
        res.send(error);
      else
      res.render('clases', {clases:result})
        res.json(result[0])
    });
});
 
module.exports = router;
*/