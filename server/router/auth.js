const express = require('express')
const router = express.Router();
const bcrypt = require('bcryptjs')
const jwt = require('jsonwebtoken')
require('../db/conn')

router.get('/', (req, res) => {
    res.send('hellooooo')
})
const User = require('../model/userSchema');

router.post('/register', async (req, res) => {
    const { name, email, phone, work, password, cpassword } = req.body;
    
    if (!name || !email || !phone || !work || !password || !cpassword) {
        return res.status(422).json({ error: "Fill all the fields" })
    }
    
    try{
        const userExist = await User.findOne({ email: email });
        if(userExist){
            return res.status(422).json({ error: "Email already exist" })
        }else if(password !== cpassword){
            return res.status(422).json({ error: "Password doesn't matched" })
        }else{
            const user = new User({name, email, phone, work, password, cpassword});
            try {
                const userRegister = await user.save()
                res.status(201).json({ message: "user registered successfully" });
            } catch (error) {
                res.status(500).json({ error: 'failed to register' })
            }
        }
    }
    catch (error) {
        console.log(error)
    }
})

router.post('/signin', async (req, res) => {
    const {email,password } = req.body;
    
    if (!email || !password) {
        return res.status(422).json({ error: "Fill all the fields" })
    }

    try {
        const userLogin = await User.findOne({email: email})
        // console.log('user login' + userLogin)
        if(userLogin){
        const isMatch = await bcrypt.compare(password, userLogin.password)

        const token = await userLogin.generateAuthToken();
        // console.log('login token ' + token)

        res.cookie('jwtoken', token, {
            expires: new Date(Date.now() + 1000*60*10),
            httpOnly: true
        })

        if(!isMatch){
            res.status(400).json({error : 'signin error'})
        }else{
        res.json({message: 'User sign in successfully'})
        }
    }
    } catch (error) {
        console.log(error)
    }
    
})

module.exports = router