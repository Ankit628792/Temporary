const jwt = require('jsonwebtoken')
const User = require('../models/registers')
const Doctor = require('../models/doctorregister')

const auth = async (req,res,next) => {
    try {
        const token = req.cookies.jwt;
        // console.log("auth token " + token )
        const verifyUser = jwt.verify(token, process.env.SECRET_KEY)
        // console.log(verifyUser)
        // console.log(verifyUser._id)
        
        const user = await User.findOne({_id: verifyUser._id})
        // console.log(user)

        const doctor = await Doctor.findOne({_id: verifyUser._id})
        // console.log(doctor)

        req.token = token;
        
        // if(req.user == null){
        //     req.user = doctor;
        // }else{
        //     req.user =user
        // }
        user == null ? req.user = doctor : req.user = user; 
        // req.user = user
        // req.doctor= doctor

        next()
    } catch (error) {
        // res.status(401).send(error)
        res.redirect('/')
    }
}

module.exports = auth