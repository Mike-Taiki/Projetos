var db = require('./models/user');
var mongoose = require('mongoose');
var bcrypt = require('bcrypt-nodejs');

module.exports = function(app, passport) {

    // =====================================
    // LOGIN ===============================
    // =====================================
    // show the login form
    app.get('/', function(req, res) {

        // render the page and pass in any flash data if it exists
        res.render('index.ejs', { message: req.flash('loginMessage') });
    });

	// process the login form
    app.post('/autenticar', passport.authenticate('local-login', {
        successRedirect : '/usuarios', // redirect to the secure profile section
        failureRedirect : '/', // redirect back to the signup page if there is an error
        failureFlash : true // allow flash messages
    }));

    // process the login form
    // app.post('/login', do all our passport stuff here);

    // =====================================
    // SIGNUP ==============================
    // =====================================
    // show the signup form
    app.get('/cadastro', function(req, res) {

        // render the page and pass in any flash data if it exists
        res.render('cadastro.ejs', { message: req.flash('signupMessage') });
    });

	// process the signup form
    app.post('/cadastro', passport.authenticate('local-signup', {
        successRedirect : '/usuarios', // redirect to the secure profile section
        failureRedirect : '/cadastro', // redirect back to the signup page if there is an error
        failureFlash : true // allow flash messages
    }));

    // process the signup form
    // app.post('/signup', do all our passport stuff here);

    // =====================================
    // PROFILE SECTION =====================
    // =====================================
    // we will want this protected so you have to be logged in to visit
    // we will use route middleware to verify this (the isLoggedIn function)
    app.get('/usuarios', isLoggedIn, function(req, res) {
      var Users = mongoose.model('usercollections', db.UserSchema, 'usercollections');
        Users.find({}).lean().exec(
        function (err, results) {
            res.render('usuarios', {user: req.user, "userlist": results});
    })
});
    // =====================================
    // EDITAR SENHA(get) ========================
    // =====================================
    app.get('/editar', function(req, res) {
      res.render('editar', {validacao: {}, dadosForm: {}})
    })

    // =====================================
    // EDITAR SENHA(post) ========================
    // =====================================
      app.post('/alterar', function(req, res){

        var dadosForm = req.body;
        var email = dadosForm.email;
        var password = dadosForm.password;

        var Users = mongoose.model('usercollections', db.UserSchema, 'usercollections')

        var senha_criptografada = userSchema.methods.generateHash = function(password) {
            return bcrypt.hashSync(password, bcrypt.genSaltSync(8), null);
        };

        Users.updateOne({email: {$eq: email}}, {$set: {password: senha_criptografada}},
            function (err) {
                if (err) {
                    console.log('Erro ao tentar salvar os dados: ' + err);
                } else {
                    res.send('Senha alterada com sucesso!');
                }
            });

      })




    // =====================================
    // LOGOUT ==============================
    // =====================================
    app.get('/logout', function(req, res) {
        req.logout();
        res.redirect('/');
    });
};

// route middleware to make sure a user is logged in
function isLoggedIn(req, res, next) {

    // if user is authenticated in the session, carry on
    if (req.isAuthenticated())
        return next();

    // if they aren't redirect them to the home page
    res.redirect('/');
}
