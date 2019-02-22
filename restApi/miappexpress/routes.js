module.exports = function (app) {
    app.use('/', require('../miappexpress/routes/index'));
    app.use('/users',	require('../miappexpress/routes/users'));
    app.use('/actividad',	require('../miappexpress/routes/actividad'));
   
  };