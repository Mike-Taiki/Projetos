var express  = require('express');
var app      = express();
var port     = process.env.PORT || 8080;
var mongoose = require('mongoose');
var passport = require('passport');
var flash    = require('connect-flash');
var expressValidator = require('express-validator')

var morgan       = require('morgan');
var cookieParser = require('cookie-parser');
var bodyParser   = require('body-parser');
var session      = require('express-session');

var configDB = require('./config/database.js');

// configuração ===============================================================
mongoose.connect(configDB.url, { useNewUrlParser: true}); // conecta ao banco de dados

require('./config/passport')(passport); // passa a configuração para o passport

// configura o express
app.use(morgan('dev')); // log toda requisição para o console
app.use(cookieParser()); // lê cookies (precisa para autenticar)
app.use(bodyParser.urlencoded({extended: true})); // pega informações dos forms html
app.use(bodyParser.json()); // retorna os dados das requisições em formato json

app.use(express.static('./app/public')); // configura arquivos estáticos

app.set('view engine', 'ejs'); // configura o template engine

// Necessário para passport
app.use(session({ secret: 'ilovescotchscotchyscotchscotch', resave: false, saveUninitialized: false })); // session secret
app.use(passport.initialize());
app.use(passport.session()); // para sessões de login
app.use(flash()); // use connect-flash for flash messages stored in session

// rotas ======================================================================
require('./app/routes.js')(app, passport); // Carrega as rotas e passa o app e passport totalmente configurados

app.use(expressValidator());

// Pega 404 e ecnaminha para o manipulador de erro
app.use(function(req, res, next) {
  var err = new Error('Página não encontrada');
  err.status = 404;
  next(err);
})

// error handlers

// development error handler
// will print stacktrace
if (app.get('env') === 'development') {
  app.use(function(err, req, res, next) {
    res.status(err.status || 500);
    res.render('error', { // renderiza a página error.ejs
      message: err.message,
      error: err
    });
  });
}

// production error handler
// no stacktraces leaked to user
app.use(function(err, req, res, next) {
  res.status(err.status || 500);
  res.render('error', {
    message: err.message,
    error: {}
  });
});

// Inicialização ======================================================================
app.listen(port);
console.log('Servidor executando na porta ' + port);

module.exports = app;
