require('dotenv').config()
const mongoose = require('mongoose');
const bcrypt = require('bcryptjs')
const jwt = require('jsonwebtoken')

const UserSchema = new mongoose.Schema({
    FullName: {
        type: String,
        required: true
    },
    ImgLink: {
        type: String,
    },
    Gender: {
        type: String,
        // required: true
    },
    Phone: {
        type: Number,
        // required: true,
        unique: true
    },
    Age: {
        type: Number,
        // required: true
    },
    About: {
        type: String,
    },
    Username: {
        type: String,
        required: true,
        unique: true
    },
    Email: {
        type: String,
        required: true,
        unique: true
    },
    Password: {
        type: String,
        required: true
    },
    ConfirmPassword: {
        type: String,
        required: true
    },
    Tokens: [{
        token: {
            type: String,
            required: true
        }
    }]

})


UserSchema.methods.generateAuthToken = async function () {
    try {
        const token = jwt.sign({_id: this._id}, process.env.SECRET_KEY);
        this.Tokens = this.Tokens.concat({token: token});
        // console.log('generate token ' + token)
        await this.save();
        return token;

    } catch (error) {
        console.log(error)
    }
}


UserSchema.pre('save', async function (next) {
    if(this.isModified('Password')){
    this.Password = await bcrypt.hash(this.Password, 10);
    this.ConfirmPassword = await bcrypt.hash(this.Password, 10);
    }
    next()
})

const User = new mongoose.model("userRegister", UserSchema);

module.exports = User;