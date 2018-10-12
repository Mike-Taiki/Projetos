// load the things we need
var mongoose = require('mongoose');
var bcrypt   = require('bcrypt-nodejs');

// define the schema for our user model
var userSchema = mongoose.Schema({
        email        : String,
        password     : String,
});

// methods ======================
// gerando um hash
userSchema.methods.generateHash = function(password) {
    return bcrypt.hashSync(password, bcrypt.genSaltSync(8), null);
};

// checando se a senha é válida
userSchema.methods.validPassword = function(password) {
    return bcrypt.compareSync(password, this.password);
};

// cria a model para usuários e expõe para nosso app
module.exports = mongoose.model('usercollections', userSchema);
